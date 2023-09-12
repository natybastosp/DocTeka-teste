import Vue from "vue";
import VueRouter from "vue-router";
import FreteComponent from "./components/FreteComponent.vue";

Vue.use(VueRouter);

const routes = [
    {
        path: "/frete",
        component: FreteComponent,
    },
];

const router = new VueRouter({
    routes,
});

export default router;
