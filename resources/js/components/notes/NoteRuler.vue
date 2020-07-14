<template>
    <div>
        <button class="notes-ruler-back" @click="goBack" :disabled="disabledBack"></button>
        <button class="notes-ruler-forward" @click="goForward" :disabled="disabledForward"></button>
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
                console.log(this.currentNoteIdInHistory)
                if (this.currentNoteIdInHistory > 0) {
                    this.disabledBack = false;
                }
                if (this.currentNoteIdInHistory === this.noteIdInHistoryLimit) {
                    this.noteHistory.shift();
                }
                console.log(this.noteHistory)
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
                if ((this.currentNoteIdInHistory + 1) === this.noteHistory.length - 1) {
                    this.disabledForward = true;
                }
                this.$emit('go-forward-to-newer-note');
            }
        },
    }
</script>

<style scoped>

</style>
