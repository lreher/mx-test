<template>
  <div>
    <h1>Hello {{ person }}</h1>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
        person: "Kat"
    }
  }
}
</script>

<style>
h1 {
  color: blue;
}
</style>