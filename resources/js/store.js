import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);
export const store = new Vuex.Store({
    state:{
        isRandom: false,
        isDispHanViet: false,
        isOnlyKanji:false,
        lessonLearning:2
    }

})


