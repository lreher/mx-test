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

                        <small class="form-text text-danger">{{ getError('username') }}</small>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" placeholder="Select an email">

                        <small class="form-text text-danger">{{ getError('email') }}</small>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input id="passwordInput" type="password" class="form-control" name="password" placeholder="Choose a password">
                    
                        <small class="form-text text-danger">{{ getError('password') }}</small>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm Password:</label>
                        <input id="confirmPasswordInput" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
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
        this.errors = JSON.parse(this.validation_errors);
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
        },
        getError: function(field) {
            if (this.errors[field]) {
                return this.errors[field][0];
            } else {
                return "";
            }
        }
    },
    data: function () {
        return {
            errors: {},
        }
    },
    props: ['csrf', 'validation_errors']
}
</script>

<style>
#registrationBox {
    height: 90vh;
}

.card-header {
    background-color: rgba(10, 37, 99, 0.781);
    color: white;
}

a {
    color: rgba(10, 37, 99, 0.781);
}
</style>