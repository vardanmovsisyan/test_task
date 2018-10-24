<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Verify unverified users</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped" cellpadding="10px" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Verify</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="user in users">
                                <td><strong>{{user.username}}</strong></td>
                                <td>
                                    <input @change="verifyUser(user.id)" value="0" :checked="checked" type="checkbox" name="verified" class="form-control">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                checked:false,
                users:[],
                user:{
                    id:'',
                    username:'',
                    verifiedByAdmin:''
                }
            }
        },
        mounted: function(){
            this.fetchUserList();
        },
        methods: {
            fetchUserList:function(){
                axios.get('api/users')
                    .then((response) => {
                        this.users = response.data;
                    }).catch((error) => {
                    console.log(error);
                });
            },
            verifyUser: function(id) {
                let self=this;
                let params = Object.assign({}, self.user);
                axios.post('api/user/' + id, params)
                    .then(function () {
                        self.fetchUserList();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>

<style>
    /*table, td, th {*/
        /*border: 1px solid #000;*/
        /*text-align: left;*/
    /*}*/

    /*table {*/
        /*margin-top: 30px;*/
        /*margin-left: 30px;*/
        /*border-collapse: collapse;*/
        /*width: 500px;*/
    /*}*/

    /*th, td {*/
        /*padding: 15px;*/
    /*}*/
</style>