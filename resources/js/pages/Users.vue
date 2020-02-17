<template>
    <v-data-table
        :headers="headers"
        :items="tableData"
        :items-per-page="5"
        sort-by="name"
        class="elevation-1"
    >
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>USERS</v-toolbar-title>
                <v-divider class="mx-4" inset vertical></v-divider>
                <v-spacer></v-spacer>
                <v-dialog v-model="dialog" max-width="500px">
                    <template v-slot:activator="{ on }">
                        <v-btn color="primary" dark class="mb-2" v-on="on"
                            >Add User</v-btn
                        >
                    </template>
                    <v-card>
                        <v-card-title>
                            <span class="headline">{{ formTitle }}</span>
                        </v-card-title>

                        <v-card-text>
                            <v-container>
                                <v-row>
                                    <v-col cols="12" sm="12" md="6">
                                        <v-text-field
                                            v-model="editedItem.name"
                                            label="Username"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="12" md="6">
                                        <v-text-field
                                            v-model="editedItem.email"
                                            label="Email"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="12" md="6">
                                        <v-text-field
                                            v-model="editedItem.phone"
                                            label="Telephone"
                                            v-mask="mask"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="12" md="6">
                                        <v-text-field
                                            v-model="editedItem.dob"
                                            label="Date"
                                            v-mask="dobmask"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="12" md="12">
                                        <v-select
                                            v-model="editedItem.roles"
                                            :items="allRoles"
                                            attach
                                            chips
                                            item-text="name"
                                            label="Roles"
                                            multiple
                                            return-object
                                        ></v-select>
                                    </v-col>
                                    <!-- <v-col cols="12" sm="12" md="6">
                                        <v-select
                                            :items="allRoles"
                                            attach
                                            chips
                                            label="Roles"
                                            multiple
                                        ></v-select>
                                    </v-col> -->
                                    <!-- <v-col cols="12" sm="12" md="6">
                                        <v-text-field
                                            :append-icon="
                                                show4
                                                    ? 'mdi-eye'
                                                    : 'mdi-eye-off'
                                            "
                                            :rules="[rules.required]"
                                            :type="show4 ? 'text' : 'password'"
                                            name="input-10-2"
                                            label="Password"
                                            hint="Password must be least 8 characters"
                                            v-model="password"
                                            @click:append="show4 = !show4"
                                        ></v-text-field>
                                    </v-col> -->
                                    <!-- <v-col cols="12" sm="12" md="6"> -->
                                    <!-- <v-text-field
                                            v-model="editedItem.password"
                                            label="Confirm Password"
                                        ></v-text-field> -->
                                    <!-- <v-text-field
                                            :append-icon="
                                                show3
                                                    ? 'mdi-eye'
                                                    : 'mdi-eye-off'
                                            "
                                            :rules="[rules.required]"
                                            :type="show3 ? 'text' : 'password'"
                                            name="input-10-2"
                                            label="Confirm Password"
                                            hint="Please repeat  password"
                                            v-model="cpassword"
                                            @click:append="show3 = !show3"
                                        ></v-text-field>
                                    </v-col> -->
                                </v-row>
                            </v-container>
                        </v-card-text>

                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="blue darken-1" text @click="close"
                                >Cancel</v-btn
                            >
                            <v-btn color="blue darken-1" text @click="save"
                                >Save</v-btn
                            >
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-toolbar>
        </template>
        <template v-slot:item.role="{ item }">
            <!-- <v-icon small class="mr-2" @click="editItem(item)">
                edit
            </v-icon> -->

            <v-chip class="ma-2" v-if="item.role !== null">
                {{ item.role.name }}
            </v-chip>
            <v-chip class="ma-2" v-else>
                N/A
            </v-chip>
        </template>
        <template v-slot:item.action="{ item }">
            <v-icon small class="mr-2" @click="editItem(item)">
                edit
            </v-icon>
            <v-icon small @click="deleteItem(item)">
                delete
            </v-icon>
        </template>
        <template v-slot:no-data>
            <v-btn color="primary" @click="initialize">Ooops Click Here</v-btn>
        </template>
    </v-data-table>
</template>
<script>
import { mask } from "vue-the-mask";

export default {
    directives: {
        mask
    },
    data: () => ({
        dialog: false,
        headers: [
            { text: "Username", value: "name" },
            { text: "Email", value: "email" },
            { text: "Phone Number", value: "phone" },
            { text: "Roles", value: "role" },
            { text: "DOB", value: "dob" },
            { text: "Actions", value: "action", sortable: false }
        ],
        show4: false,
        show3: false,
        password: "",
        cpassword: "",
        rules: {
            required: value => !!value || "Required.",
            min: v => v.length >= 8 || "Min 8 characters"
        },
        allRoles: [],
        tableData: [],
        editedIndex: -1,
        editedItem: {
            name: "",
            email: "",
            phone: "",
            dob: "",
            roles: []
            // password: ""
        },
        defaultItem: {
            name: "",
            email: "",
            phone: "",
            dob: "",
            // password: "",
            roles: []
        },
        mask: "###-###-####",
        dobmask: "####-##-##",
        fromDateMenu: false,
        fromDateVal: null,
        minDate: "1960-01-01",
        maxDate: "2000-01-01"
    }),

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? "Add User" : "Edit User";
        }
        // fromDateDisp() {
        //     return this.fromDateVal;
        //     // format/do something with date
        // }
    },

    watch: {
        dialog(val) {
            val || this.close();
        }
    },
    mounted() {
        this.initialize();
    },

    beforeMount() {},

    methods: {
        initialize() {
            axios
                .get("/api/users")
                .then(res => {
                    this.tableData = res.data.data;
                    // console.log(this.tableData);
                })
                .catch(err => {
                    console.log(err);
                });
            axios
                .get("/api/roles")
                .then(res => {
                    this.allRoles = [];
                    res.data.data.map((roles, index) => {
                        this.allRoles.push(roles.name);
                    });
                })
                .catch(err => {
                    console.log(err);
                });
        },

        editItem(item) {
            this.editedIndex = this.tableData.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            const index = this.tableData.indexOf(item);
            // confirm("Are you sure you want to delete this User ?") &&
            //     this.tableData.splice(index, 1);
            this.$swal
                .fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                })
                .then(result => {
                    console.log(result);
                    if (result.value) {
                        this.tableData.splice(index, 1);
                        this.$swal.fire(
                            "Deleted!",
                            "User has been deleted.",
                            "success"
                        );
                    }
                });
        },

        close() {
            this.dialog = false;
            setTimeout(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            }, 300);
        },

        save() {
            if (this.editedIndex > -1) {
                Object.assign(
                    this.tableData[this.editedIndex],
                    this.editedItem
                );
                axios
                    .put("/api/users/" + this.editedItem.id, this.editedItem)
                    .then(response => {
                        // console.log(response);
                        alert(response.data.message);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            } else {
                this.tableData.push(this.editedItem);
                console.log(this.editedItem);
                axios
                    .post("/api/users", this.editedItem)
                    .then(response => {
                        console.log(response);
                        this.$swal.fire({
                            title: "New User Added",
                            text: response.data.message,
                            icon: "success"
                        });
                    })
                    .catch(err => {
                        console.log(err.message);
                    });
            }
            this.close();
        }
    }
};
</script>
