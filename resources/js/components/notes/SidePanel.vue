<template>
    <ul class="navbar-nav mr-auto sidenav" id="sidePanelAccordion">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Item 1</a>
        </li>
        <li class="nav-item">
            <span
                class="nav-link nav-link-collapse"
                id="sub1"
                data-toggle="collapse"
                data-target="#collapseSubItems2"
                aria-controls="collapseSubItems2"
                aria-expanded="true"
            >Item 2</span>
            <ul class="nav-second-level collapse" id="collapseSubItems2" data-parent="#sidePanelAccordion">
                <li class="nav-item">
                    <span class="nav-link">
                        <span class="nav-link-text">Item 2.1</span>
                    </span>
                </li>
                <li class="nav-item">
                    <span class="nav-link">
                        <span class="nav-link-text">Item 2.2</span>
                    </span>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Item 3</a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link nav-link-collapse"
                href="#"
                data-toggle="collapse"
                data-target="#collapseSubItems4"
                aria-controls="collapseSubItems4"
                aria-expanded="false"
            >Item 4</a>
            <ul class="nav-second-level collapse" id="collapseSubItems4" data-parent="#sidePanelAccordion">
                <li class="nav-item">
                    <span class="nav-link">
                        <span class="nav-link-text">Item 4.1</span>
                    </span>
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
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Item 5</a>
        </li>
        <li class="nav-item" v-for="(noteTitle, id) of notesTitles" :key="id">
            <side-panel-title :title="noteTitle" :id="id"></side-panel-title>
        </li>
    </ul>
</template>

<script type="module">
    export default {
        props: ['notesTitles'],
        mounted() {
            //console.log(this.notesTitles);
        }
    }
</script>
