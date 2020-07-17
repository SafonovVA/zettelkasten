<template>
    <footer :class="{'footer-sidenav': !this.notesIsHidden}">
        <div class="container">
            <div class="text-center">
                <span>Coded by <a href="https://github.com/SafonovVA">SafonovVA</a>, 2020</span>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name: "FooterNotes",
        props: ['notesIsHidden'],


    }
</script>

<style scoped>

</style>
