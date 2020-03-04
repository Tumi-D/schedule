<template>
    <v-data-table
        :headers="headers"
        :items="tableData"
        sort-by="name"
        class="elevation-1"
        :items-per-page="5"
    >
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>Team</v-toolbar-title>
                <v-divider class="mx-4" inset vertical></v-divider>
                <v-spacer></v-spacer>
                <v-dialog v-model="dialog" max-width="500px">
                    <template v-slot:activator="{ on }">
                        <v-btn color="primary" dark class="mb-2" v-on="on"
                            >New Team</v-btn
                        >
                    </template>
                    <v-card>
                        <v-card-title>
                            <span class="headline">{{ formTitle }}</span>
                        </v-card-title>

                        <v-card-text>
                            <v-container>
                                <v-row>
                                    <v-col cols="12" sm="6" md="6">
                                        <v-text-field
                                            v-model="editedItem.name"
                                            label="Team Id"
                                            disabled
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="12" md="12">
                                        <v-text-field
                                            v-model="editedItem.name"
                                            label="Team name"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="12" md="12">
                                        <v-text-field
                                            v-model="editedItem.name"
                                            label="Team Leader"
                                        ></v-text-field>
                                    </v-col>
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
        <template v-slot:item.action="{ item }">
            <v-icon small class="mr-2" @click="editItem(item)">
                edit
            </v-icon>
            <v-icon small @click="deleteItem(item)">
                delete
            </v-icon>
        </template>

        <template v-slot:no-data>
            <v-btn color="primary" @click="initialize">Reset</v-btn>
        </template>
    </v-data-table>
</template>

<script>
export default {
    data: () => ({
        dialog: false,
        headers: [
            { text: "Id", value: "id" },
            { text: "Name", value: "name" },
            { text: "Leader", value: "name", sortable: false }
        ],
        search: "",
        tableData: [],
        editedIndex: -1,
        editedItem: {
            id: 0,
            name: "",
            priority: "",
            description: "",
            action: 0
        },
        defaultItem: {
            id: 0,
            name: "",
            priority: "Normal",
            description: "",
            action: 0
        },
        switch1: "Normal"
    }),

    computed: {
        formTitle() {
            return this.editedIndex === -1 ? "New Location" : "Edit Location";
        }
    },

    watch: {
        dialog(val) {
            val || this.close();
        }
    },

    created() {
        this.initialize();
    },

    methods: {
        initialize() {
            axios
                .get("/api/teams")
                .then(res => {
                    this.tableData = res.data.data;
                })
                .catch(err => {
                    console.log(err.message);
                });
        },

        editItem(item) {
            this.editedIndex = this.tableData.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            const index = this.tableData.indexOf(item);
            confirm("Are you sure you want to delete this item?") &&
                this.tableData.splice(index, 1);
            axios
                .delete("/api/teams/" + item.id)
                .then(response => {
                    console.log(response);
                    this.$swal.fire({
                        title: "Team deleted",
                        text: response.data.message,
                        icon: "success"
                    });
                })
                .catch(err => {
                    console.log(err.message);
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
                    .put("/api/teams/" + this.editedItem.id, this.editedItem)
                    .then(response => {
                        console.log(response);
                        this.$swal.fire({
                            title: "Location Updated ",
                            text: response.data.message,
                            icon: "success"
                        });
                    })
                    .catch(err => {
                        console.log(err.message);
                    });
            } else {
                this.tableData.push(this.editedItem);
                console.log(this.editedItem);
                axios
                    .post("/api/teams", this.editedItem)
                    .then(response => {
                        console.log(response);
                        this.$swal.fire({
                            title: "Location Added",
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
<style></style>
