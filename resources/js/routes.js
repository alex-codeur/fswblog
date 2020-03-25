import AdminHome from './components/admin/AdminHome.vue'

// category
import CategoryList from './components/admin/category/List.vue'
import AddCategory from './components/admin/category/New.vue'
import EditCategory from './components/admin/category/Edit.vue'

// post
import PostList from './components/admin/post/List.vue'
import AddPost from './components/admin/post/New.vue'
import EditPost from './components/admin/post/Edit.vue'

// Frontend Component
import PublicHome from './components/public/PublicHome.vue'
import SinglePost from './components/public/SinglePost.vue'

export const routes = [
    {
        path:'/home',
        component: AdminHome,
    },

    // Category
    {
        path: '/category-list',
        component: CategoryList
    },
    {
        path: '/add-category',
        component: AddCategory
    },
    {
        path: '/edit-category/:categoryId',
        component: EditCategory
    },

    // Post
    {
        path: '/post-list',
        component: PostList
    },
    {
        path: '/add-post',
        component: AddPost
    },
    {
        path: '/edit-post/:postId',
        component: EditPost
    },

    // Frontend Route
    {
        path: '/',
        component: PublicHome
    },
     {
        path: '/blog/:id',
        component: SinglePost
    },
    {
        path: '/categories/:id',
        component: PublicHome
    }

];