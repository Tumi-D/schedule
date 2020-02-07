<template>
    <v-card class="mt-4 mx-auto" max-width="90%">
        <v-sheet class="v-sheet--offset mx-auto" color="cyan" elevation="12">
            <v-sparkline
                :labels="labels"
                :value="value"
                color="white"
                line-width="2"
                padding="16"
            ></v-sparkline>
        </v-sheet>

        <v-card-text class="pt-0">
            <div class="title font-weight-light mb-2">Schedule Placements</div>
            <div class="subheading font-weight-light grey--text">
                Latest Schedule Placements for {{ date }}
                <v-text-field
                    solo
                    label="Search By Name"
                    append-icon="search"
                ></v-text-field>
            </div>
            <v-divider class="my-2"></v-divider>
            <v-icon class="mr-2" small>
                mdi-clock
            </v-icon>
            <span class="caption grey--text font-weight-light"
                >Schedule geneerated 26 minutes ago</span
            >
        </v-card-text>
        <v-simple-table fixed-header height="300px">
            <template v-slot:default>
                <thead>
                    <tr>
                        <th
                            class="text-left"
                            style="font"
                            v-for="(item, index) in labels"
                            :key="index"
                        >
                            <v-chip color="green" class="ma-2">
                                {{ item }}
                            </v-chip>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- {{ propertyName }}: {{ item }} ({{ index }}) -->
                        <td v-for="(value, index) in users" :key="index">
                            <span
                                v-for="(newvalue, index) in value"
                                :key="index"
                            >
                                <v-chip color="blue" class="ma-2">
                                    {{ newvalue }}
                                </v-chip>
                            </span>
                            <hr />
                        </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
        <!-- *141# -->
    </v-card>
</template>
<script>
export default {
    data: () => ({
        labels: [],
        value: [],
        schedule: [],
        date: "",
        users: [],
        generated: "",
        search: ""
    }),
    created() {
        this.initialize();
        this.getSchedule();
    },

    methods: {
        initialize() {
            axios
                .get("/api/locations")
                .then(res => {
                    res.data.data.map((data, index) => {
                        this.labels.push(data.name);
                    });
                })
                .catch(err => {
                    console.log(err);
                });
        },
        getSchedule() {
            axios
                .get("/api/recentschedule")
                .then(res => {
                    this.date = res.data.date;
                    res.data.data.map((data, index) => {
                        this.value.push(data.placements.numbers);
                        this.schedule.push(data.placements);
                    });
                    this.schedule.map((data, index) => {
                        this.users.push(data.users);
                    });
                })
                .catch(err => {
                    console.log(err);
                });
        }
    },
    computed: {
        filteredList() {
            return this.users.filter(user => {
                return user.toLowerCase().includes(this.search.toLowerCase());
                // user.filter(use => {
                //     return use
                //         .toLowerCase()
                //         .includes(this.search.toLowerCase());
                //     console.log(user);
                // });
                console.log(user);
            });
        }
    }
};
</script>
<style>
.v-sheet--offset {
    top: -24px;
    position: relative;
}
</style>
