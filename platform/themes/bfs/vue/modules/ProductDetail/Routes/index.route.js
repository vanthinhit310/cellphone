const routes = [
    {
        path: "/products/:slug",
        component: "ProductDetail/Screens/ProductDetail.vue",
        name: "product-detail",
        authorize: { requiredAuth: false }
    }
];

export default routes;
