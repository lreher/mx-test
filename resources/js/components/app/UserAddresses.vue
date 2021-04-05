<template>
    <div class="card">
        <div class="card-header">
            Your Addresses
        </div>

        <div class="card-body">
            <!-- No Addresses -->
            <div class="row d-flex justify-content-center" v-if="addresses.length == 0">
                <p>You don't have any addresses saved yet.</p>
            </div>

            <!-- Some Addresses! -->
            <div v-for="address in addresses" :key="address.id">
                <a id="deleteButton" class="btn" v-on:click="deleteAddress(address.id)"><i class="fa fa-trash"></i></a>
                <a id="editButton" class="btn" v-on:click="editAddress(address.id)"><i class="fa fa-edit"></i></a>

                <p>{{address.address_1}} <br v-if="address.address_2"> {{address.address_2}} <br> {{address.suburb}}, {{address.postcode}}, {{address.state}}, {{address.country}}</p>
            </div>

            <div class="row d-flex justify-content-center">
                <button class="btn btn-outline-dark" v-on:click="newAddress">New Address</button>
            </div>
        </div>

        <div class="card-footer" v-show="showNewAddress">
            <!-- If we're creating a new address, don't specify ID -->
            <input id="addressIdInput" type="hidden" name="address_id">

            <div class="form-group">
                <label for="address_1">Address Line 1</label>
                <input id="address1Input" type="text" class="form-control" name="address_1">

                <small class="form-text text-danger">{{ errors.address_1[0] }}</small>
            </div>
        
            <div class="form-group">
                <label for="address_2">Address Line 2</label>
                <input id="address2Input" type="text" class="form-control" name="address_2">

                <small class="form-text text-danger">{{ errors.address_2[0] }}</small>
            </div>

            <div class="form-group">
                <label for="suburb">Suburb</label>
                <input id="suburbInput" type="text" class="form-control" name="suburb" placeholder="">

                <small class="form-text text-danger">{{ errors.suburb[0] }}</small>
            </div>

            <div class="form-group">
                <label for="state">State</label>
                <input id="stateInput" type="text" class="form-control" name="state" placeholder="">

                <small class="form-text text-danger">{{ errors.state[0] }}</small>
            </div>

            <div class="form-group">
                <label for="postcode">Postcode</label>
                <input id="postcodeInput" type="text" class="form-control" name="postcode" placeholder="">

                <small class="form-text text-danger">{{ errors.postcode[0] }}</small>
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <input id="countryInput" type="text" class="form-control" name="country" placeholder="">

                <small class="form-text text-danger">{{ errors.country[0] }}</small>
            </div>


            <button v-if="!loading" class="btn btn-outline-dark" v-on:click="saveAddress">Save</button>
            <button v-if="loading" class="btn btn-outline-dark" disabled>Save</button>

            <button class="btn btn-outline-dark" v-on:click="closeNewAddress">Cancel</button>
        </div>

        <flash-notice v-if="flash.message" :key="flash.key" :type="flash.type" :message="flash.message"></flash-notice>
    </div>
</template>

<script>
export default {
    mounted: function() {
        this.addresses = this.addresses_prop;
    },
    methods: {
        newAddress: function() {
            this.showNewAddress = true;
        
            document.getElementById('addressIdInput').value = null;
            document.getElementById('address1Input').value = null;
            document.getElementById('address2Input').value = null;
            document.getElementById('suburbInput').value = null;
            document.getElementById('stateInput').value = null;
            document.getElementById('postcodeInput').value = null;
            document.getElementById('countryInput').value = null;
        },
        closeNewAddress: function() {
            this.showNewAddress = false;
        },
        saveAddress: function() {
            var address_id = document.getElementById('addressIdInput').value;
            var address_1 = document.getElementById('address1Input').value;
            var address_2 = document.getElementById('address2Input').value;
            var suburb = document.getElementById('suburbInput').value;
            var state = document.getElementById('stateInput').value;
            var postcode = document.getElementById('postcodeInput').value;
            var country = document.getElementById('countryInput').value;

            this.loading = true;

            axios.post('/address', {
                address_id: address_id ? address_id : null,
                address_1: address_1 ? address_1 : null,
                address_2: address_2 ? address_2 : null,
                suburb: suburb ? suburb : null,
                state: state ? state : null,
                postcode: postcode ? postcode : null,
                country: country ? country : null,
            })
            .then(result => {
                this.loading = false;
                this.errors = {
                    address_1: [],
                    address_2: [],
                    suburb: [],
                    state: [],
                    postcode: [],
                    country: []
                }

                this.addresses = result.data.user.user_addresses;

                this.closeNewAddress();
                this.flashMessage(result.data.message, 'success');
            })
            .catch(error => {
                this.loading = false;

                // If we're getting validation errors
                if (error.response.status === 422) {
                    this.errors = Object.assign(this.errors, error.response.data.errors);
                    this.flashMessage("Your address has validation errors", 'danger');
                }

                // If our saving failed
                if (error.response.status === 400) {
                    this.flashMessage(error.response.data, 'danger');
                }
            });
        },
        deleteAddress: function(address_id) {
            axios.delete('/address/' + address_id)
            .then(result => {
                this.addresses = result.data.user.user_addresses;
                this.flashMessage(result.data.message, 'success');
            })
            .catch(error => {
                // If our deleting failed
                if (error.response.status === 400) {
                    this.flashMessage(error.response.data, 'danger');
                }
            });
        },
        editAddress: function(id) {
            this.addresses.map((address) => {
                if (address.id === id) {
                    document.getElementById('addressIdInput').value = id;
                    document.getElementById('address1Input').value = address.address_1;
                    document.getElementById('address2Input').value = address.address_2;
                    document.getElementById('suburbInput').value  = address.suburb;
                    document.getElementById('stateInput').value = address.state;
                    document.getElementById('postcodeInput').value = address.postcode;
                    document.getElementById('countryInput').value = address.country;
                    
                    this.showNewAddress = true;
                }
            })
        },
        flashMessage: function(message, type) {
            this.flash.key += 1;
            this.flash.message = message;
            this.flash.type = type;
        }
    },
    data: function () {
        return {
            errors: {
                address_1: [],
                address_2: [],
                suburb: [],
                state: [],
                postcode: [],
                country: []
            },
            flash: {
                key: 0,
                message: null,
                type: null
            },
            addresses: [], 
            showNewAddress: false,
            loading: false
        }
    },
    props: ['addresses_prop']
}
</script>

<style scoped=true>
#deleteButton {
    position: absolute;
    right: 1vw;
}

#editButton {
    position: absolute;
    right: 4vw;
}
</style>