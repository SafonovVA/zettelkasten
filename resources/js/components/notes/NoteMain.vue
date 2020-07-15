<template>
    <div id="note-main">
        <note-ruler :noteHistory="noteHistory"
                    :currentNoteIdInHistory="currentNoteIdInHistory"
                    @go-back-to-older-note="backOneNote"
                    @go-forward-to-newer-note="forwardOneNote"
                    @shift-note-history="shiftNoteHistory"></note-ruler>
        <div class="py-4"></div>
        <transition name="bounce">
            <div v-if="show && note">
                <div class="row">
                    <div class="col-md-8" id="note-tags" v-if="note.tags">
                        <span v-for="(tag, index) of note.tags" :key="index">#{{tag.name}} </span>
                    </div>
                    <div class="col-md-4 ml-auto" id="note-times">
                        <span class="ml-auto">created: {{ createdAt }}</span><br>
                        <span class="ml-auto">updated: {{ updatedAt }}</span>
                    </div>
                </div>
                <div class="jumbotron">
                    <h3 class="display-4">{{note.title}}</h3>
                    <p class="lead">{{note.content}}</p>
                    <hr class="my-4">
                    <!--<p>It uses utility classes for typography and spacing to space content out within the larger
                        container.</p>-->
                    <ul v-if="note.links">
                        <li v-for="(link, index) of note.links" :key="index">
                            <a :href=" link['note_id'] || link.url"
                               @click.prevent="followTheLink(index)">{{link.title}}</a>
                        </li>
                    </ul>
                    <!--<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>-->
                </div>
            </div>
        </transition>

        <div v-if="!note">
            Nihuya
        </div>
    </div>
</template>

<script type="module">
    import eventBus from "./eventBus";
    import NoteRuler from "./NoteRuler";
    export default {
        name: "NoteMain",
        components: {NoteRuler},
        data: function () {
            return {
                note: null,
                cachedNotes: new Map(),
                cachedTags: new Map(),
                cachedLinks: new Map(),
                show: true,
                noteHistory: [],
                currentNoteIdInHistory: 0,
                timeOptions: {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric',
                },
            }
        },
        computed: {
            createdAt: function () {
                return new Date(this.note['created_at']).toLocaleString('en-US', this.timeOptions);
            },
            updatedAt: function () {
                return new Date(this.note['updated_at']).toLocaleString('en-US', this.timeOptions);
            }
        },
        created() {
            this.afterCreation();
        },

        updated() {
            //console.log(this.noteHistory);
        },
        methods: {
            afterCreation: function () {
                eventBus.$on('load-note-by-id', async id => this.getAllNoteContent(id));
            },
            getAllNoteContent: async function (id, queryFromHistory = false) {
                if (this.note && this.note.id === +id) {
                    return;
                }
                this.show = false;

                await this.getNoteData(id);
                await this.getNoteLinks(id);
                await this.getNoteTags(id);
                setTimeout(() => this.show = true, 1000);
                if (!queryFromHistory) {
                    if (this.noteHistory.length !== 0 && (this.currentNoteIdInHistory < this.noteHistory.length - 1)) {
                        this.noteHistory.length = this.currentNoteIdInHistory + 1;
                    }
                    this.noteHistory.push(id);

                    this.currentNoteIdInHistory = this.noteHistory.length - 1;
                }
            },
            getNoteData: async function (id) {
                if (this.cachedNotes.has(+id)) {
                    this.note = this.cachedNotes.get(+id);
                } else {
                    try {
                        const response = (await axios.get(`notes/note/${id}`)).data;
                        this.note = response.data;
                        this.cachedNotes.set(this.note.id, this.note);
                    } catch (error) {
                        console.log(error.message);
                    }
                }
            },
            getNoteTags: async function (id) {
                if (this.cachedTags.has(+id)) {
                    this.note.tags = this.cachedTags.get(+id);
                } else {
                    try {
                        const response = (await axios.get(`notes/tags/${id}`)).data;
                        this.note.tags = response.data;
                        this.cachedTags.set(this.note.id, this.note.tags);
                    } catch (error) {
                        console.log(error.message);
                    }
                }
            },
            getNoteLinks: async function (id) {
                if (this.cachedLinks.has(+id)) {
                    this.note.links = this.cachedLinks.get(+id);
                } else {
                    try {
                        const response = (await axios.get(`notes/links/${id}`)).data;
                        this.note.links = response.data;
                        this.cachedLinks.set(this.note.id, this.note.links);
                    } catch (error) {
                        console.log(error.message);
                    }
                }
            },
            followTheLink: async function (index) {
                if ((this.note.links)[index]['note_id'] !== null) {
                    await this.getAllNoteContent((this.note.links)[index]['note_id']);
                } else if ((this.note.links)[index].url !== null) {
                    window.open((this.note.links)[index].url);
                }
            },
            backOneNote: async function () {
                this.currentNoteIdInHistory--;
                //console.log(this.currentNoteIdInHistory + ' note in history back')
                await this.getAllNoteContent(this.noteHistory[this.currentNoteIdInHistory], true);
            },
            forwardOneNote: async function () {
                this.currentNoteIdInHistory++;
                //console.log(this.currentNoteIdInHistory + ' note in history forward')
                await this.getAllNoteContent(this.noteHistory[this.currentNoteIdInHistory], true);
            },
            shiftNoteHistory: function () {
                this.noteHistory.shift();
            }
        }
    }
</script>

<style scoped>

</style>
