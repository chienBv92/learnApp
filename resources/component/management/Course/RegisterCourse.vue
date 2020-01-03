<template>
    <div class="container">
        <h2>Đăng ký khóa học</h2>
        <form class="form-horizontal" role="form" v-on:submit.prevent="onSubmit" method="post" enctype="multipart/form-data">

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Cấp độ</label>
                <div class="col-md-6">
                    <select v-model="course.level" class="form-control">
                        <option v-for="option in options" v-bind:value="option.value">
                            {{ option.text }}
                        </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Tên khóa học</label>
                <div class="col-md-6">
                    <input type="text" name="name" v-model="course.name" class="form-control"
                           placeholder="Nhập tên khóa học">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Mô tả</label>
                <div class="col-md-6">
                    <input type="text" name="description" v-model="course.description" class="form-control"
                           placeholder="mô tả khóa học">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Hình ảnh</label>
                <div class="col-md-6">
                    <input type="file" class="inputstl" id="selphoto" name="sentfile" tabindex="-1"
                           style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">
                    <div class="bootstrap-filestyle input-group">
                        <input type="text" class="form-control " placeholder=""
                               disabled=""> <span
                        class="group-span-filestyle input-group-btn" tabindex="0">
                        <label for="selphoto"
                               class="btn btn-primary "><span
                            class="icon-span-filestyle glyphicon glyphicon-upload"></span>
                        <span class="buttonText"> Chọn ảnh</span></label></span>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Kích hoạt</label>
                <div class="col-md-6">
                    <!--                    <input type="checkbox" id="checkbox" v-model="course.active"  class="form-group" style="float: left">-->
                    <toggle-switch v-model="course.active" :options="myOptions" class="custom-switch" style="float: left; padding: 0px"></toggle-switch>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Số bài học</label>
                <div class="col-md-6">
                    <input type="number" name="total_lesson" v-model="course.total_lesson" class="form-control"
                    >
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">Độ ưu tiên</label>
                <div class="col-md-6">
                    <input type="number" name="top" v-model="course.top" class="form-control"
                    >
                </div>
            </div>


            <div class="form-group row justify-content-center">
                <div class="col-md-4">
                    <button class="btn btn-lg btn-block btn-primary">Đăng ký khóa học</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        name: "RegisterCourse",
        data() {
            return {
                course: {
                    level: 0,
                    active: 'On'
                },

                options: [
                    {text: 'Tự chọn', value: '0'},
                    {text: 'Trình độ N1', value: '1'},
                    {text: 'Trình độ N2', value: '2'},
                    {text: 'Trình độ N3', value: '3'},
                    {text: 'Trình độ N4', value: '4'},
                    {text: 'Trình độ N5', value: '5'},
                    {text: 'Bổ sung', value: '6'}
                ],
                myOptions: {},
                answer: '',
                status:''
            }
        },
        methods: {
            onSubmit() {
                axios.post("/registerCourse", this.course)
                    .then((response) => {
                        console.log(response);
                        if(response.status == 200) {
                            this.status = 'success';
                            this.answer= response.ans;
                        }
                    })
                    .catch(error => {
                        this.errors = error.response;
                        this.status = 'error';
                    });
            }
        }
    };

</script>

<style>
    .inputstl {
        padding: 9px;
        border: solid 1px #173955;
        outline: 0;
        background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #AACCE8), to(#FFFFFF));
        background: -moz-linear-gradient(top, #FFFFFF, #AACCE8 1px, #FFFFFF 25px);
        box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
        -moz-box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
        -webkit-box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;

    }
</style>
