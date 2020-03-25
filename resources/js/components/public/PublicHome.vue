<template>
    <div>
        <header class="topbar">
            <div class="topbar_1">
                <div class="header_1">
                    <a href="#"><span class="site-title"><em class="color-title">Afrocode</em>.com</span></a>
                    <nav class="topbar-nav">
                        <ul>
                            <li>
                                <em><a href="index.html" class="active">Tutoriels</a></em>
                            </li>
                            <li>
                                <em><a href="blog.html">Blog</a></em>
                            </li>
                            <li>
                                <em><a href="forum.html">Forum</a></em>
                            </li>
                            <li>
                                <em><a href="contact.html">Contact</a></em>
                            </li>
                            <li>
                                <em><a href="portfolio.html">Portfolio</a></em>
                            </li>
                            <li>
                                <em><a href="boutique.html">Formations</a></em>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="topbar_2">
                <div class="header_2">
                    <div class="sign-login">
                        <em><a href="inscripton.html">S'inscrire</a></em>
                        <em><a href="connexion.html">Se connecter</a></em>
                    </div>
                    <form action="">
                        <input type="text" placeholder="Rechercher..." v-model="keyword" @keyup=""><button type="submit" @click.prevent="RealSearch" class="button">search</button>
                    </form>
                </div>
            </div>
        </header>

        <main class="container">
            <section class="liste-articles">
                <article class="card" v-for="post in blogpost">
                    <div class="card-img">
                        <router-link :to="`blog/${post.id}`"><img :src="`uploadImage/${post.photo}`" alt=""></router-link>
                    </div>
                    <div class="card-body">
                        <h4><em><strong><router-link :to="`blog/${post.id}`">{{ post.title }}</router-link></strong></em></h4>
                        <router-link :to="`blog/${post.id}`" v-if="post.category">---{{ post.category.cat_name }}---</router-link>
                        <p>{{post.description | sortlength(500, '...')}}</p>
                    </div>
                    <div class="card-footer">
                        <span class="pseudo" v-if="post.user"><em><strong>Par {{ post.user.name }}</strong></em></span>
                        <span class="time"><em>Il y a 9 min</em></span>
                    </div>
                </article>

                <div class="pagination">
                    <a href="#"><img src="img/chevron-left.svg" width="25" height="25" alt=""></a>
                        <span><a href="#">1</a></span>
                        <span><a href="#" class="active">2</a></span>
                        <span><a href="#">3</a></span>
                        <span><a href="#">4</a></span>
                        <span><a href="#">5</a></span>
                    <a href="#"><img src="img/chevron-right.svg" width="25" height="25" alt=""></a>
                </div>

        </section>
        <aside class="aside">
           

            <div class="aside-top">
                <em>catégories</em>
            </div>
            <div class="categorie" v-for="category in allcategories">
                <router-link :to="`/categories/${category.id}`">{{category.cat_name}}</router-link>
            </div>
        </aside>
           <aside class="aside">
            <div class="aside-top">
                <em>articles récents</em>
            </div>
            <div class="aside-bottom" v-for="post in blogpost">
                <div class="aside-bottom-content">
                    <router-link :to="`blog/${post.id}`" class="aside-img"><img :src="`uploadImage/${post.photo}`" width="60" height="60" alt=""></router-link>
                    <h2 class="aside-title"><em><router-link :to="`blog/${post.id}`">{{ post.title }}</router-link></em></h2>
                    <p>{{post.description | sortlength(30, '...')}}</p>
                    <div class="aside-data" ><em>Il y a 17 heures</em></div>
                </div>
                
            </div>
        </aside>
    </main> 
    </div>
</template>

<script>
import _ from 'lodash'

export default {
    name: "PublicHome",
    data() {
        return {
            keyword: ""
        }
    },
    mounted() {
        this.$store.dispatch('latestPost');
        this.$store.dispatch('allcategories');
    },
    computed: {
        blogpost() {
            return this.$store.getters.latestpost
        },
        allcategories() {
            return this.$store.getters.allcategories
        }
    },
    methods: {
        getAllCategoryPost() {
            if(this.$route.params.id != null) {
                this.$store.dispatch('getPostByCatId', this.$route.params.id);
            } else {
                this.$store.dispatch('getBlogPost')
            }
        },
        RealSearch:_.debounce(function () {
            this.$store.dispatch('SearchPost', this.keyword);
        }, 1000)
    },
    watch: {
        $route(to, from) {
            this.getAllCategoryPost();
        }
    }
    
}
</script>

<style  scoped>

</style>