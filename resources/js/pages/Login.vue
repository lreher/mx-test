<template>
    <div>
        <div id="loginBox" class="d-flex justify-content-center align-items-center flex-column">
            <div class="card" style="width: 40vw;">
                <div class="card-header">
                    <h4>Login</h4>
                </div>

                <div class="card-body">
                    <form form method="POST" action="/login">
                        <input type="hidden" name="_token" :value="csrf">

                        <div class="form-group">
                            <label for="login">Username/Email:</label>
                            <input type="text" class="form-control" name="login" placeholder="Enter your username or email">
                            
                            <small class="form-text text-danger">{{ getError('login') }}</small>
                        </div>
                    
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password">

                            <small class="form-text text-danger">{{ getError('password') }}</small>
                        </div>

                        <button type="submit d-flex" class="btn btn-outline-dark">Login</button>
                    </form>

                    <div class="mt-3">
                        <p>Don't have an account? <a href="/register">Register</a></p>
                    </div>
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
            errors: {}
        }
    },
    props: ['csrf', 'validation_errors']
}
</script>

<style scoped=true>

#loginBox {
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