<style>
    td,th {
       padding: 10px 30px;
   }
   tr:nth-child(even){
        background-color: #0f0f0f0f;
    }
</style>
<template>
    <div class="">
        <div class="">
            <table id="users">
                <tr class="bg-green-400 text-white">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Message</th>
                    <th>Address</th>
                    <th>Referal</th>
                    <th>Referal Type</th>
                </tr>
                <tr v-for="user in users" :key="user.id">
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.gender}}</td>
                    <td>{{user.message}}</td>
                    <td>{{user.address}}</td>
                    <td>{{user.refer_name}}</td>
                    <td>{{user.referal_type}}</td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user_id'],
        mounted() {
            this.getUsers()
        },
        data:function(){
            return{
                users: {}
            }
        },
        methods:{
            getUsers(){
                axios.get('/sub-admin/get-users/'+this.user_id)
                    .then(response=>{
                        this.users = response.data 
                        console.log(this.users)
                    })
            },
        }
    }
</script>
