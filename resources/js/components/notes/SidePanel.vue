<template>
    <ul class="navbar-nav mr-auto sidenav" id="sidePanelAccordion">
        <li class="nav-item" v-for="(noteTitle, id) of notesTitles" :key="id">
            <side-panel-title :title="noteTitle" :id="id"></side-panel-title>
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
