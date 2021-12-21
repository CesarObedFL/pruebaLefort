<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-9">
                        <h2>Lista de Clientes</h2>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-sm btn-success" @click="showModalFormToCreate()">Crear Cliente</button>
                    </div>
                </div>
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

        <!-- <ShowCustomer :customer_id="id"></ShowCustomer> -->
        <!-- CUSTOMER MODAL -->
        <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-tittle" id="customerModalLabel">Cliente</h5>
                        <button type="button" class="btn btn-sm btn-danger" @click="closeModal()">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <input v-model="form.id" type="hidden">
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Nombre: </label>
                                <input v-model="form.fullname" type="text" class="form-control" placeholder="Escribe el nombre completo del cliente...">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo: </label>
                                <input v-model="form.email" type="email" class="form-control" placeholder="Escribe el correo del cliente...">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" @click="closeModal()">Cerrar</button>
                        <button v-if="action==0" type="button" class="btn btn-sm btn-success" @click="createCustomer()">Crear</button>
                        <button v-if="action==1" type="button" class="btn btn-sm btn-primary" @click="updateCustomer()">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- CUSTOMER MODAL -->

    </div>
</template>

<script>
    export default {
        created() {
            this.getAllCustomers(); 
        },

        data() {
            return {
                customerList: [],
                action: 0,
                form: {
                    id: '',
                    fullname: '',
                    email: ''
                },
                id: 0
            }
        },

        methods:{
            getAllCustomers() {
                let self = this;
                axios.get('/api/customer').then(function (response) {
                    self.customerList = response.data;
                }).catch(function(error) {
                    console.log(error);
                });
            },

            readCustomer(id) {
                let self = this;
                this.action = 1;
                axios.get('/api/customer/'+id).then(function (response) {
                    console.log(response);
                    self.form = response.data;
                    $('#customerModal').modal('show');
                }).catch(function (error) { 
                    console.log(error);
                });
            },

            showModalFormToCreate() {
                this.action = 0;
                $("#customerModal").modal('show');
            },

            createCustomer() {
                let self = this;
                axios.post('/api/customer', this.form).then(function (response) {
                    console.log(response);
                    self.closeModal();
                }).catch(function (error) {
                    console.log(error);
                });
            },

            updateCustomer() {
                let self = this;
                axios.put('/api/customer/'+this.form.id, this.form).then(function (response) {
                    console.log(response);
                    self.closeModal();
                }).catch(function (error) {
                    console.log(error);
                });
            },

            deleteCustomer(id) {
                let self = this;
                if(confirm('Seguro que deseas eliminar el cliente?...')) {
                    axios.delete('/api/customer/'+id).then(function (response) {
                        self.getAllCustomers();
                        console.log(response);
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            },

            closeModal() {
                $('#customerModal').modal('hide');
                this.action = 0;
                this.form.id = 0;
                this.form.fullname = '';
                this.form.email = '';
            },
        }
    }
</script>
