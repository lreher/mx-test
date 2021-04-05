<template>
    <div>
        <app-header :username="user.username"></app-header>


        <div class="row m-2 d-flex justify-content-center">
            <div class="col-6">
                <app-user-details :user_model="user_model"></app-user-details>  
            </div>

             <div class="col-6" v-if="user.user_addresses">
                <app-user-addresses :addresses_prop="user.user_addresses"></app-user-addresses>  
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted: function() {
        this.user = JSON.parse(this.user_model)
    },
    data: function () {
        return {
            user: {
                username: null,
                user_addresses: null
            }
        }
    },
    props: ['user_model']
}
</script>

<style scoped=true>
</style>