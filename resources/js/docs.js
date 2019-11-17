import hljs from 'highlightjs';

hljs.initHighlightingOnLoad();

window.Vue = require('vue');

Vue.component('api-method-description', require('./components/api/ApiMethodDescription.vue').default);
Vue.component('api-method', require('./components/api/ApiMethod.vue').default);
Vue.component('api-method-summary', require('./components/api/ApiMethodSummary.vue').default);
Vue.component('api-method-spec', require('./components/api/ApiMethodSpec.vue').default);
Vue.component('api-method-path-parameters', require('./components/api/ApiMethodPathParameter.vue').default);
Vue.component('api-method-query-parameters', require('./components/api/ApiMethodQueryParameter.vue').default);
Vue.component('api-method-parameter', require('./components/api/ApiMethodParameter.vue').default);
Vue.component('api-method-response', require('./components/api/ApiMethodResponse.vue').default);
Vue.component('api-method-response-example', require('./components/api/ApiMethodResponseExample.vue').default);
Vue.component('api-method-response-example-description', require('./components/api/ApiMethodResponseExampleDescription.vue').default);
Vue.component('api-method-headers', require('./components/api/ApiMethodHeaders.vue').default);

let docs = new Vue({
    el: '#docs',
});
