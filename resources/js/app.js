
require('./bootstrap');

import Vue from 'vue';
import ElementUI from 'element-ui';

import lang from 'element-ui/lib/locale/lang/en'
import locale from 'element-ui/lib/locale'

// configure language
locale.use(lang)

import { store } from './store/store.js';
import 'element-ui/lib/theme-chalk/index.css';

window.Vue = require('vue').default;

Vue.use(ElementUI);


Vue.component('cmodalidad-form-component', require('./components/cmodalidad/CmodalidadFormComponent.vue').default);
Vue.component('cmodalidad-table-component', require('./components/cmodalidad/CmodalidadTableComponent.vue').default);

Vue.component('ccarrera-form-component', require('./components/ccarrera/CcarreraFormComponent.vue').default);
Vue.component('ccarrera-table-component', require('./components/ccarrera/CcarreraTableComponent.vue').default);

Vue.component('cplanestudio-form-component', require('./components/cplanestudio/CplanestudioFormComponent.vue').default);
Vue.component('cplanestudio-table-component', require('./components/cplanestudio/CplanestudioTableComponent.vue').default);

Vue.component('cescalaeval-table-component', require('./components/cescalaeval/CescalaevalTableComponent.vue').default);
Vue.component('cescalaeval-form-component', require('./components/cescalaeval/CescalaevalFormComponent.vue').default);

Vue.component('casignatura-form-component', require('./components/casignatura/CasignaturaFormComponent.vue').default);
Vue.component('casignatura-table-component', require('./components/casignatura/CasignaturaTableComponent.vue').default);

Vue.component('centidad-table-component', require('./components/centidad/CentidadTableComponent.vue').default);
Vue.component('centidad-form-component', require('./components/centidad/CentidadFormComponent.vue').default);

Vue.component('cmunicipio-form-component', require('./components/cmunicipio/CmunicipioFormComponent.vue').default);
Vue.component('cmunicipio-table-component', require('./components/cmunicipio/CmunicipioTableComponent.vue').default);

Vue.component('clocalidad-table-component', require('./components/clocalidad/ClocalidadTableComponent.vue').default);
Vue.component('clocalidad-form-component', require('./components/clocalidad/ClocalidadFormComponent.vue').default);

Vue.component('cmotivobaja-form-component', require('./components/cmotivobaja/CmotivobajaFormComponent.vue').default);
Vue.component('cmotivobaja-table-component', require('./components/cmotivobaja/CmotivobajaTableComponent.vue').default);

Vue.component('cmovimiento-table-component', require('./components/cmovimiento/CmovimientoTableComponent.vue').default);
Vue.component('cmovimiento-form-component', require('./components/cmovimiento/CmovimientoFormComponent.vue').default);

Vue.component('cperiodo-form-component', require('./components/cperiodo/CperiodoFormComponent.vue').default);
Vue.component('cperiodo-table-component', require('./components/cperiodo/CperiodoTableComponent.vue').default);

Vue.component('cpersona-form-component', require('./components/cpersona/CpersonaFormComponent.vue').default);
Vue.component('cpersona-table-component', require('./components/cpersona/CpersonaTableComponent.vue').default);

Vue.component('calumnomovimiento-form-component', require('./components/calumnomovimiento/CalumnomovimientoFormComponent.vue').default);
Vue.component('calumnomovimiento-table-component', require('./components/calumnomovimiento/CalumnomovimientoTableComponent.vue').default);

Vue.component('cevaluacion-table-component', require('./components/cevaluacion/CevaluacionTableComponent.vue').default);
Vue.component('cevaluacion-form-component', require('./components/cevaluacion/CevaluacionFormComponent.vue').default);

Vue.component('cgrupo-form-component', require('./components/cgrupo/CgrupoFormComponent.vue').default);
Vue.component('cgrupo-table-component', require('./components/cgrupo/CgrupoTableComponent.vue').default);



const app = new Vue({
    store,
    el: '#vue-app',
});
