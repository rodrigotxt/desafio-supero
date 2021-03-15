import Vue from 'vue';
import Tasks from './Tasks.vue'
import Sortable from 'sortablejs'

Vue.component('tasks', Tasks);
// Vue.use(Sortable);
Vue.directive('sortable', {
  inserted: function (el, binding) {
    new Sortable(el, binding.value || {})
  }
});

new Vue().$mount('#app');