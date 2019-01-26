<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                     <div class="card-header">Customer Component</div>

                    <div class="card-body">

                        <form>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Customer Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="name" class="form-control" v-model="name" required autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" v-model="phone" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" v-model="address" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" @click.prevent="customerDataSave()">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item active">Customer List</li>

                        <li v-for="(customer, index) in customers" class="list-group-item">{{ index+1 }} {{ customer.name}} - {{ customer.phone }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
             return{
                customers:[],
                 name:'',
                 phone:'',
                 address:''
             }   
        },
        mounted() {
            console.log('Component mounted.');

            this.getData();
        },

        methods: {

            getData() {

                axios.get('/customer-list').then(response => {
                    this.customers = response.data;
                    console.log(this.customers)
                }).then(function () {

                });
            },

            customerDataSave(){
                console.log('click save work')
                axios.post('/customer-save', {
                            name: this.name,
                            phone: this.phone,
                            address: this.address,
                        })
                        .then(function (response) {
                            console.log(response,'then');
                            location.reload();
                        })
                        .catch(function (error) {
                            console.log(error,'eorro');
                        });
            },

            /*getData(){
                axios.get('/customer-list')
                .then(response => {
                    this.customers = response.data;
                }).then(function (response) {
                    // handle success
                    //this.posts = response.data;
                    console.log(response.data,'customers');
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  });
            }*/
        }
    }
</script>