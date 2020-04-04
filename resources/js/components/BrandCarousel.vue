<template>
    <section class="brand">
        <!-- <h1 class="text-center font black--text brand-title">BRAND</h1> -->
        <h2 class="text-center font black--text brand-subtitle"> Multi Brand Quality </h2>
        <v-divider class="brand-underline"></v-divider>
        <loading :active.sync="isLoading" :is-full-page="false" color="#2849c6" loader="dots" background-color="transparent"></loading>
        <carousel class="brand-carousel"
        :startPosition="number"
        :autoplay="true"
        :autoplayHoverPause="true"
        :margin="10"
        :dots="true"
        :nav="false"
        v-if="!isLoading">
        <v-img v-for="(item,i) in brands" :key="i" :src="item.image" max-width="250" class="brand-image" @click="category(item.name)"></v-img>
        </carousel>
        <div v-if="isLoading"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
    </section>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import carousel from 'vue-owl-carousel';
    import { mapGetters } from "vuex";
    import { FETCH_BRANDS } from "@store/actions.type";

    export default {
        name: 'BrandCarousel',
        components: { carousel, Loading },
        data () {
            return {
                number    : 0,
                isLoading : true,
                NavText   : ['<' ,'>']
            }
        },
        mounted() {
            this.$store.dispatch(FETCH_BRANDS);
             setTimeout(() => {
                this.isLoading = false
            },1800)
        },
        computed: {
            ...mapGetters(["brands"]),
        },
        methods : {
            category(type) {
                this.$router.push({ name: 'category_category', params: { type: type }})
            }
        }
    }
</script>
