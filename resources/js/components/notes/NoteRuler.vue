<template>
    <div>
        <button class="notes-ruler-back" @click="goBack" :disabled="disabledBack"></button>
        <button class="notes-ruler-forward" @click="goForward" :disabled="disabledForward"></button>
        <router-link :to="{name: 'create'}">Create</router-link>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script type="module">
    export default {
        name: "NoteRuler",
        props: ['noteHistory', 'currentNoteIdInHistory'],
        data: function () {
            return {
                disabledBack: true,
                disabledForward: true,
                noteIdInHistoryLimit: 5,
                noteIdInHistory: null,
            }
        },
        watch: {
            noteHistory: function () {
                if (this.currentNoteIdInHistory > 0) {
                    this.disabledBack = false;
                }
                if (this.noteHistory.length > this.noteIdInHistoryLimit) {
                    this.$emit('shift-note-history');
                }
                if (this.currentNoteIdInHistory + 1 === this.noteHistory.length) {
                    this.disabledForward = true;
                }
            },
        },
        methods: {
            goBack: function () {
                this.disabledForward = false;
                if ((this.currentNoteIdInHistory - 1) === 0) {
                    this.disabledBack = true;
                }
                this.$emit('go-back-to-older-note');
            },
            goForward: function () {
                this.disabledBack = false;
                if (this.currentNoteIdInHistory + 1 === this.noteHistory.length - 1) {
                    this.disabledForward = true;
                }
                this.$emit('go-forward-to-newer-note');
            }
        },
    }
</script>

<style scoped>

</style>
