import CourseMain from "../component/Course/CourseMain";
import Kanji360 from "../component/Course/Kanji360";
import CourseItem from "../component/Course/CourseItem";
import LearnLevel from "../component/Course/LearnLevel";
import kanji360Detail from "../component/Course/kanji360/kanji360Detail";
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
