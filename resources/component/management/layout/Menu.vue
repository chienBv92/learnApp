<template>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #1cc88a">

        <!-- Sidebar - Brand -->
        <router-link class="sidebar-brand d-flex align-items-center justify-content-center" to="/">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Dashboard</div>
        </router-link>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <router-link class="nav-link" to="/" active-class="active" exact>
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Trang chủ</span>
            </router-link>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa fa-bars"></i>
                <span>Quản lý khóa học</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
<!--                    <a class="collapse-item" href="#/kanji360"></a>-->
                    <router-link class="collapse-item" :to="{name:'listCourse'}" active-class="active" exact>Danh sách khóa học</router-link>
                    <router-link class="collapse-item" :to="{name:'registCourse'}" active-class="active" exact>Đăng ký khóa học</router-link>

                    <router-link class="collapse-item" to="/kanji360" active-class="active" exact>Giáo trình Kanji 360</router-link>
                    <router-link class="collapse-item" to="/learn-level" active-class="active" exact>Trình độ N5</router-link>
                    <router-link class="collapse-item" to="/kanji360">Trình độ N4</router-link>
                    <router-link class="collapse-item" to="/kanji360">Trình độ N3</router-link>
                    <router-link class="collapse-item" to="/kanji360">Trình độ N2</router-link>
                    <router-link class="collapse-item" to="/kanji360">Trình độ N1</router-link>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-cubes"></i>
                <span>Luyện thi - Thi thử</span>
            </a>
            <div id="collapseProduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <router-link class="collapse-item" to="/">Trình độ N5</router-link>
                    <router-link class="collapse-item" to="/">Trình độ N4</router-link>
                    <router-link class="collapse-item" to="/">Trình độ N3</router-link>
                    <router-link class="collapse-item" to="/">Trình độ N2</router-link>
                    <router-link class="collapse-item" to="/">Trình độ N1</router-link>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Setting</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Setting:</h6>
                    <a class="collapse-item">
                        <label style="cursor: pointer"><input type="checkbox" v-model="isRandom" class="" @click="changeRandom">Chế độ Random</label>
                    </a>
                    <a class="collapse-item">
                        <label style="cursor: pointer"><input type="checkbox" class="" v-model="isDispHanViet" @click="changeDispHanViet">Chỉ hiển thị Hán Việt(kanji)</label>
                    </a>
                    <a class="collapse-item">
                        <label style="cursor: pointer"><input type="checkbox" class="" v-model="isOnlyKanji" @click="changeOnlyKanji">Chỉ hiển thị Kanji</label>
                    </a>
                    <a class="collapse-item">Borders</a>
                    <a class="collapse-item" >Animations</a>
                    <a class="collapse-item">Other</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

</template>

<script>
    export default {
        name: "Menu",
        data: function(){
            return{
                isRandom: this.$store.state.isRandom,
                isDispHanViet: this.$store.state.isDispHanViet,
                isOnlyKanji: this.$store.state.isOnlyKanji
            }
        },
        methods:{
            changeRandom(){
                console.log("Thay doi check" + this.isRandom);
                this.isRandom = !this.isRandom;
                this.$store.state.isRandom = this.isRandom;
                console.log("Sau Thay doi check" + this.$store.state.isRandom);
            },
            changeDispHanViet(){
                this.isDispHanViet = !this.isDispHanViet;
                this.$store.state.isDispHanViet = this.isDispHanViet;
            },
            changeOnlyKanji(){
                this.isOnlyKanji = !this.isOnlyKanji;
                this.$store.state.isOnlyKanji = this.isOnlyKanji;
            }

        }
    }
</script>

<style scoped>
.collapse-item{
    cursor: pointer;
}
</style>
