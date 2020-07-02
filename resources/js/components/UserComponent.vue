<template>
	<div>
  <h1>Users</h1>
  <table class="table table-bordered">
  	<tr>
  	<th>Id</th>
  	<th>Name</th>
  	<th>Surname</th>
  	<th>Age</th>
  	<th>Email</th>
  	<th>Block user</th>
  	</tr>
  	<tr v-for="u in users"> 
  		<td>{{u.id}}</td>
  		<td>{{u.name}}</td>
  		<td>{{u.surname}}</td>
  		<td>{{u.age}}</td>
  		<td>{{u.email}}</td>
  		<td>
  			<input type="text" name="" class="form-control">
  			<button class="btn btn-danger" @click="blockuser($event,u.id)">Block</button>
  		</td>
  	</tr>
  </table>
 </div>
</template>

<script>
    export default {
    	data(){
    		return {
    		 users:[]
    	}
    	},
        created:function(){
        this.axios.get("/api/admin/getusers").then((r)=>{
        	this.users=r.data
        })
        },
        methods: {
        	blockuser(e,id) {
        		let bloxktime =e.target.previousElementSibling.value
        		this.axios.post("/api/admin/blockuser",{id:id,time:bloxktime}).then((r)=>{
                 console.log(r)
        			
        		})
        	}
        }
    }
</script>
