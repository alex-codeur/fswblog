<template>
    <div id="singlepost">
        <main class="container">
        <section class="liste-articles">
            <article class="card">
                <div class="card-img">
                    <img :src="`uploadImage/${singlepost.photo}`" alt="">
                </div>
                <div class="card-body">
                    <h4><em><strong>{{ singlepost.title }}</strong></em></h4>
                    <a>---{{ singlepost.category.cat_name }}---</a>
                    <p>{{singlepost.description}}</p>
                    <span class="pseudo" v-if="singlepost.user"><em><strong>Par {{ singlepost.user.name }}</strong></em></span>
                </div>
            </article>
        </section>
        <aside class="aside">
            <div class="aside-top">
                <em>catégories</em>
            </div>
            <div class="categorie" v-for="category in allcategories">
                <router-link :to="`/categories/${category.id}`">{{category.cat_name}}</router-link>
            </div>
        </aside>
    </main> 
    </div>
</template>

<script>
import publicHome from "./PublicHome.vue"

export default {
    name: "SinglePost",
    computed: {
        singlepost() {
            return this.$store.getters.singlepost
        },
        allcategories() {
            return this.$store.getters.allcategories
        }
    },
    methods: {

    },
    mounted() {
        this.$store.dispatch('getPostById', this.$route.params.id);
        this.$store.dispatch('allcategories');
    }
    
}
</script>

<style  scoped>

</style>