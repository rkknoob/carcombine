<template>
    <div class="blog">
        <go-top bg-color="#00267d" :bottom="50"></go-top>
        <v-card class="mx-auto blog-noshadow">
            <v-container fluid>
                <v-row>
                    <v-col cols="12" sm="12" md="12" lg="12">
                        <h1 class="black--text">New Blog </h1>
                        <v-divider class="blogbor"></v-divider>
                    </v-col>
                </v-row>
                <v-row dense>
                    <v-col cols="12" sm="12" md="6" lg="6" v-for="card in cards" :key="card.title">
                        <v-card class="mx-auto blog-noshadow">
                            <v-img
                                :src="card.src"
                                class="white--text align-end text blog-img"
                                gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                                height="300px"
                            >
                                <div class="text-img font-thai">
                                    <v-col cols="12" lg="12" md="12" sm="6" class="blog-content blog-noshadow">
                                        <v-card-title v-text="card.title"  class="texttitle"></v-card-title>
                                        <v-card-text v-text="card.text" class="textmid"></v-card-text>
                                        <v-card-text v-text="card.text2" class="textmid"></v-card-text>
                                        <v-card-text v-text="card.text3" class="textmid"></v-card-text>
                                    </v-col>
                                </div>
                            </v-img>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-card>
        <v-card class="mx-auto blog-noshadow ml-1">
            <v-container fluid>
                <v-row dense >
                    <v-col cols="12" sm="12" md="12" lg="12" class="blog-bg">
                        <v-card class="blog-noshadow blog-vi">
                            <section class="service-blog">
                                <v-container class="transparent">
                                    <v-row  align="center" justify="center">
                                        <v-col cols="12" md="4" sm="4" class="text-center">
                                            <img src="/images/blog/1_0.png" class="service-blog-images">
                                        </v-col>
                                        <v-col cols="12" md="4" sm="4" class="text-center">
                                            <img src="/images/blog/2_0.png" class="service-blog-images">
                                        </v-col>
                                        <v-col cols="12" md="4" sm="4" class="text-center">
                                            <img src="/images/blog/3.png" class="service-blog-images">
                                        </v-col>
                                        <v-col cols="12" md="12" sm="12" xs="12" class="text-left">
                                            <p class="service-text black--text mt-10 comment f-20">
                                                โชว์ผลงานชิ้นล่าสุดกันไปอีกตามระเบียบ !! สำหรับค่ายรถยนต์ชื่อคุ้นหูคนไทยอย่างสำนัก Posaidon กับผลงานการโมดิฟาย์ด mercedes-AMG A45 สปอร์ตแฮทช์แบคที่พกความแรงมาตั้งแต่ออกจากโรงงานด้วยการการันตีรหัสต่อท้ายอย่าง AMG A45
                                            </p>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </section>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-card>
        <v-card class="mx-auto blog-noshadow">
            <v-container fluid>
                <v-row dense>
                    <v-col v-for="(card, i) in cards" :index="i" :key="i" :cols="12" :md="card.flex">
                        <v-card>
                            <v-img :src="card.src" class="white--text align-end blog-img" v-if="card.flex == 12" height="500px">
                                <v-card-title v-if="card.flex == 12" class="v-blog-view-car">
                                    <v-col cols="12" lg="4" md="6" sm="6" class="blog-car">
                                        <p> Posaidon </p>
                                        <p> แผลงฤทธิ์ โชว์ผลงานชิ้นล่าสุด </p>
                                        <p> Mercedes-AMG A45 </p>
                                        <p> พลัง 550 แรงม้า พร้อมชุดแต่งสุด </p>
                                    </v-col>
                                </v-card-title>
                            </v-img>
                            <v-img :src="card.src" class="white--text align-end blog-img" v-if="card.flex == 6" height="300px">
                                <v-card-title v-if="card.flex == 6">
                                    <v-col cols="12" lg="6" md="6" sm="6" class="blog-car font-thai">
                                        <v-card-title v-text="card.title"  class="texttitle"></v-card-title>
                                        <v-card-text v-text="card.text" class="textmid"></v-card-text>
                                        <v-card-text v-text="card.text2" class="textmid"></v-card-text>
                                        <v-card-text v-text="card.text3" class="textmid"></v-card-text>
                                    </v-col>
                                </v-card-title>
                            </v-img>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-card>
    </div>
</template>

<script>
    import GoTop from '@inotom/vue-go-top';
    export default {
        components: { GoTop },
        data: () => ({
            cards: [
            { id:1, title: 'Posaidon', src: '/images/blue.jpg',text:'แผลงฤทธิ์ โชว์ผลงานชิ้นล่าสุด\n',text2:'Mercedes-AMG A45\n',text3:'พลัง 550 แรงม้า พร้อมชุดแต่งสุด\n',flex: 6 },
            { id:2, title: '', src: '/images/blog/1.png', flex: 6 },
            ],
            backgroups: [
            { title: 'Pre-fab homes', src: '/images/blog/blog.png', flex: 12 },
            ]
        }),
    }
</script>

