require('./bootstrap');

window.Vue = require('vue');

const files = require.context('./components/notes', false, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import EditForm from './components/notes/EditForm';
import SidePanel from './components/notes/SidePanel';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {path: '/create', name: 'create', component: EditForm},
        {path: '/side', name: 'side', component: SidePanel}
    ],
});

const notes = new Vue({
    el: '#notes',
    router: router,
    data: {
        startRoute: '/notes',
        currentRoute: window.location.pathname,
        notesIsHidden: false,
    },
    computed: {
        isStartRoute: function () {
            return this.startRoute === window.location.pathname;
        },
        window: function () {
            return window;
        }
    },
});


