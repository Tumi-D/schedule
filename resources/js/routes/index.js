window.Vue = require("vue");
import VueRouter from "vue-router";
Vue.use(VueRouter);
import Dashboard from "../pages/Dashboard";
import Setting from "../pages/Setting";
import Users from "../pages/Users";
import Roles from "../pages/Roles";
import Permissions from "../pages/Permission";
import Location from "../pages/Location";
import Activity from "../pages/activity";

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
        },
        {
            path: "/admin/activity",
            component: Activity,
            name: "activity"
        }
    ]
});

export default router;
