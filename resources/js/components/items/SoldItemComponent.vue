<template>
    <div class="modal fade" id="saleDetailModal" tabindex="-1" role="dialog" aria-labelledby="saleDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="saleDetailModalLabel">Productos Vendidos</h5>
                    <button type="button" class="btn btn-sm btn-danger" @click="closeSaleDetail()">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <dl class="row" v-for="item in items" :key="item.id">
                        <dt class="col-md-3">Departamento: </dt><dd class="col-md-9">{{ item.department }}</dd>
                        <dt class="col-md-3">Producto: </dt><dd class="col-md-9">{{ item.description }}</dd>
                        <dt class="col-md-3">Precio: </dt><dd class="col-md-9">{{ '$' + item.price }}</dd>
                    </dl>
                    <hr> <label for="total">{{ total }}</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="closeSaleDetail()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getSoldItemsBySale('1');
        },

        data() {
            return {
                items: [],
                total: 0
            }
        },

        methods: {
            getSoldItemsBySale(sale_id) {
                let me = this;
                axios.get('/api/sale/'+sale_id+'/solditems').then(function (response) {
                    me.items = response.data;
                    me.calculateTotal();
                }).catch(function (error) {
                    console.log(error);
                });
            },

            calculateTotal() {
                $.each(this.items, function(key, value) {
                    this.total = this.total + value.price;
                    console.log(value.price);
                });
                console.log(this.total);
            },

            closeSaleDetail() {
                $('#saleDetailModal').modal('hide');
            }
        }
    }
</script>
