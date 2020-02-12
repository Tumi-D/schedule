/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import Vuetify from "vuetify";
import swalPlugin from "./plugins/VueSweetalert2";
import router from "./routes/index";
import "vuetify/dist/vuetify.min.css";
import "material-design-icons-iconfont/dist/material-design-icons.css";
import Auth from "./handlers/auth";
Vue.use(swalPlugin);
Vue.use(Vuetify);
Vue.prototype.$auth = new Auth(window.user);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component("Admin", require("./components/Admin.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    el: "#app",
    router,
    vuetify: new Vuetify({
        theme: { dark: true }
        // theme: {
        //     themes: {
        //         light: {
        //             primary: "#3f51b5",
        //             secondary: "#b0bec5",
        //             accent: "#8c9eff",
        //             error: "#b71c1c"
        //         }
        //     }
        // }
    })
});
