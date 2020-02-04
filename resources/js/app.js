/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import Vuetify from "vuetify";
import VueRouter from "vue-router";
import swalPlugin from "./plugins/VueSweetalert2";
Vue.use(swalPlugin);
Vue.use(Vuetify);
Vue.use(VueRouter);

import "vuetify/dist/vuetify.min.css";
import "material-design-icons-iconfont/dist/material-design-icons.css";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("Admin", require("./components/Admin.vue").default);
import Dashboard from "./pages/Dashboard";
import Setting from "./pages/Setting";
import Users from "./pages/Users";
import Roles from "./pages/Roles";
import Permissions from "./pages/Permission";
import Location from "./pages/Location";

// import Admin from "./components/Admin.vue";
import Auth from "./handlers/auth";
Vue.prototype.$auth = new Auth(window.user);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/admin/",
            component: Dashboard,
            name: "dashboard"
        },
        {
            path: "/admin/users",
            component: Users,
            name: "users"
        },
        {
            path: "/admin/roles",
            component: Roles,
            name: "roles"
        },
        {
            path: "/admin/settings",
            component: Setting,
            name: "setting"
        },
        {
            path: "/admin/permisions",
            component: Permissions,
            name: "permissions"
        },
        {
            path: "/admin/location",
            component: Location,
            name: "location"
        }
    ]
});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const router = new VueRouter({
//     mode: "history",
//     router: routes
// });
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
