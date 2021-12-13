<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Lista de Clientes</h2>
                <div class="table-responsive">
                    <table class="table table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="customer in customerList" :key="customer.id">
                                <td v-text="customer.id"></td>
                                <td v-text="customer.fullname"></td>
                                <td v-text="customer.email"></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" @click="readCustomer(customer.id)"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-danger btn-sm" @click="deleteCustomer(customer.id)"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getAllCustomers();    
        },
        data() {
            return {
                form: {
                    id: "",
                    fullname: "",
                    email: ""
                },
                customerList: []
            }
        },

        methods:{
            getAllCustomers() {
                let me = this;
                axios.get('/api/customer').then(function (response) {
                    me.customerList = response.data;
                }).catch(function(error) {
                    console.log(error);
                });
            },

            createCustomer() {
                let me = this;
                axios.post('/api/customer', me.form).then(function (response) {
                    console.log(response);
                }).catch(function (error) {
                    console.log(error);
                });
            },

            readCustomer(id) {
                let me = this;
                axios.get('/api/customer/'+id).then(function (response) {
                    //me.customerList = response.data;
                    console.log(response);
                }).catch(function (error) { 
                    console.log(error);
                });
            },

            updateCustomer(id) {
                let me = this;
                axios.put('/api/customer/'+id, me.form).then(function (response) {
                    console.log(response);
                }).catch(function (error) {
                    console.log(error);
                });
            },

            deleteCustomer(id) {
                let me = this;
                if(confirm('Seguro que deseas eliminar el cliente?...')) {
                    axios.delete('/api/customer/'+id).then(function (response) {
                        me.getAllCustomers();
                        console.log(response);
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            },

            clearFields() {
                this.form.id = "";
                this.form.fullname = "";
                this.form.email = "";
            }

        }
    }
</script>
