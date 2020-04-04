<template>

    <v-col cols="12" md="9">
        <v-card class="pa-2" outlined tile>
            <v-form ref="form" class="ma-5">

                <v-row v-show="false">
                    <v-col cols="12" md="12">
                        <v-text-field v-model="search" label="ค้นหารถ" class="font-thai" outlined placeholder="Search ... " clearable append-icon="search" ></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" md="12">
                        <v-combobox v-model="brand_s" label="ค้นหาประเภทรถ" class="font-thai" outlined placeholder="Search ... " clearable append-icon="search" multiple  @change="addbrand">
                            <template v-slot:selection="{ attrs, item, select, selected }">
                                <v-chip
                                    v-bind="attrs"
                                    :input-value="selected"
                                    close
                                    @click:close="remove(item)"
                                >
                                    <strong>{{ item }}</strong>&nbsp;
                                    <span>(Brand)</span>
                                </v-chip>
                            </template>
                        </v-combobox>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" md="12">
                        <loading :active.sync="isLoading" :can-cancel="true" :is-full-page="false" color="#2849c6" loader="dots"></loading>
                        <div v-if="isLoading"><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
                    </v-col>
                </v-row>
                <v-row v-if="!isLoading">
                    <v-data-iterator
                        :items="cars"
                        :items-per-page.sync="itemsPerPage"
                        :page.sync="page"
                        :search="search"
                        hide-default-footer
                        no-results-text="ไม่พบข้อมูลที่ค้นหา"
                        no-data-text="ไม่มีข้อมูล"
                    >
                        <template v-slot:default="props">
                            <v-row>
                                <v-col v-for="item in props.items" :key="item.Id_car" cols="12" sm="6" md="4" lg="4">
                                    <router-link :to="{ name: 'category_detail', params: { id: item.CarBrandName }}">
                                        <v-hover v-slot:default="{ hover }">
                                            <v-card :elevation="hover ? 12 : 2">
                                                <v-img class="white--text align-end" height="200px" :src="checkImage(item.URL_pic)"></v-img>
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
                    <v-row class="mt-2 hidden-md-and-down" align="center" justify="center">
                        <v-pagination v-model="page" :length="numberOfPages" :total-visible="9"></v-pagination>
                    </v-row>
                    <v-row class="mt-2 hidden-lg-and-up" align="center" justify="center">
                        <v-btn
                            fab
                            dark
                            color="blue darken-3"
                            class="mr-1"
                            @click="formerPage"
                        >
                            <v-icon>keyboard_arrow_left</v-icon>
                        </v-btn>
                        <v-btn
                            fab
                            dark
                            color="blue darken-3"
                            class="ml-1"
                            @click="nextPage"
                        >
                            <v-icon>keyboard_arrow_right</v-icon>
                        </v-btn>
                    </v-row>
                </v-row>
            </v-form>

        </v-card>
    </v-col>
</template>

<script>

    import Search from '@components/Search';
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import { mapGetters } from "vuex";
    import { SEARCH_CARS,FETCH_CARS,FETCH_BRANDSSS } from "@store/actions.type";


    export default {
        name: 'Car',
        props: { cars_form: { type: Object}},
        components: { Loading,Search },
        data: () => ({
            brand_s: [],
            mile: [0,2000000],
            price: [0,1000000],
            year: [0,2021],
            search       : '',
            page         : 1,
            itemsPerPage : 18,
            isLoading    : true,
            forms : {
                items:[],
            },
        }),
        mounted() {
            this.$store.dispatch(FETCH_CARS, this.$route.params.type);
            setTimeout(() => {
                this.isLoading = false
            },1800)
        },
        computed: {
            ...mapGetters(["cars","brands_select"]),
            numberOfPages () {
                return Math.ceil(this.cars.length / this.itemsPerPage)
            }
        },
        methods: {

            nextPage () {
                if (this.page + 1 <= this.numberOfPages) this.page += 1
            },
            formerPage () {
                if (this.page - 1 >= 1) this.page -= 1
            },
            checkImage(image)
            {
                return image.includes(".jpg") ? image : '/images/no-image.png'
            },
            addbrand(){

                this.$store.dispatch(FETCH_BRANDSSS, this.brand_s);

                this.$set(this.cars_form, 'brand_selects', this.brand_s)
                this.$set(this.cars_form, 'mile', this.mile)
                this.$set(this.cars_form, 'year', this.year)
                this.$store.dispatch(SEARCH_CARS, this.cars_form);
                // this.$store.dispatch(FETCH_BRANDSSS, this.cars_form);
            },
            attrs(){

            },
            remove (item) {
                this.brand_s.splice(this.brand_s.indexOf(item), 1)
                this.brand_s = [...this.brand_s]
                this.$store.dispatch(FETCH_BRANDSSS, this.brand_s);
                this.$store.dispatch(SEARCH_CARS, this.cars_form);
            },
        }
    }
</script>

