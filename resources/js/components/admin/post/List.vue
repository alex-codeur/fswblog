<template>
    <div>
        <section class="content">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post List</h3>
                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-post" style="color: #ffffff">Add Post</router-link>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>s1</th>
                                        <th>User</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Photo</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(post, index) in allpost" :key="post.id">
                                        <td>{{index+1}}</td>
                                        <td v-if="post.user">{{post.user.name}}</td>
                                        <td v-if="post.category">{{post.category.cat_name}}</td>
                                        <td>{{ post.title | sortlength(20, '---') }}</td>
                                        <td>{{ post.description | sortlength(40, '...') }}</td>
                                        <td><img :src="ourImage(post.photo)" width="40" height="50"></td>
                                        <td>
                                            <router-link :to="`/edit-post/${post.id}`">Edit</router-link>
                                            <a href="" @click.prevent="deletePost(post.id)">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: "List",
    mounted() {
        this.$store.dispatch('getAllPost')
    },
    computed: {
        allpost() {
            return this.$store.getters.getAllPost
        }
    },
    methods: {
        ourImage(img) {
            return "uploadImage/" + img;
        },
        deletePost(id) {
            axios.delete('/delete/' + id)
                .then(() => {
                    this.$store.dispatch("getAllPost")

                    Toast.fire({
                        icon: 'success',
                        title: 'Post Deleted successfully'
                    })
                })
                .catch((error) => {
                    console.log(error)
                })
        }
    }
}
</script>

<style scoped>

</style>