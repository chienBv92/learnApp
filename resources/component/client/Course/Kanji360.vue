<template>
    <div class="row">
        <!--        <CourseItem v-for="data in dataTotal" v-bind:myData="data"></CourseItem>-->
        <div class="col-md-4 col-lg-4 courseCardrow" v-for="data in dataTotal">
            <div id="" class="courseCard">

                <div class="course_thumbnail text-center">
                    <router-link v-if="data.active" :to='{name: "kanji360Detail", params: { metatitle: data.metaTitle}}'>
                        <img :src="data.Image" alt="Responsive image" class="img-responsive">

                    </router-link>
                    <img :src="data.Image" alt="Responsive image" class="img-responsive" v-else="data.active">

                </div>

                <div class="cardDescription">
                    <div class="cardTitle">
                        <h2>{{data.Name}}</h2></div>
                    <div class="mb-3 progress">
                        <div role="progressbar" aria-valuemin="0" :aria-valuemax="data.TotalLesson" :aria-valuenow="data.LessonLearning" class="progress-bar"
                             :style="{width: (data.LessonLearning / data.TotalLesson) * 100 + '%'}">
                            <!---->
                        </div>
                    </div>
                    <p>{{data.Description}}</p>
                </div>

                <div  class="card-button-wrapper text-center">
<!--                    <a  :href="data.metaTitle" class="" v-if="data.active" onclick="">-->
<!--                        <button type="button" class="btn startCourse btn-secondary">-->
<!--                            Vào học ngay-->
<!--                        </button>-->
<!--                    </a>-->
                    <router-link v-if="data.active" :to='{name: "kanji360Detail", params: { metatitle: data.metaTitle}}'>
                        <button type="button" class="btn startCourse btn-secondary">
                            Vào học ngay
                        </button>
                    </router-link>

                    <button :id="data.id" type="button" class="btn courseButton btn-secondary" v-else="data.active">
                        Khám phá ngay
                    </button>
                </div>
            </div>
        </div>
<!--        <router-view></router-view>-->

        <button @click="backHome">Back Home</button>
    </div>
</template>

<script>
    import json from './KanjiLevel.json';
    export default {
        name: "Kanji360",
        data: function () {
            return {
                dataTotal: json,
                errors: [],
            }
        },
        methods: {
            backHome(){
                this.$router.push('/');
            },
            // getListLevel() {
            //     axios.get('/listKanjiLevel')
            //         .then(response => {
            //             this.dataTotal = response.data;
            //             console.log(dataTotal);
            //         })
            //         .catch(error => {
            //             this.errors = error.response;
            //         })
            // }
        },
        created() {
            //this.getListLevel()
        },

    }
</script>

<style scoped>

</style>
