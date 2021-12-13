<template>
    <!-- Modal -->
    <div class="modal fade" id="saleDetailModal" tabindex="-1" role="dialog" aria-labelledby="saleDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="saleDetailModalLabel">Productos Vendidos</h5>
                    <button type="button" class="close" aria-label="Close" @click="closeSaleDetail()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group" v-for="item in items" :key="item.id">
                        <li class="list-group-item" v-text="item.description"></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="closeSaleDetail()">Close</button>
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
                items: []
            }
        },

        methods: {
            getSoldItemsBySale(sale_id) {
                let me = this;
                axios.get('/api/sale/'+sale_id+'/solditems').then(function (response) {
                    me.items = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },

            closeSaleDetail() {
                $('#saleDetailModal').modal('hide');
            }
        }
    }
</script>
