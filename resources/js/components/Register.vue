<template>
    <div>
        <div>
            <h1>Register</h1>
        </div>

        <form method="POST" action="/register">
            <input type="hidden" name="_token" :value="csrf">

            <label for="username">Username:</label>
            <input type="text" name="username"><br><br>

            <label for="email">Email:</label>
            <input type="text" name="email"><br><br>

            <label for="password">Password:</label>
            <input id="passwordInput" type="password" name="password"><br><br>

            <label for="confirm_password">Confirm Password:</label>
            <input id="confirmPasswordInput" type="password" name="password_confirmation"><br><br>

            <label for="showPassword">Show password?</label>
            <input type="checkbox" name="showPassword" @change="showPassword($event)">

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
    methods: {
        showPassword: function(event) {
            if(event.target.checked) {
                document.getElementById('passwordInput').type='text';
                document.getElementById('confirmPasswordInput').type='text';
            } else {
                document.getElementById('passwordInput').type='password';
                document.getElementById('confirmPasswordInput').type='password';
            }
        }
    },
    data: function () {
        return {
        }
    },
    props: ['csrf']
}
</script>

<style>
</style>