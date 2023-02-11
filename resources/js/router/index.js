import {createRouter, createWebHistory } from "vue-router";
import Index from "../components/Index.vue";
import Map from "../components/Map.vue";


const routes = [
    {
        path: "/",
        name: "index",
        component: Index,
    },
    {
        path: "/map",
        name: "map",
        component: Map,
        props: true
    }
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
});

export default router;