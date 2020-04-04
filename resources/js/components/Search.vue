<template>
    <v-col cols="12" md="3">
        <v-card class="pa-2" outlined tile>
            <h2 class="text-center ma-5">FILTER</h2>

            <!--
            <v-divider class="mb-5"></v-divider>

            <v-col class="d-flex" cols="12" sm="12">
                <v-select
                    :items="brands"
                    label="ยี่ห้อ"
                    outlined
                    item-text="brand"
                    class="font-thai"
                    v-model="form.brand"
                    v-on:change="changeBrand"
                ></v-select>
            </v-col>

            <v-col class="d-flex" cols="12" sm="12">
                <v-select
                    :items="brand_model"
                    label="รุ่น"
                    outlined
                    item-text="model"
                    class="font-thai"
                    v-model="form.model"
                    v-on:change="changeModel"
                    :disabled="DisabledModel"
                    :messages="MessageModel"
                    :filled="DisabledModel"
                ></v-select>
            </v-col>
-->
            <v-col class="d-flex" cols="12" sm="12">
                <v-select
                    :items="gears"
                    label="ระบบเกียร์"
                    outlined
                    class="font-thai"
                    v-model="form.gear"
                    v-on:change="changeGear"
                ></v-select>
            </v-col>

            <v-col class="d-flex" cols="12" sm="12">
                <v-select
                    :items="colors"
                    item-text="name"
                    item-color="#00FFFF"
                    name="item"
                    label="สี"
                    outlined
                    class="font-thai"
                    v-model="form.color"
                    v-on:change="changeColor"
                    multiple >
                </v-select>
            </v-col>




            <v-col class="d-flex" cols="12" sm="12">
                <v-select
                    :items="insurances"
                    label="การประกัน"
                    outlined
                    class="font-thai"
                    v-model="form.insurance"
                    v-on:change="changeInsurance"
                ></v-select>
            </v-col>



            <v-row>
                <v-col cols="12" md="12">
                    <h2 class="text-center mt-2 mb-0">YEAR</h2>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field  v-model="form.year[0]" class="mt-0 pl-3 font-thai" type="number" outlined placeholder="ต่ำสุด" v-on:keyup="totalyear" disabled></v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field v-model="form.year[1]" class="mt-0 pr-3 font-thai" type="number" outlined placeholder="สูงสุด" v-on:keyup="totalyear" disabled></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col class="px-4">
                    <v-range-slider
                        v-model="form.year"
                        :max="max_y"
                        :min="min_y"
                        hide-details
                        class="align-center"
                        v-on:change="totalyear"
                    >
                    </v-range-slider>
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="12" md="12">
                    <h2 class="text-center mt-2 mb-0">MILE</h2>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field  v-model="form.mile[0]" class="mt-0 pl-3 font-thai" type="number" outlined placeholder="ต่ำสุด" v-on:keyup="range" disabled></v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field v-model="form.mile[1]" class="mt-0 pr-3 font-thai" type="number" outlined placeholder="สูงสุด" v-on:keyup="range" disabled></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col class="px-4">
                    <v-range-slider
                        v-model="form.mile"
                        :max="max"
                        :min="min"
                        hide-details
                        class="align-center"
                        v-on:change="range">
                    </v-range-slider>
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="12" md="12">
                    <h2 class="text-center mt-2 mb-0">PRICE</h2>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field  v-model="form.price[0]" class="mt-0 pl-3 font-thai" type="number" outlined placeholder="ต่ำสุด" v-on:keyup="all_price" disabled></v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field v-model="form.price[1]" class="mt-0 pr-3 font-thai" type="number" outlined placeholder="สูงสุด" v-on:keyup="all_price" disabled></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col class="px-4">
                    <v-range-slider
                        v-model="form.price"
                        :max="max_price"
                        :min="min_price"
                        hide-details
                        class="align-center"
                        v-on:change="all_price">
                    </v-range-slider>
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="12" md="12">
                    <h2 class="text-center mt-2 mb-0">MONTHLY</h2>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field  v-model="form.monthly[0]" class="mt-0 pl-3 font-thai" type="number" outlined placeholder="ต่ำสุด" v-on:keyup="all_monthly" disabled></v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                    <v-text-field v-model="form.monthly[1]" class="mt-0 pr-3 font-thai" type="number" outlined placeholder="สูงสุด" v-on:keyup="all_monthly" disabled></v-text-field>
                </v-col>
            </v-row>
            <v-row>
                <v-col class="px-4">
                    <v-range-slider
                        v-model="form.monthly"
                        :max="max_monthly"
                        :min="min_monthly"
                        hide-details
                        class="align-center"
                        v-on:change="all_monthly">
                    </v-range-slider>
                </v-col>
            </v-row>

            <v-divider class="ma-5"></v-divider>
            <v-col cols="12" md="12">
                <v-btn color="primary" text  block class="font-thai" large @click="clear()"> ล้างตัวกรองทั้งหมด </v-btn>
            </v-col>
        </v-card>
        <v-card cols="12" md="3" class="mt-5" outlined tile
                v-if="form.brand || form.model || form.color.length || form.gear || form.insurance || form.min_year || form.max_year || form.min_mile || form.max_mile || form.mile || form.year ||form.price">
            <v-subheader class="font-thai black--text"> รายการที่เลือก </v-subheader>
            <v-list>
                <template>


                    <v-list-item v-if="form.brand">
                        <v-list-item-action>
                            <!-- <v-icon>label</v-icon> -->
                            <img src="/images/icons/brand.png" class="detail-icon">
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="font-thai f-14"> ยี่ห้อ {{ form.brand }} </v-list-item-title>
                        </v-list-item-content>
                        <v-btn text icon color="red" @click="removeBrand">
                            <v-icon>close</v-icon>
                        </v-btn>
                    </v-list-item>

                    <v-divider v-if="form.model"></v-divider>
                    <v-list-item v-if="form.model">
                        <v-list-item-action>
                            <img src="/images/icons/model.png" class="detail-icon">
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="font-thai f-14"> รุ่น {{ form.model }} </v-list-item-title>
                        </v-list-item-content>
                        <v-btn text icon color="red" @click="removeModel">
                            <v-icon>close</v-icon>
                        </v-btn>
                    </v-list-item>

                    <v-divider v-if="form.gear"></v-divider>
                    <v-list-item v-if="form.gear">
                        <v-list-item-action>
                            <img src="/images/icons/year.png" class="detail-icon">
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="font-thai f-14"> ระบบเกียร์ {{ form.gear }} </v-list-item-title>
                        </v-list-item-content>
                        <v-btn text icon color="red" @click="removeGear">
                            <v-icon>close</v-icon>
                        </v-btn>
                    </v-list-item>

                    <v-divider v-if="form.color"></v-divider>
                    <div v-if="form.color">
                        <v-list-item v-for="(item, index) in form.color" :key="index">
                            <v-list-item-action>
                                <img src="/images/icons/color.png" class="detail-icon">
                            </v-list-item-action>
                            <v-list-item-content>
                                <v-list-item-title class="font-thai f-14"> สี {{ item }} </v-list-item-title>
                            </v-list-item-content>
                            <v-btn text icon color="red" @click="removeColor(index)">
                                <v-icon>close</v-icon>
                            </v-btn>
                        </v-list-item>
                    </div>

                    <v-divider v-if="form.insurance"></v-divider>
                    <v-list-item v-if="form.insurance">
                        <v-list-item-action>
                            <img src="/images/icons/insurance.png" class="detail-icon">
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="font-thai f-14"> {{ form.insurance }} </v-list-item-title>
                        </v-list-item-content>
                        <v-btn text icon color="red" @click="removeInsurance">
                            <v-icon>close</v-icon>
                        </v-btn>
                    </v-list-item>

                    <v-divider v-if="form.min_year"></v-divider>
                    <v-list-item v-if="form.min_year">
                        <v-list-item-action>
                            <img src="/images/icons/year.png" class="detail-icon">
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="font-thai f-14"> ปีที่สูงกว่า {{ form.min_year }} </v-list-item-title>
                        </v-list-item-content>
                        <v-list-item-action>
                            <v-btn text icon color="red" @click="removeMinYear">
                                <v-icon>close</v-icon>
                            </v-btn>
                        </v-list-item-action>
                    </v-list-item>

                    <v-divider v-if="form.max_year"></v-divider>
                    <v-list-item v-if="form.max_year">
                        <v-list-item-action>
                            <img src="/images/icons/year.png" class="detail-icon">
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="font-thai f-14"> ปีที่ต่ำกว่า {{ form.max_year }} </v-list-item-title>
                        </v-list-item-content>
                        <v-btn text icon color="red" @click="removeMaxYear">
                            <v-icon>close</v-icon>
                        </v-btn>
                    </v-list-item>

                    <v-divider v-if="form.min_mile"></v-divider>
                    <v-list-item v-if="form.min_mile">
                        <v-list-item-action>
                            <img src="/images/icons/mile.png" class="detail-icon">
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="font-thai f-14"> ไมล์ที่สูงกว่า {{ form.min_mile | numFormat }} </v-list-item-title>
                        </v-list-item-content>
                        <v-list-item-action>
                            <v-btn text icon color="red" @click="removeMinMile">
                                <v-icon>close</v-icon>
                            </v-btn>
                        </v-list-item-action>
                    </v-list-item>

                    <v-divider v-if="form.year"></v-divider>
                    <v-list-item v-if="form.year">
                        <v-list-item-action>
                            <img src="/images/icons/mile.png" class="detail-icon">
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="font-thai f-14"> ปี {{ form.year[0] }} ถึง {{ form.year[1] }} </v-list-item-title>
                        </v-list-item-content>
                        <v-btn text icon color="red" @click="removeYear">
                            <v-icon>close</v-icon>
                        </v-btn>
                    </v-list-item>
                    <v-divider v-if="form.mile"></v-divider>
                    <v-list-item v-if="form.mile">
                        <v-list-item-action>
                            <img src="/images/icons/mile.png" class="detail-icon">
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="font-thai f-14"> ไมล์ {{ form.mile[0] }}ถึง {{ form.mile[1] }} </v-list-item-title>
                        </v-list-item-content>
                        <v-btn text icon color="red" @click="removeMile">
                            <v-icon>close</v-icon>
                        </v-btn>
                    </v-list-item>

                    <v-divider v-if="form.price"></v-divider>
                    <v-list-item v-if="form.price">
                        <v-list-item-action>
                            <img src="/images/icons/mile.png" class="detail-icon">
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title class="font-thai f-14"> ราคา {{ form.price[0] }} ถึง {{ form.price[1] }} </v-list-item-title>
                        </v-list-item-content>
                        <v-btn text icon color="red" @click="removePrice">
                            <v-icon>close</v-icon>
                        </v-btn>
                    </v-list-item>
                </template>
            </v-list>
        </v-card>

        <v-card cols="12" md="3" class="mt-5" outlined tile v-show="false">
            <v-subheader class="font-thai black--text"> รายการที่เลือก </v-subheader>
            <v-list>
                <template>
                    <v-divider></v-divider>
                    <v-list-item>
                        <v-list-item-content>
                            <v-text-field  label="ค้นหารถ" v-model="brand_s" ></v-text-field>
                        </v-list-item-content>
                    </v-list-item>
                </template>
            </v-list>
        </v-card>
    </v-col>

