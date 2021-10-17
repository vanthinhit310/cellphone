const routes = [
    {
        path: "*",
        component: "BaseComponents/PageNotFound.vue",
        name: "notfound",
        authorize: { requiredAuth: false }
    }
];

export default routes;
