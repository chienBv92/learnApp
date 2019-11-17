<template >
<div>
    chi tiet khoa hoc
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
