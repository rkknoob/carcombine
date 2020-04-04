<template>
  <div class="top-page">
    <v-row>
      <v-col cols="12" sm="12" md="8" lg="8" class="hidden-md-and-down">
        <transition name="fade">
          <h2 v-if="show" class="text-left font black--text site-name glow" v-html="title"></h2>
        </transition>
      </v-col>
      <v-col cols="12" sm="12" md="6" lg="4">
        <v-card>
          <v-toolbar color="blue darken-4" dark flat icons-and-text>
            <v-tabs slot="extension" v-model="tabs" background-color="transparent" centered>
              <v-tab v-for="n in 2" :key="n">
                <span v-if="n == 1">เลือกรถที่คุณสนใจ</span>
                <span v-if="n == 2">Booking</span>
              </v-tab>
            </v-tabs>
          </v-toolbar>

          <v-tabs-items v-model="tabs">
            <v-tab-item>
              <v-card flat>
                <v-stepper v-model="e1">
                  <v-stepper-items>
                    <v-stepper-content step="1">
                      <v-card class="mb-12" color="transparent" outlined height="290px">
                        <h3 class="text-center font-thai mb-2"></h3>
                        <v-row class="mb-0">
                          <v-col class="d-flex" cols="12" sm="12">
                            <v-select
                              class="font-thai form-wishlist"
                              :items="brands_select"
                              label="ยี่ห้อ"
                              item-text="brand"
                              outlined
                              v-model="form.brand"
                              v-on:change="changeBrand"
                            ></v-select>
                          </v-col>
                        </v-row>
                        <v-row>
                          <v-col class="d-flex" cols="12" sm="12">
                            <v-select
                              class="font-thai form-wishlist"
                              :items="brand_model"
                              label="รุ่น"
                              outlined
                              item-text="model"
                              :disabled="DisabledModel"
                              :filled="DisabledModel"
                              v-model="form.model"
                              v-on:change="changeModel"
                            ></v-select>
                          </v-col>
                        </v-row>
                        <v-row>
                          <v-col class="d-flex" cols="6" sm="6" md="6">
                            <v-select
                              class="font-thai form-wishlist"
                              :items="brand_year"
                              label="ปี"
                              outlined
                              v-model="form.year"
                              v-on:change="changeYear"
                              :disabled="DisabledYear"
                              :filled="DisabledYear"
                            ></v-select>
                          </v-col>
                          <v-col class="d-flex" cols="6" sm="6" md="6">
                            <v-select
                              class="font-thai form-wishlist"
                              :items="brand_gear"
                              label="เกียร์"
                              outlined
                              v-model="form.gear"
                              v-on:change="changeGear"
                              :disabled="DisabledGear"
                              :filled="DisabledGear"
                            ></v-select>
                          </v-col>
                        </v-row>
                        <v-row>
                          <v-col class="d-flex" cols="12" sm="12" md="12">
                            <v-btn
                              large
                              block
                              color="primary"
                              @click="nextForm"
                              class="font-thai mt-3"
                              :disabled="nextButtonForm"
                            >ถัดไป</v-btn>
                          </v-col>
                        </v-row>
                      </v-card>
                    </v-stepper-content>
                    <v-stepper-content step="2">
                      <v-card class="mb-12" color="transparent" outlined height="150px">
                        <v-row class="mb-0">
                          <v-col class="d-flex" cols="12" sm="12">
                            <v-text-field
                              class="font-thai form-wishlist-information"
                              :error-messages="nameErrors"
                              label="ชื่อ"
                              outlined
                              v-model="form.name"
                              @input="$v.form.name.$touch()"
                              @blur="$v.form.name.$touch()"
                            ></v-text-field>
                          </v-col>
                        </v-row>
                        <v-row>
                          <v-col class="d-flex" cols="12" sm="12">
                            <v-text-field
                              class="font-thai form-wishlist-information"
                              :error-messages="telErrors"
                              label="เบอร์โทร"
                              outlined
                              type="tel"
                              v-model="form.tel"
                              v-mask="'##########'"
                              @input="$v.form.tel.$touch()"
                              @blur="$v.form.tel.$touch()"
                            ></v-text-field>
                          </v-col>
                        </v-row>
                        <v-row>
                          <v-col class="d-flex" cols="12" sm="12">
                            <v-text-field
                              class="font-thai form-wishlist-information"
                              :error-messages="emailErrors"
                              label="อีเมล์"
                              outlined
                              v-model="form.email"
                              @input="$v.form.email.$touch()"
                              @blur="$v.form.email.$touch()"
                            ></v-text-field>
                          </v-col>
                        </v-row>
                        <v-row>
                          <v-col class="d-flex" cols="6" sm="6" md="6">
                            <v-btn
                              large
                              block
                              @click="e1 = 1"
                              class="font-thai mt-3"
                              outlined
                            >ย้อนกลับ</v-btn>
                          </v-col>
                          <v-col class="d-flex" cols="6" sm="6" md="6">
                            <v-btn
                              large
                              block
                              color="primary"
                              @click="submit"
                              class="font-thai mt-3"
                            >ส่งข้อมูล</v-btn>
                          </v-col>
                        </v-row>
                      </v-card>
                    </v-stepper-content>
                  </v-stepper-items>
                </v-stepper>
              </v-card>
            </v-tab-item>
            <v-tab-item>
              <v-card flat>
                <v-stepper v-model="e1">
                  <v-stepper-items>
                    <span>fav</span>
                    </v-stepper-items>
                </v-stepper>
              </v-card>
            </v-tab-item>
          </v-tabs-items>
        </v-card>
      </v-col>
    </v-row>
    <v-dialog v-model="load" persistent width="300">
      <v-card color="light-green darken-3">
        <v-card-text class="text-center">
          <p class="font-thai white--text pa-5">กรุณารอสักครู่</p>
          <v-progress-linear indeterminate color="white" class="mt-2 mb-2"></v-progress-linear>
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import { mask } from "vue-the-mask";
import { required, email, numeric, maxLength } from "vuelidate/lib/validators";
import {
  FETCH_BRANDS_SELECT,
  FETCH_BRAND_MODEL,
  FETCH_BRAND_YEAR,
  FETCH_BRAND_GEAR,
  CREATE_WISHLIST
} from "@store/actions.type";
import { mapGetters } from "vuex";

