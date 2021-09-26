const routes = [
    {
        path: "/",
        component: "Home/Screens/Home.vue",
        name: "home",
        authorize: { requiredAuth: false },
    },
];

export default routes;
