<template>
    <div class="kanjiDetail">
        <div v-if="kanjiLevel" class="single_course_header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3 text-center"><img :src="kanjiLevel.Image" alt="" class="img-responsive">
                            </div>
                            <div class="col-md-9 course_description">
                                <h2>{{kanjiLevel.Name}}</h2>
                                <p> {{kanjiLevel.Description}}</p>
                                <span class="course_progress">
                26 lessons - 27 out
                of  steps completed
                                </span>
                                <div class="progress">
                                    <div role="progressbar" aria-valuemin="0" :aria-valuemax="kanjiLevel.TotalLesson" :aria-valuenow="kanjiLevel.LessonLearning" class="progress-bar"
                                         :style="{width: (kanjiLevel.LessonLearning / kanjiLevel.TotalLesson) * 100 + '%'}">
                                        <!---->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 progress-icon text-center"><img src="img/inprocess.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="divTop" >
            <div class="lessonSelect" v-for="i in lessonMax" @click="selectLesson(i)" v-bind:class="{active:(lessonActive == i)}">
                <span>Trang {{i}}</span>
            </div>
            <div class="text-center margin-top-grade menu_grade_mobile">
                <div class="_1Iav0 _1wciQ"><span class="span-grade">Lớp <!-- -->7</span>
                    <i class="fa fa-chevron-circle-left pull-left _1a0Cb false"></i>
                    <i class="fa fa-chevron-circle-right pull-right _1a0Cb false"></i>
                </div>
            </div>
        </div>

        <div>{{data}}</div>
        <div v-for="item in data">
            <p>{{item.HanViet}}</p>
            <p>{{item.hiragara}}</p>
            <p>{{item.meaning}}</p>
        </div>
    </div>

</template>

<script>
    import json from '../KanjiLevel.json';
    export default {
        name: "kanji360Detail",

        data:function () {
            return {
                metaTitle: this.$route.params.metatitle,
                // dataTotal: json,
                data: [],
                kanjiLevel:{},
                lessonMax: 0,
                lessonActive: 1,
                error: []
            }
        },
        beforeCreate() {
            console.log("Giá trị đầu tiên: " + this.metaTitle)
        },
        created() {
            this.getListKanjiLevel();
        },
        beforeMount() {
        },
        mounted() {
            //console.log(this.data);
        },
        watch: {
            '$route'(to, from){
                this.id = to.params.id
            }
        },
        // mounted() {
        //     this.getDefaultFilter();
        // },
        methods: {
            getDefaultFilter() {
                //console.log(this.metaTitle);

                for(let i = 0; i < json.length; i++) {
                    if(json[i].metaTitle == this.metaTitle){

                        this.data = json[i];
                        console.log(this.data);
                        return this.data;
                    }
                }
            },
            getListKanjiLevel() {
                axios.get('/getKanjiByLevel/' + this.metaTitle)
                    .then(response => {
                        console.log(response);
                        if(response.status == 200){
                            this.data = response.data[0];
                            this.lessonMax = response.data[1];
                            this.kanjiLevel = response.data[2];
                        }
                    })
                    .catch(error => {
                        this.errors = error.response;
                    })
            },
            selectLesson(id){
                console.log("get lesson" + id);
                this.lessonActive = id;
            }

        },
        computed: {

        }
    }




</script>

<style scoped>
    .lessonSelect {
        font-size: 15px;
        display: inline-block;
        text-align: center;
        font-weight: 600;
        width: 95px;
        cursor: pointer;
        color: #4c4f64;
        padding-top: 16px!important;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
        padding: 14px;
        background-color: #fff;
        margin-left: 5px;
        margin-right: 5px;
        margin-top: 16px;
        height: 45px;
        -webkit-box-shadow: 1px -3px 1px -2px #65666a;
        box-shadow: 1px -3px 1px -2px #65666a;
    }

    .lessonSelect.active {
        background: linear-gradient(180deg, #55c57a 0, #36a55b);
    }

    .menu_grade_mobile {
        display: none;
    }
    ._1a0Cb {
        padding: 1px!important;
        font-size: 28px;
        padding-left: 4px!important;
        padding-right: 4px!important;
    }
    @media (max-width: 768px) {
        .menu_grade_mobile {
            display: inherit;
            margin-top: 21px !important;
        }
    }
    @media (max-width: 768px) {
        .lessonSelect {
            display: none;
        }
        ._1Iav0 {
            width: 350px;
            padding: 8px !important;
            font-size: 20px;
            display: inline-block;
            text-align: center;
            font-weight: 600;
            cursor: pointer;
            color: #4c4f64;
            border-radius: 10px;
            background-color: #fff;
            margin-left: 5px;
            margin-right: 5px;
            margin-top: 10px;
            height: 45px;
        }
    }

</style>
