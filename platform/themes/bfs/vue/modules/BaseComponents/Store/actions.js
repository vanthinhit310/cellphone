export default {
    setLoadingState({commit, state, dispatch}, status) {
        commit('setLoadingState', status);
    }
};
