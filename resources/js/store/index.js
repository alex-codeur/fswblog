export default {
    state: {
        category: [],
        post: [],
        blogpost: [],
        singlepost: [],
        allcategories: [],
        latestpost: []
    },
    getters: {
        getCategory(state) {
            return state.category
        },
        getAllPost(state) {
            return state.post
        },
        getBlogPost(state) {
            return state.blogpost
        },
        singlepost(state) {
            return state.singlepost
        },
        allcategories(state) {
            return state.allcategories
        },
        latestpost(state) {
            return state.latestpost
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
        },
        getAllPost(context) {
            axios.get('/post')
                .then((response) => {
                    context.commit('allpost', response.data.posts)
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        getBlogPost(context) {
            axios.get('/blogpost')
                .then((response) => {
                    context.commit('getBlogPost', response.data.posts)
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        getPostById(context, payload) {
            axios.get('/singlepost/' + payload)
                .then((response) => {
                    context.commit('singlepost', response.data.post)
                })
        },
        allcategories(context) {
            axios.get('/categories')
                .then((response) => {
                    context.commit('allcategories', response.data.categories)
                })
        },
        getPostByCatId(context, payload) {
            axios.get('/categorypost/' + payload)
                .then((res) => {
                    context.commit('getPostByCatId', res.data.posts)
                })
        },
        SearchPost(context, payload) {
            axios.get('/search?*=' + payload)
                .then((response) => {
                    context.commit('getSearchPost', response.data.posts)
                })
        },
        latestPost(context) {
            axios.get('/latestpost')
                .then((response) => {
                    context.commit('latestpost', response.data.posts)
                })
                .catch((error) => {
                    console.log(error)
                })
        }
    },
    mutations: {
        categories(state, data) {
            return state.category = data
        },
        allpost(state, payload) {
            return state.post = payload
        },
        getBlogPost(state, payload) {
            return state.blogpost = payload
        },
        singlepost(state, payload) {
            return state.singlepost = payload
        },
        allcategories(state, payload) {
            return state.allcategories = payload
        },
        getPostByCatId(state, payload) {
            return state.latestpost = payload
        },
        getSearchPost(state, payload) {
            return state.latestpost = payload
        },
        latestpost(state, payload) {
            return state.latestpost = payload
        }
    }
}