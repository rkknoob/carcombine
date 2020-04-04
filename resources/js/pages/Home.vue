<template>
  <div class="home">
    <go-top bg-color="#00267d" :bottom="50"></go-top>
    <!-- <HomeBanner /> -->
    <!-- How it Works -->
    <!-- <How/> -->
    <!-- Ask Question -->
    <!-- <CarCarousel/> -->
    <!-- Facebook Rating -->
    <!-- <HomeService/> -->
    <!-- Brand -->
    <!-- <HomeContact/> -->
  </div>
</template>

<script>
import GoTop from "@inotom/vue-go-top";
import HomeBanner from "@components/HomeBanner";
import BrandCarousel from "@components/BrandCarousel";
import CarCarousel from "@components/CarCarousel";
import HomeService from "@components/HomeService";
import HomeContact from "@components/HomeContact";
import How from "@components/How";

export default {
  name: "Home",
  components: { HomeBanner, How, CarCarousel, HomeService, HomeContact, GoTop }
};
</script>

