<template>
    <section class="car">
        <!-- <h1 class="text-center font black--text car-title">CAR</h1> -->
        <loading :active.sync="isLoading" :can-cancel="true" :is-full-page="false" color="#2849c6" loader="dots" background-color="transparent"></loading>
        <!-- <carousel-3d :autoplay="true" :autoplayHoverPause="true" :display="3" :border="1" :width="625" :height="350" v-if="!isLoading">
            <slide v-for="(slide, i) in cars" :index="i" :key="i">
                <router-link :to="{ name: 'category_detail', params : { id: slide.Id_car }} ">
                    <img :src="slide.URL_pic" class="car-image" >
                </router-link>
            </slide>
        </carousel-3d> -->
        <v-data-iterator :items="cars" :items-per-page.sync="itemsPerPage" :page.sync="page" hide-default-footer no-results-text="ไม่พบข้อมูลที่ค้นหา" no-data-text="ไม่มีข้อมูล">
        <template v-slot:default="props">
        <v-row justify="center" class="text-center">
            <v-col v-for="item in props.items" :key="item.Id_car" cols="12" sm="3" md="3" lg="3">
                <router-link :to="{ name: 'category_detail', params: { id: item.CarEvaID }}">
                    <v-hover v-slot:default="{ hover }">
                        <v-card :elevation="hover ? 12 : 2" width="350">
                            <v-img class="white--text align-end" height="150px" :src="checkImage(item.URL_pic)"></v-img>
                            <v-chip class="my-4 ml-2" label color="indigo darken-3 white--text">
                                {{ item.CarYear }}
                            </v-chip>
                            <v-chip class="my-4 mr-2" color="green" label text-color="white">
                                Passed Inspection
                            </v-chip>
                            <v-list-item-title class="mb-1 px-3 text-left font-weight-bold"> {{ item.CarBrandName }} {{ item.CarBrandGenName }} </v-list-item-title>
                            <v-card-text class="text--primary text-left">
                                {{ item.CarEngine  }} | {{ item.CarMile | numFormat }} km
                            </v-card-text>
                            <v-divider></v-divider>
                            <v-card-actions class="pa-1">
                                <v-card-text class="text--primary f-14 text-left">
                                    NO. {{ item.CarEvaID }}
                                </v-card-text>
                                <v-spacer></v-spacer>
                            </v-card-actions>
                        </v-card>
                    </v-hover>
                </router-link>
            </v-col>
        </v-row>
        </template>
        </v-data-iterator>
        <v-row class="mt-2" align="center" justify="center">
            <v-btn fab dark color="blue darken-3" class="mr-1" @click="formerPage">
                <v-icon>keyboard_arrow_left</v-icon>
            </v-btn>
            <v-btn fab dark color="blue darken-3" class="ml-1" @click="nextPage">
                <v-icon>keyboard_arrow_right</v-icon>
            </v-btn>
        </v-row>
        <div v-if="isLoading"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
        <v-divider class="car-underline"></v-divider>
        <div class="my-6 text-center">
            <router-link :to="{ name: 'category_index'}">
                <v-btn x-large color="success" dark> ALL INVENTORY </v-btn>
            </router-link>
          </div>
        <h2 class="text-center font car-subtitle">
            Looking for a car, think of Carcombine
        </h2>
        <h2 class="text-center font car-subtitle">
            The source of good quality second hand cars selected for you.
        </h2>
    </section>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import { mapGetters } from "vuex";
    import { RANDOM_CARS } from "@store/actions.type";
    export default {
        name: 'CarCarousel',
        components: { Loading },
        data: () => ({
            isLoading : true,
            page : 1,
            itemsPerPage : 4,
        }),
        created() {
            this.$store.dispatch(RANDOM_CARS);
            setTimeout(() => {
                this.isLoading = false
            },1800)
        },
        mounted() {

        },
        watch: {
        },
        computed: {
            ...mapGetters(["cars"]),
            numberOfPages () {
                return Math.ceil(this.cars.length / this.itemsPerPage)
            }
        },
        methods : {
            checkImage(image) {
                return image.includes(".jpg") ? image : '/images/no-image.png'
            },
            nextPage () {
                if (this.page + 1 <= this.numberOfPages) this.page += 1
            },
            formerPage () {
                if (this.page - 1 >= 1) this.page -= 1
            },
        }
    }
</script>
