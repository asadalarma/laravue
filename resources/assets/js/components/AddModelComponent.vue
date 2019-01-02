<template>
    <!-- Modal -->
    <div id="addtask" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add New Record!</h4>
          </div>
          <div class="modal-body">
                <ul v-if="error.length > 0" class="list-unstyled">
                <li v-for="err in error" class="alert alert-danger">{{err}}</li>
                </ul>

                <div class="form-group">
                  <label for="name">Name</label>
                  <textarea class="form-control border-primary" placeholder="Name" name="name" id="name" v-model="name"></textarea>
                </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" v-on:click="addRecord">Save</button>
          </div>
        </div>

      </div>
    </div>
</template>
<script type="text/javascript">
    export default {
        mounted() {
            console.log('Add Model Component mounted.')
        },
        data(){
            return {
                name:'',
                error:[]
            }
        },
        methods:{
          addRecord(){
                      axios.post('http://localhost/laravue/public/tasks',{
                      'name':this.name
                       })
                       .then((response) => this.$emit('recordadded',response))
                       .catch((error) => {
                       this.error=error.response.data.errors.name;
                       console.log(this.error);
                       });
                       this.reset();
                       },
                       reset()
                       {
                           this.name = '';
                       }

             }

        }
    </script>
<style type="text/css" scoped></style>