<template>
    <div>
        <section class="content">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category List</h3>
                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-category" style="color: #ffffff">Add Category</router-link>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <select v-model="select" @change="deleteSelected">
                                                <option>Select</option>
                                                <option>Delete all</option>
                                            </select>
                                            <input type="checkbox" @click.prevent="selectAll" v-model="all_select"><span v-if="all_select==false">Check All</span><span v-else>UnCheck All</span>
                                        </th>
                                        <th>s1</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(category, index) in getAllCategory" :key="category.id">
                                        <td><input type="checkbox" v-model="categoryItem" :value="category.id"></td>
                                        <td>{{index+1}}</td>
                                        <td>{{ category.cat_name }}</td>
                                        <td>{{ category.created_at | timeformat }}</td>
                                        <td>
                                            <router-link :to="`/edit-category/${category.id}`">Edit</router-link>
                                            <a href="" @click.prevent="deleteCategory(category.id)">Delete</a>
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
        name: 'List',
        data() {
            return {
                categoryItem: [],
                select: '',
                all_select: false
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
            deleteCategory(id) {
                axios.delete('/category/' + id)
                    .then(() => {
                        this.$store.dispatch("allCategory")

                        Toast.fire({
                            icon: 'success',
                            title: 'Category Deleted successfully'
                        })
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            },
            deleteSelected() {
                axios.get('/deletecategory/' + this.categoryItem)
                    .then(() => {
                        this.categoryItem = [],
                        this.$store.dispatch("allCategory")

                        Toast.fire({
                            icon: 'success',
                            title: 'Category Deleted successfully'
                        })
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            },
            selectAll() {
                if(this.all_select == false) {
                    this.all_select = true
                    for(var category in this.getAllCategory) {
                        this.categoryItem.push(this.getAllCategory[category].id)
                    }
                } else {
                    this.all_select = false
                    this.categoryItem = []
                }
                
            }
        }
    }
</script>

<style scoped>

</style>