<template>
    <div class="row justify-content-around">
        <div class="col-md-6">
            <div class="card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
                </div>
                <form role="form" @submit.prevent="updateCategory()">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="categoryId">Edit Category</label>
                            <input type="text" class="form-control" id="categoryId" placeholder="Add New Category" v-model="form.cat_name" name="cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }">
                            <has-error :form="form" field="cat_name"></has-error>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Edit',
        mounted() {
            axios.get(`/editCategory/${this.$route.params.categoryId}`)
                .then((response) => {
                    this.form.fill(response.data.category)
                })
        },
        data() {
            return {
                form: new Form({
                    cat_name: '',
                })
            }
        },
        methods: {
            updateCategory() {
                this.form.patch(`/update-category/${this.$route.params.categoryId}`)
                    .then((response) => {
                        this.$router.push('/category-list')

                        Toast.fire({
                            icon: 'success',
                            title: 'Category Updated successfully'
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