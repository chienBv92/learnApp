import CourseMain from "../../component/client/Course/CourseMain";
import Kanji360 from "../../component/client/Course/Kanji360";
import CourseItem from "../../component/client/Course/CourseItem";
import LearnLevel from "../../component/client/Course/LearnLevel";
import kanji360Detail from "../../component/client/Course/kanji360/kanji360Detail";
export const routes = [
    {
        path: "/",
        name: "homepage",
        component: CourseMain
    },
    {
        path: "/kanji360",
        name: "kanji360",
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
        path: "/kanji360/:metatitle",
        name: "kanji360Detail",
        component: kanji360Detail
    },
    {
        path: "/learn",
        name: "learn",
        component: LearnLevel,
        children:[
            {path: "/:id", name: "Learnlevel", component: LearnLevel},
            {path: "/:id/edit", name: "LearnlevelEdit", component: LearnLevel}
        ]
    },
    {
        path: "/course:name",
        name: "course",
        component: CourseItem
    },
]
