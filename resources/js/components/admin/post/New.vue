<template>
    <div class="row justify-content-around">
        <div class="col-md-10">
            <div class="card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add New Post</h3>
                </div>
                <form role="form" enctype="multipart/form-data" @submit.prevent="addNewPost()">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="title" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                            <has-error :form="form" field="title"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <markdown-editor v-model="form.description"></markdown-editor>
                            <has-error :form="form" field="description"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" v-model="form.cat_id" :class="{ 'is-invalid': form.errors.has('cat_id') }">
                                <option disabled>Select One</option>
                                <option :value="category.id" v-for="category in getAllCategory">{{category.cat_name}}</option>
                            </select>
                            <has-error :form="form" field="cat_id"></has-error>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input @change="changePhoto($event)" type="file" name="photo" class="form-control" id="photo" :class="{ 'is-invalid': form.errors.has('photo') }">
                            <img :src="form.photo" width="80" height="80">
                            <has-error :form="form" field="photo"></has-error>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "New",
    data() {
        return {
            form: new Form({
                title: '',
                description: '',
                cat_id: '',
                photo: ''
            })
        }
    },
    mounted() {
        this.$store.dispatch("allCategory")
    },
    computed: {
        getAllCategory() {
            return this.$store.getters.getCategory
        }
    },
    methods: {
        changePhoto(event) {
            let file = event.target.files[0];
            console.log(file)
            if(file.size > 1048576) {
                Toast.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href>Why do I have this issue?</a>'
                })
            } else {
                let reader = new FileReader();

                reader.onload = event => {
                    this.form.photo = event.target.result
                    console.log(event.target.result)
                };

                reader.readAsDataURL(file);
            }
        },
        addNewPost() {
            this.form.post('/savepost')
                .then(() => {
                    this.$router.push('/post-list')

                    Toast.fire({
                        icon: 'success',
                        title: 'Post Added successfully'
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