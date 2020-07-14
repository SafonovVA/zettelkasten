<template>
    <div>
        <span class="nav-link"
              :id="`collapseItem${id}`"
              :data-toggle="isCollapsible ? 'collapse' : false"
              :data-target="isCollapsible ? `#collapseSubItems${id}` : false"
              :aria-controls="isCollapsible ? `collapseSubItems${id}` : false"
              aria-expanded="false"
              @click="getTitlesOrContent">
            <span class="nav-link-text">{{ title }}</span>
        </span>
        <ul v-if="isCollapsible"
            class="nav-second-level collapse"
            :class="{ show: isShow }"
            :id="`collapseSubItems${id}`"
            :data-parent="`#collapseItem${id}`">
            <li class="nav-item" v-for="(childTitle, childId) of childTitles" :key="childId">

                <side-panel-title :title="childTitle" :id="childId"></side-panel-title>
            </li>
        </ul>
        <!--<a
            class="nav-link nav-link-collapse"
            href="#"
            data-toggle="collapse"
            data-target="#collapseSubItems4"
            aria-controls="collapseSubItems4"
            aria-expanded="false"
        >Item 4</a>
        <ul class="nav-second-level collapse" id="collapseSubItems4" data-parent="#navAccordion">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="nav-link-text">Item 4.1</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="nav-link-text">Item 4.2</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="nav-link-text">Item 4.2</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="nav-link-text">Item 4.2</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="nav-link-text">Item 4.2</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="nav-link-text">Item 4.2</span>
                </a>
            </li>
        </ul>-->
    </div>
</template>

<script>
    import eventBus from './eventBus';
    export default {
        name: "SidePanelTitle",
        props: ['title', 'id'],
        data: function() {
            return {
                childTitles: {},
                isCollapsible: false,
                isShow: false,
                collapseNode: null,
            };
        },
        mounted() {
            this.collapseNode = document.querySelector(`#collapseItem${this.id}`);
        },
        updated: function() {
            this.collapseNode.classList.remove('nav-link-collapse')
            this.collapseNode.classList.add('nav-link-show');
            $('#collapseSubItems' + this.id).collapse('show');
        },
        methods: {
            getTitlesOrContent: async function () {
                eventBus.$emit('load-note-by-id', this.id);
                if (this.isCollapsible === false) {
                    this.collapseNode.classList.add('nav-link-collapsing');
                    try {
                        const response = (await axios.get(`notes/${this.id}`)).data;
                        if (response.data !== null) {
                            this.childTitles = response.data;
                            this.isCollapsible = true;
                        }
                    } catch (error) {
                        console.log(error.message)
                    }
                    this.collapseNode.classList.remove('nav-link-collapsing');
                } else {
                    this.collapseNode.classList.toggle('nav-link-collapse')
                    this.collapseNode.classList.toggle('nav-link-show');
                }
            },
        }
    }
</script>

<style scoped>

</style>
