<template>
    <v-container fill-height fluid grid-list-xl>
        <v-layout justify-center wrap>
            <v-flex xs12 md8>
                <span
                    color="green"
                    title="Edit Profile"
                    text="Complete your profile"
                >
                    <v-form>
                        <v-container py-0>
                            <v-layout wrap>
                                <v-flex xs12 md4>
                                    <v-text-field
                                        label="Church"
                                        disabled
                                        value="EWC"
                                    />
                                </v-flex>
                                <v-flex xs12 md4>
                                    <v-text-field
                                        class="purple-input"
                                        label="User Name"
                                        v-model="username"
                                    />
                                </v-flex>
                                <v-flex xs12 md4>
                                    <v-text-field
                                        label="Date Of Birth"
                                        class="purple-input"
                                        v-model="dob"
                                    />
                                </v-flex>
                                <v-flex xs12 md6>
                                    <v-text-field
                                        label="Mobile (Preferrably WhatsApp)"
                                        class="purple-input"
                                        v-model="mobile"
                                    />
                                </v-flex>
                                <v-flex xs12 md6>
                                    <v-text-field
                                        label="Email Address"
                                        class="purple-input"
                                        v-model="email"
                                    />
                                </v-flex>
                                <v-flex xs12 md12>
                                    <v-text-field
                                        label="Address"
                                        class="purple-input"
                                        v-model="address"
                                    />
                                </v-flex>
                                <!-- <v-flex xs12 md4>
                                    <v-text-field
                                        label="City"
                                        class="purple-input"
                                    />
                                </v-flex>
                                <v-flex xs12 md4>
                                    <v-text-field
                                        label="Country"
                                        class="purple-input"
                                    />
                                </v-flex>
                                <v-flex xs12 md4>
                                    <v-text-field
                                        class="purple-input"
                                        label="Postal Code"
                                        type="number"
                                    />
                                </v-flex> -->
                                <v-flex xs12>
                                    <v-textarea
                                        class="purple-input"
                                        label="About Me"
                                        value="Lorem ipsum dolor sit amet, consectetur adipiscing elit."
                                    />
                                </v-flex>
                                <v-flex xs12 text-xs-right>
                                    <v-btn
                                        class="mx-0 font-weight-light"
                                        color="success"
                                        @click="updateUser()"
                                    >
                                        Update Profile
                                    </v-btn>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-form>
                </span>
            </v-flex>
            <v-flex xs12 md4>
                <span class="v-card-profile">
                    <v-avatar slot="offset" class="mx-auto d-block" size="130">
                        <img
                            src="https://images.squarespace-cdn.com/content/v1/59e6bf43cf81e09a241d76e9/1568427747164-1AGA4V16VTZC6H6BV4BE/ke17ZwdGBToddI8pDm48kJVpFSlFyqXiVHvbjbj_lw17gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z5QPOohDIaIeljMHgDF5CVlOqpeNLcJ80NK65_fV7S1UXirmb4NRSS8LU5_AMuFzTyGbo17ZbPnPSNrHO-3oGd-Z5819XDE-T-fE_EmFUjQwQ/_MG_2665.jpg"
                        />
                        <!-- src="https://demos.creative-tim.com/vue-material-dashboard/img/marc.aba54d65.jpg" -->
                    </v-avatar>
                    <v-card-text class="text-xs-center">
                        <h6 class="category text-gray font-weight-thin mb-3">
                            EWC / PROTOCOL
                        </h6>
                        <h4 class="card-title font-weight-light">
                            {{ username }}
                        </h4>
                        <p class="card-description font-weight-light">
                            <!-- Don't be scared of the truth because we need to
                            restart the human foundation in truth And I love you
                            like Kanye loves Kanye I love Rick Owens’ bed design
                            but the back is... -->
                            God is building movements not monuments Prophet
                            Gideon Danso
                        </p>
                        <!-- <v-btn color="success" rounded class="font-weight-light"
                            >Follow</v-btn
                        > -->
                    </v-card-text>
                </span>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
export default {
    data: () => ({
        dob: "",
        username: "",
        mobile: "",
        email: "",
        address: "",
        id: 0,
        user: {
            name: "",
            email: "",
            phone: "",
            dob: ""
            // password: ""
        }
    }),
    created() {
        this.loaduser();
    },
    methods: {
        loaduser() {
            this.username = window.user.user.name;
            this.dob = window.user.user.dob;
            this.mobile = window.user.user.phone;
            // this.adddress = window.user.user.adddress;
            this.email = window.user.user.email;
            this.id = window.user.user.id;
            this.user.name = this.username;
            this.user.email = this.email;
            this.user.phone = this.mobile;
            this.user.dob = this.dob;
        },
        updateUser() {
            axios({
                method: "put",
                url: "/api/update/" + this.id,
                data: {
                    name: this.username,
                    email: this.email,
                    phone: this.mobile,
                    dob: this.dob
                }
            })
                .then(response => {
                    console.log(response);
                    alert(response.data.message);
                })
                .catch(err => {
                    console.log(err);
                });
        }
    }
};
</script>
<style>
.v-card > :first-child:not(.v-btn):not(.v-chip) {
    border-top-left-radius: inherit;
    border-top-right-radius: inherit;
}
.v-card-profile .v-offset {
    top: unset !important;
    margin-bottom: unset !important;
    margin-top: -50px;
}
.v-card .v-offset {
    top: -20px !important;
    margin-bottom: -20px !important;
}
.v-offset {
    margin: 0 auto;
    margin-top: 0px;
    margin-bottom: 0px;
    max-width: calc(100% - 32px);
    position: relative;
}
* {
    background-repeat: no-repeat;
    padding: 0;
    margin: 0;
}
*,
::after,
::before {
    -webkit-box-sizing: inherit;
    box-sizing: inherit;
}
</style>
