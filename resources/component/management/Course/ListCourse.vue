<template>
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách khóa học</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Level</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Tổng bài học</th>
                        </tr>
                        </thead>

                        <tbody>
                        <p v-if="status == 'error'" >Có lỗi xảy ra</p>
                        <tr v-for="course in courses">
                            <td>{{course.name}}</td>
                            <td>{{course.level}}</td>
                            <td>{{course.description}}</td>
                            <td>{{course.active}}</td>
                            <td>{{course.total_lesson}}</td>
                            <td>Xóa</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
    export default {
        name: "ListCourse",
        data() {
            return {
                courses: [],
                error: [],
                status:''
            }
        },
        created: function () {
            this.listCourse();
        },
        methods: {
            listCourse() {
                axios.get("/getListCourse")
                    .then((response) => {
                        console.log(response);
                        if(response.status == 200) {
                            this.status = 'success';
                            this.courses = response.data;
                        }
                    })
                    .catch(error => {
                        this.errors = error.response;
                        this.status = 'error';
                    });
            }
        }
    }
</script>
