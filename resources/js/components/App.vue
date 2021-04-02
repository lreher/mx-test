<template>
  <div>
    <h1>{{ test }}</h1>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
        test: "Hello friend"
    }
  }
}
</script>

<style>
h1 {
  color: red;
}
</style>