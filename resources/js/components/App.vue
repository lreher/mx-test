<template>
    <div>
        <div>
            <h1>Hello {{ user.username }}</h1>
        </div>

        <div>
            <a href="/logout">Logout</a>
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
                username: null
            }
        }
    },
    props: ['user_model']
}
</script>

<style scoped=true>
h1 {
    color: grey;
}
</style>