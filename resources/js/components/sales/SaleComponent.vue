<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Lista de Ventas</h2>
                <div class="table-responsive">
                    <table class="table table-hover table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="sale in salesList" :key="sale.id">
                                <td >
                                    <button type="button" class="btn btn-primary" @click="showDetailSale(sale.id)" v-text="sale.id"></button>
                                </td>
                                <td v-text="sale.customer_id"></td>
                                <td v-text="sale.sale_date"></td>
                                <td v-text="sale.total"></td>
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
            this.getSales();
        },

        data() {
            return {
                salesList: []
            }
        },

        methods: {
            getSales() {
                let me = this;
                axios.get('/api/sale').then(function (response) {
                    me.salesList = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },

            showDetailSale(id) {
                $('#saleDetailModal').modal('show');
            }
        }
    }
</script>
