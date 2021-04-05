<template>
    <div class="main">
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

<style>
body {
    background-color: rgb(94 132 154 / 33%);
    width: 100vw;
    height: 100vh;
}
</style>