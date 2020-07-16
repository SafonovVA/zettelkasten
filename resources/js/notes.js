require('./bootstrap');

window.Vue = require('vue');

const files = require.context('./components/notes', false, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const notes = new Vue({
    el: '#notes',
    data: {
        showSidePanel: true,
    }
});
