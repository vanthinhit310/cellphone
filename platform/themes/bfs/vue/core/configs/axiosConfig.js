"use strict";
import axios from "axios";
import queryString from "query-string";
import qs from "qs";
import app from "@core/app.js";
import { notification } from "ant-design-vue";

// Declare a Map to store the identification and cancellation functions for each request
const pending = new Map();

const addPending = config => {
    const url = [config.method, config.url, qs.stringify(config.params), qs.stringify(config.data)].join("&");
    config.cancelToken =
        config.cancelToken ||
        new axios.CancelToken(cancel => {
            if (!pending.has(url)) {
                // If the current request does not exist in pending, add it
                pending.set(url, cancel);
            }
        });
};

const removePending = config => {
    const url = [config.method, config.url, qs.stringify(config.params), qs.stringify(config.data)].join("&");
    if (pending.has(url)) {
        // If the current request identity exists in pending, you need to cancel the current request and remove it
        const cancel = pending.get(url);
        cancel(url);
        pending.delete(url);
    }
};
/**
 * Empty requests in pending (called on route jumps)
 */
export const clearPending = () => {
    for (const [url, cancel] of pending) {
        cancel(url);
    }
    pending.clear();
};

const axiosClient = axios.create({
    baseURL: "/api/v1/",
    headers: { "content-type": "application/json" },
    paramsSerializer: params => queryString.stringify(params)
});

axiosClient.interceptors.request.use(
    async config => {
        removePending(config);
        addPending(config);
        // config.headers["Authorization"] = `Bearer ${localStorage.getItem("accessToken")}`;

        return { ...config };
    },
    error => {
        return Promise.reject(error);
    }
);

axiosClient.interceptors.response.use(
    response => {
        removePending(response.config);

        if (response && response.data) {
            return response.data;
        }
        return response;
    },
    error => {
        removePending(error.config || "");

        if (!!error.response) {
            const status = _.get(error, "response.status", 400);
            const message = _.get(error, "response.data.message", "");
            switch (status) {
                case 422:
                    const errors = _.get(error, "response.data.errors", "");
                    if (!!message) app.$message.error(message);

                    if (!!errors) app.$message.error(message);
                    break;

                case 404:
                    app.$router.push({ name: "notfound" });
                    break;

                default:
                    app.$message.error(message);
                    break;
            }
        }

        if (!axios.isCancel(error)) {
            return Promise.reject(error);
        } else {
            // return empty object for aborted request
            console.log("repeated request: " + error.message);
            return Promise.resolve({});
        }
    }
);
export default axiosClient;
