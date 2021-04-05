<template>
    <div id="flashNotice" :class="alertType" role="alert">
        {{ message }}
    </div>
</template>

<script>
export default {
    mounted: function() {
        this.alertType = "alert alert-" + this.type
    },
    data: function () {
        return {
            alertType: "alert alert-info"
        }
    },
    props: ['message', 'type']
}
</script>

<style scoped=true>
#flashNotice {
    -webkit-animation: fadeInAndOut 4s;
    -moz-animation: fadeInAndOut 4s;
    -o-animation: fadeInAndOut 4s;
    animation: fadeInAndOut 4s;

    animation-fill-mode: forwards;
    -o-animation-fill-mode: forwards;
    -moz-animation-fill-mode: forwards;
    -webkit-animation-fill-mode: forwards;

    position: fixed;
    bottom:0;
    right:0;
    left: 0;
}

@keyframes fadeInAndOut {
    0%   { opacity:0; }
    25%  { opacity:1; }
    75% { opacity:1; }
    100% { opacity:0; }
}
</style>