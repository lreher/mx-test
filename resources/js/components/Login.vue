<template>
    <div>
        <div>
            <h1>Login</h1>
        </div>

        <form form method="POST" action="/login">
            <input type="hidden" name="_token" :value="csrf">

            <label for="login">Username/Email:</label>
            <input type="text" name="login"><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password"><br><br>

            <button type="submit">Login</button>
        </form>

        <div class="register">
            <p>Don't have an account? <a href="/register">Register</a></p>
        </div>

    </div>
</template>

<script>
export default {
    data: function () {
        return {
        }
    },
    props: ['csrf']
}
</script>

<style>
</style>