<template>
    <div class="kanjiDetail" v-if="status =='success'">
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
                {{lessonActive}} lessons - {{kanjiLevel.TotalLesson - lessonActive}} out
                of  steps completed
                                </span>
                                <div class="progress">
                                    <div role="progressbar" aria-valuemin="0" :aria-valuemax="kanjiLevel.TotalLesson" :aria-valuenow="lessonActive" class="progress-bar"
                                         :style="{width: (lessonActive / kanjiLevel.TotalLesson) * 100 + '%'}">
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

        <div class="settingDspKan">
            <a class="collapse-item">
                <label style="cursor: pointer"><input type="checkbox" v-model="isRandom" class="" @click="changeRandom">Chế độ Random</label>
            </a>
            <a class="collapse-item">
                <label style="cursor: pointer"><input type="checkbox" class="" v-model="isDispHanViet" @click="changeDispHanViet">Hiển thị Hán Việt + kanji</label>
            </a>
            <a class="collapse-item">
                <label style="cursor: pointer"><input type="checkbox" class="" v-model="isOnlyKanji" @click="changeOnlyKanji">Chỉ hiển thị Kanji</label>
            </a>
        </div>

        <div class="divTop" >
            <div class="lessonSelect" v-for="i in lessonMax" @click="selectLesson(i)" v-bind:class="{active:(lessonActive == i)}">
                <span>Trang {{i}}</span>
            </div>
            <div class="text-center margin-top-grade menu_grade_mobile">
                <div class="_1Iav0 _1wciQ" v-for="i in lessonMax" v-bind:class="{active:(lessonActive == i)}"
                v-if="(lessonActive == i)">
                    <span class="span-grade" @click="selectLesson(i)">Trang {{i}} </span>
                    <i class="fa fa-chevron-circle-left pull-left _1a0Cb dec" @click="selectLessonDec(i)" v-bind:class="{'YEPux':(i<=1)}" :disabled="i<=1"></i>
                    <i class="fa fa-chevron-circle-right pull-right _1a0Cb inc" @click="selectLessonInc(i)" v-bind:class="{'YEPux':(i>=lessonMax)}" :disabled="i==lessonMax"></i>
                </div>
            </div>
        </div>

        <div id="kanjiAll">
            <div class="kanjiAll" v-for="item in dataLesson" @click="">
                <div class="dsp-kanji"> {{item.kanji}}</div>
                <div class="dsp-hanviet" v-if="!isOnlyKanji"> {{item.HanViet}} </div>
                <div class="dsp-meaning" v-show="!isOnlyKanji"> {{item.meaning}} </div>

            </div>

        </div>


        <div v-for="item in data">
            <p>{{item.HanViet}}</p>
            <p>{{item.hiragara}}</p>
            <p>{{item.meaning}}</p>
        </div>
    </div>
    <div v-else>
        Loading....
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
                isRandom: this.$store.state.isRandom,
                isDispHanViet: this.$store.state.isDispHanViet,
                isOnlyKanji: this.$store.state.isOnlyKanji,

                data: [],
                dataLesson: [],
                kanjiLevel:{},
                lessonMax: 0,
                lessonActive: this.$store.state.lessonLearning,
                isOnlyKanji: this.$store.state.isOnlyKanji,
                error: [],
                status:''
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
            },

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
            // setting hiển thị
            changeRandom(){
                this.isRandom = !this.isRandom;
                this.$store.state.isRandom = this.isRandom;
                this.getDataLesson();
            },
            changeDispHanViet(){
                this.isDispHanViet = !this.isDispHanViet;
                this.$store.state.isDispHanViet = this.isDispHanViet;
            },
            changeOnlyKanji(){
                this.isOnlyKanji = !this.isOnlyKanji;
                this.$store.state.isOnlyKanji = this.isOnlyKanji;
            },

            getListKanjiLevel() {
                axios.get('/getKanjiByLevel/' + this.metaTitle)
                    .then(response => {
                        console.log(response);
                        if(response.status == 200){
                            this.status = 'success';
                            this.data = response.data[0];
                            this.lessonMax = response.data[1];
                            this.kanjiLevel = response.data[2];
                            this.getDataLesson();
                        }
                    })
                    .catch(error => {
                        this.errors = error.response;
                        this.status = 'error';
                    })
            },
            selectLesson(id){
                console.log("get lesson" + id);
                this.lessonActive = id;
                //this.$store.state.lessonLearning = this.lessonActive;
                this.getDataLesson();
            },
            selectLessonDec(id){
                if(id > 1){
                    this.lessonActive = id - 1;
                    //this.$store.state.lessonLearning = this.lessonActive;
                    this.getDataLesson();
                }
            },
            selectLessonInc(id){
                if(id < this.lessonMax) {
                    this.lessonActive = id + 1;
                    //this.$store.state.lessonLearning = this.lessonActive;
                    this.getDataLesson();
                }
            },
            getDataLesson(){
                this.dataLesson = this.data.filter((item) => item.lesson === this.lessonActive);
                if(this.isRandom){
                    this.dataLesson = this.shuffle(this.dataLesson);
                }
            },
            // Ham dao trat tu mang
            shuffle(a) {
                var j, x, i;
                for (i = a.length - 1; i > 0; i--) {
                    j = Math.floor(Math.random() * (i + 1));
                    x = a[i];
                    a[i] = a[j];
                    a[j] = x;
                }
                return a;
            }

        },
        computed: {
            LessonLearning: function () {
                return this.$store.state.lessonLearning
            }

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
    .settingDspKan{
        padding-top: 10px;
        background: #eceaf5;
    }

    #kanjiAll .kanjiAll {
        font-size: 15px;
        display: inline-block;
        text-align: center;
        font-weight: 600;
        width: 120px;
        cursor: pointer;
        color: #4c4f64;
        padding-top: 16px!important;
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
        /*padding: 14px;*/
        background-color: #fff;
        margin-left: 5px;
        margin-right: 5px;
        margin-top: 16px;
        height: 100px;
        -webkit-box-shadow: 1px -3px 1px -2px #65666a;
        box-shadow: 1px -3px 1px -2px #65666a;
        border: solid 1px ;
    }
    #kanjiAll .dsp-kanji{
        font-size: 24px;
        font-weight: bold;
        text-align: center;
    }
    #kanjiAll .dsp-hanviet{
        font-size: 16px;
        font-weight: normal;
        text-align: center;
    }
    #kanjiAll .dsp-meaning{
        font-size: 11px;
        font-weight: normal;
        text-align: center;
    }

    .lessonSelect.active {
        background: linear-gradient(180deg, #55c57a 0, #36a55b);
    }

    .menu_grade_mobile {
        display: none;
    }

    @media (max-width: 768px) {
        .lessonSelect {
            display: none;
        }
        .menu_grade_mobile {
            display: inherit;
            margin-top: 21px !important;
        }
        ._1a0Cb {
            color: white;
            padding: 1px!important;
            font-size: 28px;
            padding-left: 4px!important;
            padding-right: 4px!important;
        }
        .span-grade{
            color: white;
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
        ._1Iav0.active {
            background: linear-gradient(180deg, #55c57a 0, #36a55b);
        }
        .YEPux {
            color: #ffffff4d;
        }
    }

</style>
