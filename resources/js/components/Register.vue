<template>
    <div>
        <div>
            <h1>Register</h1>
        </div>

        <form method="POST" action="/register" class="login" >
            <input type="hidden" name="_token" :value="csrf">

            <label for="username">Username:</label>
            <input type="text" name="username"><br><br>

            <label for="email">Email:</label>
            <input type="text" name="email"><br><br>

            <label for="password">Password:</label>
            <input type="text" name="password"><br><br>

            <label for="confirm_password">Confirm Passowrd:</label>
            <input type="text" name="confirm_password"><br><br>

            <button type="submit">Register</button>
        </form>

        <div class="register">
            <p>Already have an account? <a href="/login">Login</a></p>
        </div>

    </div>
</template>

<script>
export default {
    mounted: function() {
        console.log(this.csrf);
    },
    data: function () {
        return {
            showPassword: false
        }
    },
    props: ['csrf']
}
</script>

<style>
</style>