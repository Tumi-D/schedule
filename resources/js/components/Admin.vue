<template>
    <div>
        <v-app>
            <v-navigation-drawer v-model="drawer" app clipped>
                <v-list dense>
                    <v-list-item exact :to="{ name: 'dashboard' }">
                        <v-list-item-action>
                            <v-icon>dashboard</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>Dashboard</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <div v-if="$auth.isAdmin()">
                        <v-divider></v-divider>
                        <v-list-item exact :to="{ name: 'users' }">
                            <v-list-item-action>
                                <v-icon>wc</v-icon>
                            </v-list-item-action>
                            <v-list-item-content>
                                <v-list-item-title>Users</v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </div>
                    <v-divider></v-divider>
                    <v-list-item exact :to="{ name: 'location' }">
                        <v-list-item-action>
                            <v-icon>location_on</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>Locations</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-divider></v-divider>
                    <v-list-item exact :to="{ name: 'setting' }">
                        <v-list-item-action>
                            <v-icon>settings</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>Settings</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-divider></v-divider>
                </v-list>
            </v-navigation-drawer>

            <v-app-bar app clipped-left>
                <v-app-bar-nav-icon
                    @click.stop="drawer = !drawer"
                ></v-app-bar-nav-icon>
                <v-toolbar-title>Scheduler</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-switch v-model="flat" class="ma-6"></v-switch>
                <v-badge avatar bordered overlap>
                    <template v-slot:badge>
                        <v-btn icon x-small>
                            4
                        </v-btn>
                    </template>
                    <v-btn icon large>
                        <v-icon>mdi-bell</v-icon>
                    </v-btn>
                </v-badge>
            </v-app-bar>

            <v-content>
                <v-container fluid fill-height>
                    <v-layout align-center justify-center>
                        <v-flex>
                            <keep-alive>
                                <router-view></router-view>
                            </keep-alive>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-content>

            <v-footer app>
                <span>&copy; 2019</span>
            </v-footer>
        </v-app>
    </div>
</template>

<script>
export default {
    props: {
        source: String
    },
    data: () => ({
        flat: false,
        drawer: null,
        lorem:
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque aspernatur totam vitae natus qui dolor, eius, exercitationem delectus quae provident velit iste expedita ad sunt facere laborum voluptatibus iure voluptatem!"
    }),
    created() {
        // this.$vuetify.theme.dark = false;
        // console.log(Echo);
        Echo.join(`chat`)
            .here(users => {
                console.log("present user", users);
            })
            .joining(user => {
                console.log(user.name);
            })
            .leaving(user => {
                console.log(user.name);
            });
        // Echo.private(`App.User.` + this.user.id).notification(notification => {
        //     console.log(notification);
        // });
    }
};
</script>

<style>
.v-list-item {
    text-decoration: none;
}
</style>
