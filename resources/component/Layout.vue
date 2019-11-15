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
                    <CourseMain></CourseMain>

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
    import App from  './App';
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

</style>
