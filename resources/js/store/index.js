export default {
    state: {
        category: [],
    },
    getters: {
        getCategory(state) {
            return state.category
        }
    },
    actions: {
        allCategory(context) {
            axios.get('/category')
                .then((response) => {
                    context.commit('categories', response.data.categories)
                })
                .catch((error) => {
                    console.log(error)
                })
        }
    },
    mutations: {
        categories(state, data) {
            return state.category = data
        }
    }
}