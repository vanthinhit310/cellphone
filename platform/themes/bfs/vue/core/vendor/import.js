import Vue from "vue";
import Antd from "ant-design-vue";
import VueMeta from "vue-meta";

Vue.use(VueMeta, {
    keyName: "metaInfo",
    attribute: "data-vue-meta",
    ssrAttribute: "data-vue-meta-server-rendered",
    tagIDKeyName: "vmid",
    refreshOnceOnNavigation: true
});
Vue.use(Antd);