export default {
  directives: {
    mask
  },
  validations: {
    form: {
      name: { required },
      email: { required, email },
      tel: { required, numeric, maxLength: maxLength(10) }
    }
  },
  data: () => ({
    tabs: null,
    e1: 1,
    show: true,
    load: false,
    text: "",
    title: "",
    title_num: 0,
    items: [
      "รถมือสองของ CAR COMBINED <br> การันตีว่าดีชัวร์!",
      "CAR COMBINED รถมือสอง <br> คุณภาพ ป้ายแดง การันตี <br> ทุกคันมั่นใจได้ 100%",
      "CAR COMBINED ผ่านการตรวจสภาพรถมาตรฐานสูง <br> เพื่อให้คุณได้รับสิ่งที่ดีที่สุดในราคา <br> ที่จับต้องได้",
      "CAR COMBINED ผ่านการตรวจสภาพรถ โดยผู้เชี่ยวชาญ <br>  โปร่งใส ไร้กังวล ไม่โดนย้อม",
      "รถมือสองคุณภาพดี <br> การันตีเรื่องบริการ <br> ต้อง CAR COMBINED",
      "รถมือสองคุณภาพคัดเกรด <br> ที่คุณมั่นใจ ไว้ใจ <br> ได้ที่ CAR COMBINED",
      "CAR COMBINED ใส่ใจในทุกรายละเอียดของรถยนต์มือสองทุกๆคัน ก่อนส่งถึงมือลูกค้า"
    ],
    form: {
      brand: "",
      model: "",
      gear: "",
      year: "",
      name: "",
      tel: "",
      email: ""
    },
    DisabledModel: true,
    DisabledYear: true,
    DisabledGear: true,
    nextButtonForm: true
  }),
  mounted() {
    this.$store.dispatch(FETCH_BRANDS_SELECT, "index");
    this.title = this.items[this.title_num];
    setTimeout(() => {
      this.show = false;
    }, 6000);
  },
  computed: {
    ...mapGetters(["brands_select", "brand_model", "brand_year", "brand_gear"]),
    nameErrors() {
      const errors = [];
      if (!this.$v.form.name.$dirty) return errors;
      !this.$v.form.name.required && errors.push("โปรดระบุชื่อ");
      return errors;
    },
    emailErrors() {
      const errors = [];
      if (!this.$v.form.email.$dirty) return errors;
      !this.$v.form.email.required && errors.push("โปรดระบุอีเมล์");
      !this.$v.form.email.email && errors.push("โปรดระบุข้อมูลรูปแบบอีเมล์");
      return errors;
    },
    telErrors() {
      const errors = [];
      if (!this.$v.form.tel.$dirty) return errors;
      !this.$v.form.tel.required && errors.push("โปรดระบุเบอร์โทร");
      !this.$v.form.tel.numeric && errors.push("โปรดระบุข้อมูลเป็นตัวเลข");
      !this.$v.form.tel.maxLength &&
        errors.push("โปรดระบุตัวเลขไม่เกิน 10 หลัก");
      return errors;
    }
  },
  watch: {
    show: function() {
      if (this.title_num == this.items.length) {
        this.title_num = -1;
      }
      if (this.show == true) {
        ++this.title_num;
        this.title = this.items[this.title_num];
        setTimeout(() => {
          this.show = false;
        }, 6000);
      } else {
        setTimeout(() => {
          this.show = true;
        }, 1000);
      }
    }
  },
  methods: {
    clear() {
      this.$v.form.$reset();
      this.form.brand = "";
      this.form.model = "";
      this.form.gear = "";
      this.form.year = "";
      this.form.name = "";
      this.form.tel = "";
      this.form.email = "";
    },
    nextForm() {
      this.e1 = 2;
    },
    submit() {
      this.$v.$touch();
      if (this.$v.form.$pending || this.$v.form.$error) return;
      this.loader();
      this.send();
    },
    loader() {
      this.load = true;
      setTimeout(() => (this.load = false), 1500);
    },
    send() {
      this.$store
        .dispatch(CREATE_WISHLIST, this.form)
        .then(response =>
          response.status == "success" ? this.success(response.wishlist) : null
        )
        .catch(error => console.log(error));
    },
    success(wishlist) {
      setTimeout(
        () =>
          this.$swal.fire({
            html:
              "ทีมงาน CAR COMBINED <br><br> ได้รับข้อมูลรถ " +
              wishlist.brand +
              " " +
              wishlist.model +
              " " +
              wishlist.gear +
              " ปี " +
              wishlist.year +
              " เรียบร้อยแล้ว <br>",
            showConfirmButton: true,
            focusConfirm: true,
            confirmButtonText: "ปิดหน้าต่าง",
            imageUrl: "/images/logo.png",
            imageWidth: 179,
            imageHeight: 149
          }),
        1500
      );
      this.clear();
      setTimeout(() => (this.e1 = 1), 1000);
    },
    changeBrand() {
      if (this.form.brand) {
        this.form.year = "";
        this.form.gear = "";
        this.DisabledModel = false;
        this.DisabledYear = true;
        this.DisabledGear = true;
        this.nextButtonForm = false;
        this.$store.dispatch(FETCH_BRAND_MODEL, this.form.brand);
      } else {
        this.DisabledModel = true;
      }
    },
    changeModel() {
      this.form.brand
        ? (this.DisabledYear = false)
        : (this.DisabledYear = true);
      this.$store.dispatch(FETCH_BRAND_YEAR, this.form.model);
    },
    changeYear() {
      this.form.model
        ? (this.DisabledGear = false)
        : (this.DisabledGear = true);
      this.$store.dispatch(FETCH_BRAND_GEAR, this.form.model);
    },
    changeGear() {
      this.form.gear
        ? (this.nextButtonForm = false)
        : (this.nextButtonForm = true);
    }
  }
};
</script>

