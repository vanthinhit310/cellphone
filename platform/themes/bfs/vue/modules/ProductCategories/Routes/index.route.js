const routes = [
    {
        path: "/:slug",
        component: "ProductCategories/Screens/ProductCategory.vue",
        name: "product-category",
        authorize: { requiredAuth: false }
    }
];

export default routes;
