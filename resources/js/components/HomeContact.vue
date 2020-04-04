<template>
    <div>
        <section class="contact">
            <h1 class="text-center font black--text contact-title">CONTACT</h1>
             <v-container class="transparent mt-3">
                <v-row align="center" justify="center">
                    <v-col cols="12" lg="3"  md="6" sm="6" class="text-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.6041510208506!2d100.63244506483032!3d13.742399440353523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d61c595de4913%3A0xba53d00d61cd0cb9!2sHey*2153%20Coffee%20%26%20Kitchen!5e0!3m2!1sth!2sth!4v1572497561897!5m2!1sth!2sth"
                            class="rounded-circle" width="250" height="250" frameborder="0" allowfullscreen="">
                        </iframe>
                    </v-col>
                     <v-col cols="12" lg="3" md="6" sm="6" class="contact-address">
                        <p> วสุธา กรุ๊ป </p>
                        <p> ถนนพระราม 9 แขวงสวนหลวง </p>
                        <p> เขตสวนหลวง กรุงเทพมหานคร </p>
                    </v-col>
                     <v-col cols="6" lg="3" md="6" sm="6" class="text-center">
                        <v-icon class="contact-icon green--text">phone</v-icon>
                    </v-col>
                     <v-col cols="12" lg="3" md="6" sm="6" class="contact-text">
                        <p> เบอร์โทรศัพท์ : 02-5326935 </p>
                        <p> เวลาทำการ : 09.00 - 17.00 </p>
                    </v-col>
                </v-row>
                <v-divider class="contact-underline"></v-divider>
                <v-row align="center" justify="center" class="mx-5">
                    <v-col cols="12" md="12" class="text-center">
                        <a href="https://www.facebook.com/" target="_blank">
                           <img src="/images/social/facebook.png" class="social-image hvr-pulse">
                        </a>
                         <a href="https://mail.google.com/" target="_blank">
                            <img src="/images/social/gmail.png" class="social-image hvr-pulse">
                        </a>
                         <a href="https://www.instagram.com/?hl=en" target="_blank">
                            <img src="/images/social/instagram.png" class="social-image hvr-pulse">
                        </a>
                    </v-col>
                </v-row>
            </v-container>
        </section>
    </div>
</template>

<script>
    export default {
        name: 'HomeContact'
    }
</script>