</template>

<script>

    import { mapGetters } from "vuex";
    import { SEARCH_CARS, FETCH_BRAND_MODEL, FETCH_COLORS,FOAMCARS } from "@store/actions.type";
    export default {
        name: 'Search',
        props: { brands: { type: Array, required: true},brand_s:{ type:Array}},
        data: () => ({
            min_y: 0,  //range year
            max_y: 2021,  //range year
            isShowing:false,
            min: 0,
            max: 1000000,
            min_price: 0,
            max_price: 1000000,
            max_monthly: 30000,
            min_monthly: 0,
            slider: 20,
            gears       : ['ทั้งหมด', 'Auto', 'Manual', 'Other'],
            insurances  : ['ทั้งหมด', 'มีประกัน', 'ไม่มีประกัน'],
            form : {
                brand     : '',
                model     : '',
                gear      : '',
                color     : [],
                insurance : '',
                min_year  : '',
                max_year  : '',
                min_mile  : '',
                max_mile  : '',
                mile: [0,2000000],
                year: [0,2021],
                price:[0,1000000],
                monthly:[0,30000]
            },
            DisabledModel : true,
            MessageModel  : 'กรุณาเลือกยี่ห้อ',
        }),

        computed: {
            ...mapGetters(["brand_model", 'colors']),
            swatchStyle() {
                return {
                    backgroundColor: '#1976D2FF',
                    cursor: 'pointer',
                    height: '20px',
                    width: '20px',
                }
            }
        },
        mounted() {

            this.$store.dispatch(FETCH_COLORS);
            this.form.brand = this.$route.params.type ? this.$route.params.type : '';
        },
        methods : {

            clear() {
                this.form  = {
                    brand     : '',
                    model     : '',
                    gear      : '',
                    color     : [],
                    min_year  : '',
                    max_year  : '',
                    min_mile  : '',
                    max_mile  : '',
                }
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            changeBrand() {
                if(this.form.brand == 'ทั้งหมด') {
                    this.DisabledModel = true;
                    this.MessageModel  = 'กรุณาเลือกยี่ห้อ';
                } else {
                    this.DisabledModel = false;
                    this.MessageModel  = '';
                }
                this.$store.dispatch(SEARCH_CARS, this.form);
                this.$store.dispatch(FETCH_BRAND_MODEL, this.form.brand);
            },
            changeModel() {
                this.$set(this.form, 'brand_selects', this.brand_s)
                this.$store.dispatch(FOAMCARS, this.form);
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            changeGear() {
                this.$set(this.form, 'brand_selects', this.brand_s)
                this.$store.dispatch(FOAMCARS, this.form);
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            changeColor() {
                this.$set(this.form, 'brand_selects', this.brand_s)
                this.$store.dispatch(FOAMCARS, this.form);
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            changeInsurance() {
                this.$set(this.form, 'brand_selects', this.brand_s)
                this.$store.dispatch(FOAMCARS, this.form);
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            totalyear(){
                this.$set(this.form, 'brand_selects', this.brand_s)
                this.$store.dispatch(FOAMCARS, this.form);
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            min_year() {
                this.$set(this.form, 'brand_selects', this.brand_s)
                this.$store.dispatch(FOAMCARS, this.form);
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            max_year() {
                this.$set(this.form, 'brand_selects', this.brand_s)
                this.$store.dispatch(FOAMCARS, this.form);
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            min_mile() {
                this.$set(this.form, 'brand_selects', this.brand_s)
                this.$store.dispatch(FOAMCARS, this.form);
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            max_mile() {
                this.$set(this.form, 'brand_selects', this.brand_s)
                this.$store.dispatch(FOAMCARS, this.form);
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            range() {
                this.$set(this.form, 'brand_selects', this.brand_s)
                this.$store.dispatch(FOAMCARS, this.form);
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            all_price(){
                this.$set(this.form, 'brand_selects', this.brand_s)
                this.$store.dispatch(FOAMCARS, this.form);
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            all_monthly(){
                this.$set(this.form, 'brand_selects', this.brand_s)
                this.$store.dispatch(FOAMCARS, this.form);
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            removeBrand() {
                this.form.brand = '';
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            removeModel() {
                this.form.model = '';
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            removeGear() {
                this.form.gear = '';
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            removeColor(index) {
                this.form.color.splice(index, 1);
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            removeInsurance() {
                this.form.insurance = '';
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            removeMinYear() {
                this.form.min_year = '';
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            removeMaxYear() {
                this.form.max_year = '';
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            removeMinMile() {
                this.form.min_mile = '';
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            removeMaxMile() {
                this.form.max_mile = '';
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            removeMile() {
                this.form.mile = [0,1000000];
                this.$store.dispatch(SEARCH_CARS, this.form);
            },

            removeYear() {
                this.form.year = [0,2021];
                this.$store.dispatch(SEARCH_CARS, this.form);
            },
            removePrice() {
                this.form.price = [0,1000000];
                this.$store.dispatch(SEARCH_CARS, this.form);
            },

        }

    }
</script>

<style lang="scss">
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] {
        -moz-appearance:textfield;
    }
</style>
