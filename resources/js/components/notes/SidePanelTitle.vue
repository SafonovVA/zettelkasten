<template>
    <div>
        <span class="nav-link nav-link-self"
              :id="`collapseItem${id}`"
              aria-expanded="false">
              <span class="nav-link-parent"
                    :id="`collapseParentItem${id}`"
                    :class="{'nav-link-collapse': hasChild}"
                    v-html="icon"
                    :data-toggle="isCollapsible ? 'collapse' : false"
                    :data-target="isCollapsible ? `#collapseSubItems${id}` : false"
                    :aria-controls="isCollapsible ? `collapseSubItems${id}` : false"
                    @click="getTitles"></span>
              <span class="nav-link-text nav-link-text-self"
                    @click="getNoteContent">{{commonNumber}}. {{ title }}</span>
        </span>
<!--        :class="{ show: isShowing }"-->
        <ul v-if="isCollapsible"
            class="nav-second-level collapse"

            :id="`collapseSubItems${id}`"
            :data-parent="`#collapseItem${id}`">
            <li class="nav-item" v-for="(childTitle, childId) of childTitles" :key="childId">
                <side-panel-title :title="childTitle.title"
                                  :id="childTitle.id"
                                  :hasChild="childTitle['has_child']"
                                  :commonNumber="childTitle['common_number']"></side-panel-title>
            </li>
        </ul>
    </div>
</template>

<script>
    import eventBus from './eventBus';
    const icons = {
        faChevronRight: `<i class="fa fa-chevron-right" aria-hidden="true" style="padding-left: 5px;"></i>`,
        faChevronDown: `<i class="fa fa-chevron-down" aria-hidden="true"></i>`,
        faDownload: `<i class="fa fa-cog fa-spin fa-1x fa-fw"></i><span class="sr-only"></span>`,
    };
    export default {
        name: "SidePanelTitle",
        props: ['title', 'id', 'hasChild', 'commonNumber'],
        data: function () {
            return {
                childTitles: {},
                isCollapsible: false,
                isShowing: false,
                collapseNode: null,
                icon: this.hasChild ? icons.faChevronRight : '',
                icons: {
                    faChevronRight: `<i class="fa fa-chevron-right" aria-hidden="true"></i>`,
                    faChevronDown: `<i class="fa fa-chevron-down" aria-hidden="true"></i>`,
                    faDownload: `<i class="fa fa-cog fa-spin fa-1x fa-fw"></i><span class="sr-only"></span>`,
                }
            };
        },
        watch: {
            isShowing: function (newVal, oldVal) {
                this.icon = newVal === true ? icons.faChevronDown : icons.faChevronRight;
                setTimeout(() => $('#collapseSubItems' + this.id).collapse('toggle'));
            }
        },
        methods: {
            getNoteContent: async function () {
                eventBus.$emit('load-note-by-id', this.id);
            },
            getTitles: async function () {
                if (this.isCollapsible === false) {
                    this.icon = icons.faDownload;
                    try {
                        const response = (await axios.get(`/notes/${this.id}`)).data;
                        if (response.data !== null) {
                            this.childTitles = response.data;
                            this.isCollapsible = true;
                        }
                    } catch (error) {
                        console.log(error.message)
                    }
                }
                this.isShowing = !this.isShowing;
            }
        }
    }
</script>

<style scoped>

</style>
