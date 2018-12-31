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
                name:''
            }
        },
        methods:{
          addRecord(){
                      axios.post('http://localhost/laravue/public/tasks',{
                      'name':this.name
                       })
                       .then(function(response)
                        {
                        console.log(response);
                        $("#addtask").modal("hide");

                        }
                       )
                       .catch((error) => console.log(error));
                       },
                       reset()
                       {
                           this.task.name = '';
                       }

             }

        }
    </script>
<style type="text/css" scoped></style>