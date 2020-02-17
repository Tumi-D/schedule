<template>
    <v-timeline>
        <v-timeline-item v-for="(activity, i) in activities" :key="i" small>
            <!-- :color="year.color" -->

            <template v-slot:opposite>
                <!-- :class="`headline font-weight-bold ${year.color}--text`" -->

                <span
                    :class="`headline font-weight-bold cyan--text`"
                    v-text="activity.created_at"
                ></span>
            </template>
            <div class="py-4">
                <h2 :class="`headline font-weight-light mb-4 cyan--text`">
                    {{ activity.description }}
                </h2>
                <div>
                    <!-- Lorem ipsum dolor sit amet, no nam oblique veritus. Commune
                    scaevola imperdiet nec ut, sed euismod convenire principes
                    at. Est et nobis iisque percipit, an vim zril disputando
                    voluptatibus, vix an salutandi sententiae. -->
                    You {{ activity.description }} a
                    <span v-show="activity.subject == 'App\\User'">
                        User
                    </span>
                    <span v-show="activity.subject == 'App\\Location'">
                        Location
                    </span>
                </div>
            </div>
        </v-timeline-item>
    </v-timeline>
</template>

<script>
export default {
    data: () => ({
        // years: [
        //     {
        //         color: "cyan",
        //         year: "1960"
        //     },
        //     {
        //         color: "green",
        //         year: "1970"
        //     },
        //     {
        //         color: "pink",
        //         year: "1980"
        //     },
        //     {
        //         color: "amber",
        //         year: "1990"
        //     },
        //     {
        //         color: "orange",
        //         year: "2000"
        //     }
        // ],
        activities: []
    }),
    created() {
        this.getUserActivities();
    },

    methods: {
        getUserActivities() {
            axios.get("/api/activities").then(res => {
                console.log(res.data.data);
                this.activities = res.data.data.reverse();
                console.log(this.activities);
            });
        }
    },
    computed: {
        // model() {
        //     return this.activities.filter(activity => {
        //         console.log(activity);
        //         // if (activity.subject == "App\\User") {
        //         //     return "User";
        //         // }
        //         // if (activity.subject == "App\\Location") {
        //         //     return "Location";
        //         // }
        //         // console.log(notification.read_at);
        //         // return notification.read_at == null;
        //     });
        // }
    }
};
</script>

<style></style>
