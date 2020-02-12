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
                <v-toolbar-title>Location</v-toolbar-title>
                <v-divider class="mx-4" inset vertical></v-divider>
                <v-spacer></v-spacer>
                <v-dialog v-model="dialog" max-width="500px">
                    <template v-slot:activator="{ on }">
                        <v-btn color="primary" dark class="mb-2" v-on="on"
                            >New Location</v-btn
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
                                            label="Location name"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12" sm="6" md="6">
                                        <!-- <v-text-field
                                            v-model="editedItem.priority"
                                            label="Priority"
                                        ></v-text-field> -->
                                        <v-switch
                                            v-model="editedItem.priority"
                                            :label="
                                                `Priority: ${editedItem.priority}`
                                            "
                                            :color="
                                                editedItem.priority == 'High'
                                                    ? 'green'
                                                    : 'blue'
                                            "
                                        ></v-switch>
                                    </v-col>
                                    <v-col cols="12" sm="12" md="12">
                                        <v-textarea
                                            v-model="editedItem.description"
                                            clearable
                                            clear-icon="cancel"
                                            label="Description"
                                            value="This is clearable text."
                                        ></v-textarea>
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
        <template v-slot:item.priority="{ item }">
            <!-- <v-icon small class="mr-2" @click="editItem(item)">
                edit
            </v-icon> -->

            <v-chip
                class="ma-2"
                :color="item.priority == 'High' ? 'green' : 'blue'"
            >
                {{ item.priority }}
            </v-chip>
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
            { text: "Location", value: "name" },
            { text: "Direction", value: "description", sortable: false },
            { text: "Priority", value: "priority", sortable: false },
            { text: "Actions", value: "action", sortable: false }
        ],
        tableData: [],
        editedIndex: -1,
        editedItem: {
            name: "",
            priority: "",
            description: "",
            action: 0
        },
        defaultItem: {
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
                .get("/api/locations")
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
                    .put(
                        "/api/locations/" + this.editedItem.id,
                        this.editedItem
                    )
                    .then(response => {
                        console.log(response);
                    })
                    .catch(err => {
                        console.log(err.message);
                    });
            } else {
                this.tableData.push(this.editedItem);
                console.log(this.editedItem);
                axios
                    .post("/api/locations", this.editedItem)
                    .then(response => {
                        console.log(response);
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
