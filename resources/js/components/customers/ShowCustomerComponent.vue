<template>
    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Cliente</h5>
                    <button type="button" class="btn btn-sm btn-danger" @click="closeCustomerDetail()">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Nombre :</label>
                            <input v-model="customer.fullname" type="text" class="form-control" id="fullname" placeholder="Escribe el nombre completo del cliente..." aria-describedby="fullnamehelp">
                            <div id="fullnamehelp" class="form-text">Escribe el nombre(s) y apellidos del cliente</div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo :</label>
                            <input v-model="customer.email" type="email" class="form-control" id="email" placeholder="Escribe el correo del cliente..." aria-describedby="emailhelp">
                            <div id="emailhelp" class="form-text">Escribe un correo valido del cliente</div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="closeCustomerDetail()">Cerrar</button>
                    <button v-if="accion_type==0" type="button" class="btn btn-success" @click="updateCustomer()">Crear</button>
                    <button v-if="accion_type==1" type="button" class="btn btn-success" @click="updateCustomer()">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ShowCustomer",
        props: [ "customer_id"],

        created() {
            console.log("id : " + this.customer_id);
            this.readCustomer();
        },

        updated() {
            console.log("id : " + this.customer_id);
        },

        data() {
            return {
                customer: [],
                form: {
                    fullname: '',
                    email: ''
                },
                accion_type: 0
            }
        },

        methods: {
            readCustomer() {
                console.log('ci: ' + this.customer_id);
                axios.get('/api/customer/'+this.customer_id).then(function (response) {
                    console.log(response);
                    this.customer = response.data;
                }).catch(function (error) { 
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

            updateCustomer() {
                let me = this;
                axios.put('/api/customer/'+me.customer_id, me.form).then(function (response) {
                    console.log(response);
                }).catch(function (error) {
                    console.log(error);
                });
            },

            closeCustomerDetail() {
                $('#customerModal').modal('hide');
                this.clearFields();
                $('#customerModal').data('modal', null);
            },

            clearFields() {
                this.accion_type = 0;
                this.form.fullname = "";
                this.form.email = "";
            }
        }
    }
</script>
