<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <!-- <div class="card-header">Example Component</div> -->

                    <div class="card-body">
                        <!-- I'm an example component. -->
                        <h2>Laravel 5.7  Vue Js <br> CRUD Tutorial</h2>
                    </div>
                    <!-- <div v-for="post in posts">
                        {{ post.title }}
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
             return{
                posts:{}
             }   
        },
        mounted() {
            console.log('Component mounted.');

            this.getData();
        },

        methods: {
            getData(){
                axios.get('https://jsonplaceholder.typicode.com/posts')
                .then(response => {
                    this.posts = response.data;
                }).then(function (response) {
                    // handle success
                    //this.posts = response.data;
                    console.log(response.data);
                  })
                  .catch(function (error) {
                    // handle error
                    console.log(error);
                  });
            }
        }
    }
</script>