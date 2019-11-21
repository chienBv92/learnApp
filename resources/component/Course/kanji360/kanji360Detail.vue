<template>
    <div>
        Hán tự {{$route.params.metatitle}}
        <p id="metaTi">{{metaTitle}}</p>
<!--        <div v-for="data in dataLevel">-->
<!--            <p>data</p>-->
<!--        </div>-->
        <div v-for="i in lessonMax">
            <button @click="{i}">Bài học {{i}}</button>
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
                lessonMax: 0,
                error: []
                // dataLevel: json.filter(function (el) {
                //     return el.metaTitle == this.metaTitle;
                // })
                    // dataLevel: json.filter(x=> x.metaTitle == this.metaTitle).
            }
        },
        beforeCreate() {
            console.log("Giá trị đầu tiên: " + this.metaTitle)
        },
        created() {
            //console.log(this.data);
            //console.log("Giá trị created: " + this.metaTitle)
            //this.getDefaultFilter();
            this.getListKanjiLevel();
            //console.log("Giá trị data created: " + this.data[0].id)

            //console.log(document.getElementById('metaTi').innerHTML)
        },
        beforeMount() {
            // console.log("Giá trị beformount: " + this.metaTitle)
            //
            // console.log(document.getElementById('metaTi').innerHTML)
        },
        mounted() {
            // console.log(this.$el)
            // console.log(document.getElementById('metaTi').innerHTML);
            console.log(this.data);
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
                        this.data = response.data[0];
                        this.lessonMax = response.data[1];
                    })
                    .catch(error => {
                        this.errors = error.response;
                    })
            }

        },
        computed: {

        }
    }


</script>

<style scoped>

</style>
