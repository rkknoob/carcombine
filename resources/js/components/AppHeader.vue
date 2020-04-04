<template>
    <div>
        <v-app-bar color="white accent-4" class="hidden-lg-and-up" height="70">
            <img src="/images/logo.png" class="image-logo-mobile">
            <v-spacer></v-spacer>
            <v-app-bar-nav-icon class="black--text hidden-lg-and-up" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        </v-app-bar>
        <div class="header">
            <span id="hide-hover"></span>
            <v-app-bar dense  elevate-on-scroll :scroll-off-screen="true" scroll-target="#hide-hover" color="transparent" class="hidden-md-and-down">
                <div class="logo">
                    <router-link to="/home">
                        <v-img src="/images/logo.png" class="logo-image"></v-img>
                    </router-link>
                </div>
                <!-- <v-spacer></v-spacer> -->
                <div class="ml-5 head-menu">
                    <router-link :to="{ path: '/'} ">
                        <span class="black--text menu f-23 hvr-overline-from-center font-600 home-menu"> หน้าหลัก </span>
                    </router-link>
                    <router-link :to="{ path: '/inventory'} ">
                        <span class="black--text menu f-23 hvr-overline-from-center font-600 category-menu"> ค้นหารถ </span>
                    </router-link>
                    <router-link :to="{ path: '/blog'} ">
                        <span class="black--text menu f-23 hvr-overline-from-center font-600 blog-menu"> บทความ </span>
                    </router-link>
                    <router-link :to="{ path: '/contact'} ">
                        <span class="black--text menu f-23 hvr-overline-from-center font-600 contact-menu"> ติดต่อเรา </span>
                    </router-link>
                </div>
                <!-- <v-app-bar-nav-icon class="white--text hidden-sm-and-up" @click.stop="drawer = !drawer"></v-app-bar-nav-icon> -->
            </v-app-bar>
        </div>
         <v-navigation-drawer app v-model="drawer" absolutet temporary right>
            <v-list-item>
                <v-list-item-content>
                <v-list-item-title>
                    <span class="title"> CARCOMBINED </span>
                </v-list-item-title>
                <v-list-item-subtitle>
                    Menu
                </v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
            <v-divider></v-divider>
            <v-list dense nav>
                <v-list-item v-for="item in items" :key="item.title" link @click="navigation(item.route)">
                    <v-list-item-content>
                        <v-list-item-title class="font-thai">{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
    </div>
</template>

<script>
    export default {
        data:() => ({
            drawer : null,
            right: null,
            items: [
                { title: 'หน้าหลัก', route: '/home'     },
                { title: 'ค้นหารถ',  route: '/inventory' },
                { title: 'บทความ',  route: '/blog'     },
                { title: 'ติดต่อเรา',  route: '/contact'  },
            ],
        }),
        methods : {
            navigation(route) {
                this.$router.push(route).catch(err => {})
            }
        }
    }
</script>
