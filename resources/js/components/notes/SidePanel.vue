<template>
    <ul class="navbar-nav mr-auto sidenav" id="sidePanelAccordion">
        <li class="nav-item" v-for="(noteTitle, id) of notesTitles" :key="id">
            <side-panel-title :title="noteTitle.title"
                              :id="noteTitle.id"
                              :hasChild="noteTitle['has_child']"
                              :commonNumber="noteTitle['common_number']"></side-panel-title>
        </li>
    </ul>
</template>

<script type="module">
    import SidePanelTitle from "./SidePanelTitle";
    export default {
        props: ['notesTitles'],
        components: {SidePanelTitle},
    }
</script>
