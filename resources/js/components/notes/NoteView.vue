<template>
    <div>
        <side-panel :notes-titles="notesTitles"></side-panel>
        <main class="content-wrapper">
            <div class="container-fluid">
                <note-main></note-main>
            </div>
        </main>
    </div>
</template>

<script>
    export default {
        name: "NoteView",
        props: ['notesTitles']
    }
</script>

<style scoped>

</style>
