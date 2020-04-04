<template>
  <div v-if="currentRouteName === 'index'">
    <go-top bg-color="#00267d" :bottom="50"></go-top>
    <v-app>
      <div id="homeTop-template">
        <v-container>
          <app-header></app-header>
        </v-container>
        <v-container>
          <HomeBanner />
        </v-container>
      </div>
    </v-app>

    <v-app id="White-template">
      <v-container>
        <How />
      </v-container>
    </v-app>
    <v-app id="Gray-template">
      <v-container>
        <CarCarousel />
      </v-container>
    </v-app>
    <v-app id="White-template">
      <v-container>
        <Asked />
      </v-container>
    </v-app>
    <v-app id="Gray-template">
      <v-container>
        <CarCarousel />
      </v-container>
    </v-app>
    <v-app id="White-template">
      <v-container>
        <BrandCarousel />
      </v-container>
    </v-app>
    <v-app>
      <Booking />
    </v-app>

    <v-app>
      <app-footer></app-footer>
    </v-app>
  </div>

  <!-- Another Page -->
  <div v-else>
    <v-app id="page-template">
      <v-container>
        <app-header></app-header>
        <v-content>
          <router-view></router-view>
        </v-content>
      </v-container>
      <app-footer></app-footer>
    </v-app>
  </div>
</template>

<script>
import AppHeader from "@components/AppHeaderTop";
import AppFooter from "@components/AppFooter-new";
import HomeBanner from "@components/HomeBanner";
import How from "@components/How";
import CarCarousel from "@components/CarCarousel";
import Asked from "@components/Asked";
import BrandCarousel from "@components/BrandCarousel";
import Booking from "@components/Booking";
import GoTop from "@inotom/vue-go-top";

export default {
  components: {
    AppHeader,
    AppFooter,
    HomeBanner,
    How,
    CarCarousel,
    Asked,
    BrandCarousel,
    Booking,
    GoTop
  },
  mounted() {},
  computed: {
    currentRouteName() {
      return this.$route.name;
    }
  }
};
</script>
