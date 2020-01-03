import CourseMain from "../../component/management/Course/CourseMain";
import Kanji360 from "../../component/management/Course/Kanji360";
import CourseItem from "../../component/management/Course/CourseItem";
import LearnLevel from "../../component/management/Course/LearnLevel";
import ListCourse from "../../component/management/Course/ListCourse";
import RegisterCourse from "../../component/management/Course/RegisterCourse";

export const routes = [
    {
        path: "/",
        name: "homepage",
        component: CourseMain
    },
    {
        path: "/register-course",
        name: "registCourse",
        component: RegisterCourse
    },
    {
        path: "/list-course",
        name: "listCourse",
        component: ListCourse
    },
    {
        path: "/kanji360",
        name: "hi",
        component: Kanji360,
        // children:[
        //     {
        //         path: ':metatitle/:id',
        //         name: "kanji360Detail",
        //         component: kanji360Detail
        //     }
        // ]
    },

    {
        path: "/course:name",
        name: "course",
        component: CourseItem
    },
]
