<template>
    <div class="container">
        <div class="row">
        <div class="alert alert-success" v-if="successmessage.length > 0">
                          <strong>Success!</strong> {{ successmessage }}
                        </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h2>All Tasks <span class="pull-right"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addtask">Add</button></span></h2></div>
                    <div class="panel-body">
                        <ul class="list-group">
                        <li class="list-group-item" v-for="t in tasks.data">{{ t.id }} - {{ t.name }}
                        <span class="pull-right"><button type="button" class="btn btn-warning btn-xs">View</button> | <button type="button" class="btn btn-info btn-xs">Edit</button> | <button type="button" class="btn btn-danger btn-xs">Delete</button></span>
                        </li>
                        </ul>
                        <pagination :data="tasks" @pagination-change-page="getResults"></pagination>
                    </div>
                    <div class="panel-footer text-right"><small>Copyrights &copy; 2018</small></div>
                </div>
            </div>
        </div>

        <div id="modal">
        <addtaskmodel v-on:recordadded="refreshrecord"></addtaskmodel>
        </div>
    </div>
</template>

<script type="text/javascript">
Vue.component('addtaskmodel', require('./AddModelComponent.vue'));
    export default {
        mounted() {
            console.log('Tasks Component mounted.')
        },
        data()
        {
        return {
        tasks:{},
        successmessage:'',
        }
        },
        methods:{
            // Our method to GET results from a Laravel endpoint
                    getResults(page = 1) {
                        axios.get('http://localhost/laravue/public/tasks?page=' + page)
                            .then((response) => this.tasks=response.data)
                            .catch((error) => console.log(error));
                          },
                          refreshrecord(response)
                          {
                          this.tasks = response.data;
                          $("#addtask").modal("hide");
                          this.successmessage="Task Successfully Added";
                          }
        },
        created(){
        this.getResults();
        console.log('Tasks Component created.')
        }
    }
</script>
<style type="text/css" scoped>
</style>