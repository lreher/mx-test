<template>
    <div class="card">
        <div class="card-header">
            Your addresses
        </div>

        <div class="card-body">

            <div class="row d-flex justify-content-center" v-if="addresses.length == 0">
                <p>You don't have any addresses saved yet.</p>
            </div>

            <div class="row d-flex justify-content-center" v-if="addresses.length == 0">
                <button class="btn btn-outline-dark">New Address</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['addresses']
}
</script>

<style scoped=true>

</style>