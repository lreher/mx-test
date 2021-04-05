<template>
    <nav class="navbar navbar-dark">
        <a class="navbar-brand color-light">Fantastic Address Making Application</a>

        <form class="form-inline">
            {{ username }}<a class="btn btn-outline" href="/logout">Logout</a>
        </form>
    </nav>
</template>

<script>
export default {
    props: ['username']
}
</script>

<style scoped=true>
.navbar {
    background-color: rgba(10, 37, 99, 0.781);
    color: rgba(255, 255, 255, 0.836);
}

.btn {
    color: rgba(255, 255, 255, 0.836);
}
</style>