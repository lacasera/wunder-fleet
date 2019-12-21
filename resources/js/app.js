import Vue from 'vue'
import store from './store'
import MainComponent from './components/MainComponent.vue'

const app = new Vue({
    el: '#app',
    store,
    components: {
        MainComponent
    }
});
