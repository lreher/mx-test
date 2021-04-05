<template>
    <div id="registrationBox" class="d-flex justify-content-center align-items-center flex-column">
        <div class="card" style="width: 40vw;">
            <div class="card-header">
                <h4>Register</h4>
            </div>

            <div class="card-body">
                <form form method="POST" action="/register">
                    <input type="hidden" name="_token" :value="csrf">

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" placeholder="Select a username">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="Select an email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input id="passwordInput" type="passowrd" class="form-control" name="password" placeholder="Choose a password">
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <input id="confirmPasswordInput" type="passowrd" class="form-control" name="password_confirmation" placeholder="Confirm password">
                    </div>

                      <div class="form-group">
                        <label for="showPassword">Show password?</label>
                        <input type="checkbox" name="showPassword" @change="showPassword($event)">
                    </div>

                    <button type="submit d-flex" class="btn btn-outline-dark">Register</button>
                </form>

                <div class="mt-3">
                    <p>Already have an account? <a href="/login">Login</a></p>
                </div>
            </div>
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
#registrationBox {
    height: 100vh;
}

.card-header {
    background-color: rgba(10, 37, 99, 0.781);
    color: white;
}

a {
    color: rgba(10, 37, 99, 0.781);
}
</style>