<template>
    <v-col cols="12" md="12" class="vld-parent">
            <div v-if="isLoading" class="white--text"><br><br><br><br><br><br><br><br><br><br></div>
            <loading :active.sync="isLoading" :is-full-page="false" color="#2849c6" loader="dots"></loading>
            <v-col cols="12" md="12" v-if="!isLoading">
                <v-row class="mt-1" justify="space-between">
                    <v-col cols="12" md="10">
                        <v-breadcrumbs :items="menu">
                            <template v-slot:item="props">
                                <v-breadcrumbs-item :href="props.item.href" :class="[props.item.disabled && 'disabled']">
                                    <h1 class="black--text"> {{ props.item.text.toUpperCase() }} </h1>
                                </v-breadcrumbs-item>
                            </template>
                        </v-breadcrumbs>
                    </v-col>
                    <v-col cols="12" md="2" class="text-right">
                        <v-btn color="primary" class="font-thai mt-5" large @click="open()">
                            <v-icon class="mr-2">archive</v-icon>
                            Wish List
                        </v-btn>
                    </v-col>
                </v-row>
                <v-row class="mt-5">
                    <v-col cols="12" md="8">
                        <v-card class="pa-5">
                            <v-carousel hide-delimiters class="text-center" v-model="model">
                                <v-carousel-item
                                    v-for="(item,index) in images"
                                    :key="index"
                                    :src="checkImage(item.URL_pic)"
                                    class="image-preview"
                                    height="90">
                                </v-carousel-item>
                            </v-carousel>
                        </v-card>
                        <v-card class="mt-2 pa-2">
                            <carousel
                                :items="3"
                                :startPosition="number"
                                :URLhashListener="true"
                                :autoplay="false"
                                :autoplayHoverPause="true"
                                :margin="30"
                                :dots="true"
                                :nav="false"
                                :center="true"
                                @changed="changed">
                                <img v-for="(item,i) in images" :key="i" :src="checkImage(item.URL_pic)"  :class="getCenter(i)" class="image-detail" @click="select_image(i)" :data-hash="i">
                            </carousel>
                        </v-card>
                    </v-col>
                    <v-col cols="12" md="4">
                        <v-card class="pa-5">
                            <h2> INFORMATION </h2>
                            <v-divider class="my-4"></v-divider>
                            <v-list>
                                <v-list-item v-if="detail.CarBrandName">
                                    <img src="/images/icons/brand.png" class="detail-icon">
                                    <v-list-item-content>
                                        <v-list-item-title class="ml-5 font-thai f-15"> Brand </v-list-item-title>
                                    </v-list-item-content>
                                    <v-list-item-icon>
                                            <span class="font-thai f-14"> {{ detail.CarBrandName }} </span>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-list-item v-if="detail.CarBrandGenName" class="mt-1">
                                <img src="/images/icons/model.png" class="detail-icon">
                                    <v-list-item-content>
                                        <v-list-item-title class="ml-5 font-thai f-15"> Model </v-list-item-title>
                                    </v-list-item-content>
                                    <v-list-item-icon>
                                            <span class="font-thai f-14"> {{ detail.CarBrandGenName }} </span>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-list-item v-if="detail.CarYear" class="mt-1">
                                <img src="/images/icons/year.png" class="detail-icon">
                                    <v-list-item-content>
                                        <v-list-item-title class="ml-5 font-thai f-15"> Year </v-list-item-title>
                                    </v-list-item-content>
                                    <v-list-item-icon>
                                            <span class="font-thai f-14"> {{ detail.CarYear }} </span>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-list-item v-if="detail.CarEngine" class="mt-1">
                                <img src="/images/icons/engine.png" class="detail-icon">
                                    <v-list-item-content>
                                        <v-list-item-title class="ml-5 font-thai f-15"> Engine </v-list-item-title>
                                    </v-list-item-content>
                                    <v-list-item-icon>
                                            <span class="font-thai f-14"> {{ detail.CarEngine }} </span>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-list-item v-if="detail.CarColorName" class="mt-1">
                                <img src="/images/icons/color.png" class="detail-icon">
                                    <v-list-item-content>
                                        <v-list-item-title class="ml-5 font-thai f-15"> Color </v-list-item-title>
                                    </v-list-item-content>
                                    <v-list-item-icon>
                                            <span class="font-thai f-14"> {{ detail.CarColorName }} </span>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-list-item v-if="detail.CarMile" class="mt-1">
                                <img src="/images/icons/mile.png" class="detail-icon">
                                    <v-list-item-content>
                                        <v-list-item-title class="ml-5 font-thai f-15"> Mile </v-list-item-title>
                                    </v-list-item-content>
                                    <v-list-item-icon>
                                            <span class="font-thai f-14"> {{ detail.CarMile | numFormat }} </span>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-list-item v-if="detail.CarSeat" class="mt-1">
                                <img src="/images/icons/seat.png" class="detail-icon">
                                    <v-list-item-content>
                                        <v-list-item-title class="ml-5 font-thai f-15"> Seat </v-list-item-title>
                                    </v-list-item-content>
                                    <v-list-item-icon>
                                            <span class="font-thai f-14"> {{ detail.CarSeat }} </span>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-list-item v-if="detail.type_fuel" class="mt-1">
                                <img src="/images/icons/fuel.png" class="detail-icon">
                                    <v-list-item-content>
                                        <v-list-item-title class="ml-5 font-thai f-15"> Fuel</v-list-item-title>
                                    </v-list-item-content>
                                    <v-list-item-icon>
                                            <span class="font-thai f-14"> {{ detail.type_fuel }} </span>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-list-item v-if="detail.CarRegister" class="mt-1">
                                <img src="/images/icons/register.png" class="detail-icon">
                                    <v-list-item-content>
                                        <v-list-item-title class="ml-5 font-thai f-15"> Register </v-list-item-title>
                                    </v-list-item-content>
                                    <v-list-item-icon>
                                            <span class="font-thai f-14"> {{ detail.CarRegister }} </span>
                                    </v-list-item-icon>
                                </v-list-item>
                                 <v-list-item v-if="detail.CarInsurance" class="mt-1">
                                <img src="/images/icons/insurance.png" class="detail-icon">
                                    <v-list-item-content>
                                        <v-list-item-title class="ml-5 font-thai f-15"> Insurance </v-list-item-title>
                                    </v-list-item-content>
                                    <v-list-item-icon>
                                            <span class="font-thai f-14"> {{ detail.CarInsurance }} </span>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-divider class="my-5"></v-divider>
                                <h5 class="text-center"> NO. {{ car.CarEvaID }} </h5>
                            </v-list>
                        </v-card>
                    </v-col>
                </v-row>
                <v-row class="mt-5">
                    <v-col cols="12" md="12">
                        <v-card class="pa-5">
                            <h2 class="pa-5"> Comment From Car Inspectors </h2>
                            <blockquote class="blockquote font-thai comment">
                                <p class="comment">{{ detail.CarComment}}</p>
                            </blockquote>
                        </v-card>
                    </v-col >
                </v-row>
                <v-row class="mt-5">
                    <v-col cols="12" md="12">
                        <v-card class="pa-4">
                            <v-toolbar color="indigo" dark>
                                <v-toolbar-title class="font-thai"> การประเมินภาพรวมของรถ </v-toolbar-title>
                            </v-toolbar>
                            <v-row>
                                <v-col cols="12" md="6">
                                    <v-list>
                                        <v-list-item v-if="detail.CarIn01 == 0">
                                            <v-list-item-icon>
                                                 <v-icon class="font-weight-black f-30">check</v-icon>
                                            </v-list-item-icon>

                                            <v-list-item-content>
                                                <v-list-item-title class="font-thai text-responsive">
                                                    ไมค์แท้
                                                </v-list-item-title>
                                            </v-list-item-content>
                                        </v-list-item>

                                        <v-list-item v-if="detail.CarIn03 == 0">
                                            <v-list-item-icon>
                                                 <v-icon class="font-weight-black f-30">check</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-content>
                                                <v-list-item-title class="font-thai text-responsive">
                                                    รถไม่เคยประสบไฟไหม้
                                                </v-list-item-title>
                                            </v-list-item-content>
                                        </v-list-item>

                                        <v-list-item v-if="detail.CarIn05 == 0">
                                            <v-list-item-icon>
                                                 <v-icon class="font-weight-black f-30">check</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-content>
                                                <v-list-item-title class="font-thai text-responsive">
                                                    รถเลขเครื่องตรง
                                                </v-list-item-title>
                                            </v-list-item-content>
                                        </v-list-item>

                                        <v-list-item v-if="detail.CarIn07 == 0">
                                            <v-list-item-icon>
                                                 <v-icon class="font-weight-black f-30">check</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-content>
                                                <v-list-item-title class="font-thai text-responsive">
                                                    รถสภาพสีเดิม
                                                </v-list-item-title>
                                            </v-list-item-content>
                                        </v-list-item>

                                    </v-list>
                                </v-col>
                                 <v-col cols="12" md="6">
                                      <v-list class="mobile_margin">
                                        <v-list-item v-if="detail.CarIn02 == 0">
                                            <v-list-item-icon>
                                                 <v-icon class="font-weight-black f-30">check</v-icon>
                                            </v-list-item-icon>

                                            <v-list-item-content>
                                                <v-list-item-title class="font-thai text-responsive">
                                                    รถไม่เคยประสบภัยน้ำท่วม
                                                </v-list-item-title>
                                            </v-list-item-content>
                                        </v-list-item>

                                        <v-list-item v-if="detail.CarIn04 == 0">
                                            <v-list-item-icon>
                                                 <v-icon class="font-weight-black f-30">check</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-content>
                                                <v-list-item-title class="font-thai text-responsive">
                                                    รถไม่เคยเกิดอุบัติเหตุรุนแรงชนหนัก
                                                </v-list-item-title>
                                            </v-list-item-content>
                                        </v-list-item>

                                        <v-list-item v-if="detail.CarIn06 == 0">
                                            <v-list-item-icon>
                                                 <v-icon class="font-weight-black f-30">check</v-icon>
                                            </v-list-item-icon>
                                            <v-list-item-content>
                                                <v-list-item-title class="font-thai text-responsive">
                                                    รถเลขตัวถังตรง
                                                </v-list-item-title>
                                            </v-list-item-content>
                                        </v-list-item>

                                    </v-list>
                                </v-col>
                            </v-row>
                        </v-card>
                    </v-col >
                </v-row>
            </v-col>
             <v-row justify="center">
                <v-dialog v-model="dialog" persistent max-width="600px">
                <v-card>
                    <v-card-title>
                    <span class="headline"> Personal Information </span>
                    </v-card-title>
                    <v-card-text class="mb-0">
                        <v-container>
                            <v-row>
                                <v-col cols="12" md="12">
                                    <v-text-field class="font-thai"
                                        v-model="form.name"
                                        :error-messages="nameErrors"
                                        label="ชื่อ"
                                        required
                                        @input="$v.form.name.$touch()"
                                        @blur="$v.form.name.$touch()"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" md="12">
                                        <v-text-field class="font-thai"
                                        v-model="form.email"
                                        :error-messages="emailErrors"
                                        label="อีเมล์"
                                        required
                                        @input="$v.form.email.$touch()"
                                        @blur="$v.form.email.$touch()"
                                        ></v-text-field>
                                </v-col>
                                <v-col cols="12" md="12">
                                    <v-text-field class="font-thai"
                                        v-model="form.tel"
                                        :error-messages="telErrors"
                                        label="เบอร์โทร"
                                        required
                                        type="tel"
                                        v-mask="'##########'"
                                        @input="$v.form.tel.$touch()"
                                        @blur="$v.form.tel.$touch()"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-card-text>
                    <v-card-text class="my-1" v-if="errors.tel">
                            <p class="red--text text-center font-thai">{{ errors.tel }}</p>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn class="mb-4" color="blue darken-1" text @click="dialog = false"> Close </v-btn>
                        <v-btn class="mb-4" color="blue darken-1" text @click="submit"> Save  </v-btn>
                        <v-spacer></v-spacer>
                    </v-card-actions>
                </v-card>
                </v-dialog>
                <v-dialog v-model="load" persistent width="300" hide-overlay>
                    <v-card color="light-green darken-3">
                        <v-card-text class="text-center">
                            <p class="font-thai white--text pa-5"> กรุณารอสักครู่ </p>
                            <v-progress-linear indeterminate color="white" class="mt-2 mb-2"></v-progress-linear>
                        </v-card-text>
                    </v-card>
                </v-dialog>
            </v-row>
    </v-col>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import { mapGetters } from "vuex";
    import { FETCH_CAR } from "@store/actions.type";
    import carousel from 'vue-owl-carousel';
    import { required, email, numeric, maxLength } from 'vuelidate/lib/validators';
    import { mask } from 'vue-the-mask';
    import { CREATE_INTERESTED } from "@store/actions.type";
    export default {
        directives: {
            mask
        },
        validations: {
            form: {
                name  : { required },
                email : { required, email   },
                tel   : { required, numeric, maxLength: maxLength(10) },
            }
        },
        data() {
            return {
                form : {
                    name  : '',
                    email : '',
                    tel   : '',
                },
                dialog: false,
                isLoading: true,
                fullPage: true,
                menu: [
                    {
                        text: 'Inventory',
                        disabled: false,
                        href: '/category',
                    },
                    {
                        text: 'Detail',
                        disabled: false,
                        href: '',
                    },
                ],
                detail  : {},
                images  : [],
                model   : 0,
                number  : 0,
                load    : false,
                errors  : {}
            }
        },
        components: { Loading , carousel },
        created() {
            this.$store.dispatch(FETCH_CAR, this.$route.params.id);
            this.getData();
        },
        computed: {
            ...mapGetters(["car", 'car_images']),
            nameErrors () {
                const errors = []
                if (!this.$v.form.name.$dirty) return errors
                !this.$v.form.name.required && errors.push('โปรดระบุชื่อ')
                return errors
            },
            emailErrors () {
                const errors = []
                if (!this.$v.form.email.$dirty) return errors
                !this.$v.form.email.required && errors.push('โปรดระบุอีเมล์')
                !this.$v.form.email.email    && errors.push('โปรดระบุข้อมูลรูปแบบอีเมล์')
                return errors
            },
            telErrors() {
                const errors = [];
                if (!this.$v.form.tel.$dirty) return errors;
                !this.$v.form.tel.required  && errors.push("โปรดระบุเบอร์โทร");
                !this.$v.form.tel.numeric   && errors.push('โปรดระบุข้อมูลเป็นตัวเลข')
                !this.$v.form.tel.maxLength && errors.push('โปรดระบุตัวเลขไม่เกิน 10 หลัก')
                return errors;
            }
        },
        watch: {
            model: function() {
                this.number = this.model
                location.href='#'+this.number
            },
            dialog: function() {
                this.dialog == false ? this.clear() : null
            }
        },
        methods : {
            submit () {
                this.$v.$touch()
                if (this.$v.form.$pending || this.$v.form.$error) return;
                this.form.id     = this.detail.Id_car;
                this.form.car_id = this.detail.CarEvaID;
                this.loader()
                this.send()
            },
            loader() {
                this.load = true;
                setTimeout(() => (this.load = false), 1500);
            },
            send() {
                this.$store.dispatch(CREATE_INTERESTED, this.form)
                .then((response) => response == "success" ? this.success() : this.error())
                .catch((error) => this.error(error.response.data.errors.tel))
            },
            success() {
                setTimeout(() =>
                    this.$swal.fire({
                        type: "success",
                        title: "ส่งข้อมูลเรียบร้อยแล้ว",
                        showConfirmButton: false,
                        timer: 1000
                    }),
                    1000
                );
                this.clear()
                setTimeout(() => (this.dialog = false), 3000);
            },
            error($text) {
                this.errors.tel = $text;
                // this.$swal({
                //     type: "error",
                //     title: $text,
                //     showConfirmButton: true,
                //     reverseButtons: true
                // });
            },
            clear () {
                this.$v.form.$reset()
                this.form.name   = ''
                this.form.email  = ''
                this.form.tel    = ''
                this.errors      = {}
            },
            checkImage(image)
            {
                return image.includes(".jpg") ? image : '/images/no-image.png'
            },
            getData() {
                this.isLoading = true;
                setTimeout(() => {
                    this.detail = this.car;
                    this.images = this.car_images;
                    this.model  = this.images.length == 1 ? 0 : 0;
                    this.isLoading = false
                },1800)
            },
            onCancel() {
              console.log('User cancelled the loader.')
            },
            select_image(image) {
                this.model = image;
            },
            changed(image) {
                this.model = image.item.index;
            },
            getCenter(index){
                return {
                    'box-image': index == this.number,
                }
            },
            open() {
                this.dialog = !this.dialog
            }
        }
    }
</script>
