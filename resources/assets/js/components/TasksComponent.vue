<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h2>All Tasks <span class="pull-right"><button type="button" class="btn btn-success btn-sm">Add</button></span></h2></div>
                    <div class="panel-body">
                        <ul class="list-group">
                        <li class="list-group-item" v-for="t in tasks">{{ t.id }} - {{ t.name }}
                        <span class="pull-right"><button type="button" class="btn btn-warning btn-xs">View</button> | <button type="button" class="btn btn-info btn-xs">Edit</button> | <button type="button" class="btn btn-danger btn-xs">Delete</button></span>
                        </li>
                        </ul>
                    </div>
                    <div class="panel-footer text-right"><small>Copyrights &copy; 2018</small></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    export default {
        mounted() {
            console.log('Tasks Component mounted.')
        },
        data()
        {
        return {
        tasks:{}
        }
        },
        methods:{

        },
        created(){
        axios.get('http://localhost/laravue/public/tasks')
        .then((response) => this.tasks=response.data)
        .catch((error) => console.log(error))
        console.log('Tasks Component created.')
        }
    }
</script>
<style type="text/css" scoped>
.p-0{
padding:2px;
}
</style>