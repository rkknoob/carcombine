<template>
  <div>
    <nav class="navbar is-transparent is-fixed-top justify-center" id="nav">
      <div class="navbar-brand">
        <div class="field is-grouped">
          <div class="logo">
            <router-link to="/home">
              <v-img src="/images/logo.png" class="logo-image"></v-img>
            </router-link>
          </div>
          <div class="head-menu mt-auto mb-auto">
            <router-link :to="{ path: '/'} ">
              <span class="black--text menu f-18 font-600 home-menu">หน้าหลัก</span>
            </router-link>
            <router-link :to="{ path: '/inventory'} ">
              <span class="black--text menu f-18 font-600 category-menu">ค้นหารถ</span>
            </router-link>
            <router-link :to="{ path: '/blog'} ">
              <span class="black--text menu f-18 font-600 blog-menu">บทความ</span>
            </router-link>
            <router-link :to="{ path: '/contact'} ">
              <span class="black--text menu f-18 font-600 contact-menu">ติดต่อเรา</span>
            </router-link>
            <router-link :to="{ path: '/contact'} ">
              <v-icon class="material-icons">shopping_cart</v-icon>
            </router-link>
            <!-- <router-link>
              <span>
                <v-menu offset-y>
                  <template v-slot:activator="{ on }">
                    <v-btn color="primary" dark v-on="on">ภาษา</v-btn>
                  </template>
                  <v-list>
                    <v-list-item v-for="(item, home) in Lang" :key="home">
                      <v-list-item-title>{{ item.title }}</v-list-item-title>
                    </v-list-item>
                  </v-list>
                </v-menu>
              </span>
            </router-link>-->
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  data: () => ({
    drawer: null,
    right: null,
    items: [
      { title: "หน้าหลัก", route: "/home" },
      { title: "ค้นหารถ", route: "/inventory" },
      { title: "บทความ", route: "/blog" },
      { title: "ติดต่อเรา", route: "/contact" },
      { title: "ติดต่อเรา" }
    ],
    Lang: [{ title: "ไทย" }, { title: "EN" }]
  }),
  methods: {
    navigation(route) {
      this.$router.push(route).catch(err => {});
    }
  }
};
</script>
<script>
export default {
  mounted() {
    this.$nextTick(function() {
      window.addEventListener("scroll", function() {
        var navbar = document.getElementById("nav");
        var nav_classes = navbar.classList;
        if (document.documentElement.scrollTop >= 150) {
          if (nav_classes.contains("shrink") === false) {
            nav_classes.toggle("shrink");
          }
        } else {
          if (nav_classes.contains("shrink") === true) {
            nav_classes.toggle("shrink");
          }
        }
      });
    });
  }
};
</script>
