<template >

    <div class="col-md-4 col-lg-4 courseCardrow">
        <div id="" class="courseCard">

            <div class="course_thumbnail text-center">
                <a href="/vi/course/eng-breaking-revolution" class=""><img src="https://dev.learn.x3english.com/wp-content/uploads/2018/05/photo-1.png" alt="Responsive image" class="img-responsive"></a>
            </div>

            <div class="cardDescription">
                <div class="cardTitle">
                    <h2 >Eng Breaking</h2></div>
                <div class="mb-3 progress">
                    <div role="progressbar" aria-valuemin="0" aria-valuemax="170" aria-valuenow="18" class="progress-bar" style="width: 10.5882%;">
                        <!---->
                    </div>
                </div>
                <p >Phá băng tiếng Anh, thành thạo giao tiếp cơ bản với người bản xứ chỉ sau 144 giờ luyện tập, dựa trên 3 kỹ thuật nền tảng. Việt</p>
            </div>

            <div  class="card-button-wrapper text-center">
                <a  href="/vi/course/eng-breaking-revolution" class="">
                    <button type="button" class="btn startCourse btn-secondary">
                        Vào học ngay
                    </button>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CourseItem",
        props: ['myData'],
        data: function () {
            return{
                dulieu : this.myData
            }
        },
        methods: {

        }
    }
</script>

<style scoped>

</style>
