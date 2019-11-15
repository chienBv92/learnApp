<template>
    <CourseItem v-for="data in dataTotal" v-bind:myData="data" :key="data"></CourseItem>

</template>

<script>
    import json from './testCourse.json';
    import CourseItem from "./CourseItem";
    export default {
        name: "CourseMain",
        components: {CourseItem},
        data: function () {
            return {
                dataTotal: json
            }
        },
        methods: {

        }

    }
</script>

<style scoped>

</style>
