<template>
    <div>
        <div>
            <h1>Login</h1>
        </div>

        <form class="login">
            <label for="email">Email:</label>
            <input type="text" name="email"><br><br>

            <label for="password">Password:</label>
            <input type="text" name="password"><br><br>

            <button>Login</button>
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
        showPassword: false
    }
  }
}
</script>

<style>
</style>