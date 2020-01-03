<template>
    <div id="wrapper">
        <!-- Sidebar -->
        <Menu></Menu>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <Header></Header>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
<!--                    <CourseMain></CourseMain>-->
                    <transition name="slide">
                        <router-view></router-view>
                    </transition>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
<!--            @include('admin.layouts.footer')-->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
</template>

<script>
    import Menu from './Menu';
    import Header from './Header';
    import App from './App';
    import CourseMain from "./Course/CourseMain";

    export default {
        name: "Layout",
        components: {
            Menu: Menu,
            Header: Header,
            App: App,
            CourseMain
        }
    }
</script>

<style scoped>
    .slide-leave-active{
        transition: opacity 0.5s ease;
        opacity: 0;
        animation: slide-out 0.5s ease-out forwards;
    }
    .slide-leave{
        opacity: 1;
        transform: translateX(0);
    }
    @keyframes slide-out {
        0%{
            transform: translateX(0);
        }
        100%{
            tranform:translateX(30px)

        }

    }

</style>
