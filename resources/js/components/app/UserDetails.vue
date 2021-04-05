<template>
    <div class="card">
        <div class="card-header">
            Personal Details
        </div>

        <div class="card-body">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input id="firstName" type="text" class="form-control" name="first_name" placeholder="Please add your first name" :value="user.first_name">

                <small class="form-text text-danger">{{ errors.first_name[0] }}</small>
            </div>
        
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input id="lastName" type="text" class="form-control" name="last_name" placeholder="Please add your last name" :value="user.last_name">
                
                <small class="form-text text-danger">{{ errors.last_name[0] }}</small>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input id="phoneNumber" type="text" class="form-control" name="phone_number" placeholder="ie. 0426212123" :value="user.phone_number">
            
                <small class="form-text text-danger">{{ errors.phone_number[0] }}</small>
            </div>

            <button v-if="!loading" class="btn btn-outline-dark" v-on:click="saveDetails">Save</button>
            <button v-if="loading" class="btn btn-outline-dark" v-on:click="saveDetails" disabled>Save</button>
        </div>

        <flash-notice v-if="flash.message" :key="flash.key" :type="flash.type" :message="flash.message"></flash-notice>
    </div>
</template>

<script>
var axios = require('axios');

export default {
    mounted: function() {
        this.user = JSON.parse(this.user_model);
    },
    data: function () {
        return {
            errors: {
                first_name: [],
                last_name: [],
                phone_number: []
            },
            flash: {
                key: 0,
                message: null,
                type: null
            },
            user: {
                first_name: null,
                last_name: null,
                phone_number: null
            },
            loading: false
        }
    },
    methods: {
        saveDetails: function() {
            var firstName = document.getElementById('firstName').value;
            var lastName = document.getElementById('lastName').value;
            var phoneNumber = document.getElementById('phoneNumber').value;

            this.user = {
                first_name: firstName,
                last_name: lastName,
                phone_number: phoneNumber
            }

            this.loading = true;

            axios.post('/user_details', {
                first_name: firstName ? firstName : null,
                last_name: lastName ? lastName : null,
                phone_number: phoneNumber ? phoneNumber : null
            })
            .then(result => {
                this.loading = false;
                this.errors = {
                    first_name: [],
                    last_name: [],
                    phone_number: []
                }

                this.user = result.data.user;
                this.flashMessage(result.data.message, 'success');

            })
            .catch(error => {
                this.loading = false;

                // If we're getting validation errors
                if (error.response.status === 422) {
                    this.errors = Object.assign(this.errors, error.response.data.errors);
                    this.flashMessage("Your details have validation errors", 'danger');
                }

                // If our saving failed
                if (error.response.status === 400) {
                    this.flashMessage(error.response.data, 'danger');
                }
            });
        },
        flashMessage: function(message, type) {
            this.flash.key += 1;
            this.flash.message = message;
            this.flash.type = type;
        }
    },
    props: ['user_model']
}
</script>

<style scoped=true>

</style>