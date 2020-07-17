<template>
    <div>
        HelloBitches
    </div>
</template>

<script>
    export default {
        name: "EditForm",
        created() {
            console.log(this.$root.isStartRoute);
            console.log(this.$root.currentRoute);
            console.log(this.$root.startRoute === window.location.pathname);
            console.log(window.location.pathname === '/create');
        }
    }
</script>

<style scoped>

</style>
