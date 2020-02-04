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
                Latest Schedule Placements
                <v-text-field
                    solo
                    label="Search"
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
                            v-for="(item, index) in labels"
                            :key="index"
                        >
                            {{ item }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in schedule" :key="index">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td v-if="schedule.length === 0">
                            <!-- <center><h1>Sorry No Schedule</h1></center> -->
                        </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
    </v-card>
</template>

<script>
export default {
    data: () => ({
        labels: [],
        value: [200, 675, 410, 390, 310, 460, 250, 240, 737, 848],
        schedule: []
    }),
    created() {
        this.initialize();
        console.log(this.schedule.length);
    },

    methods: {
        initialize() {
            axios
                .get("/api/locations")
                .then(res => {
                    res.data.data.map((roles, index) => {
                        this.labels.push(roles.name);
                    });
                })
                .catch(err => {
                    console.log(err);
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
