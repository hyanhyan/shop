<template>
<table class="table table-bordered">
  	<tr>
  	<th>Id</th>
  	<th>Name</th>
  	<th>Price</th>
  	<th>Count</th>
  	<th>Accept</th>
  	<th>Delete</th>
  	</tr>
  	<tr v-for="p in products"> 
  		<td>{{p.id}}</td>
  		<td>{{p.name}}</td>
  		<td>{{p.price}}</td>
  		<td>{{p.count}}</td>
  		<td><button class="btn bnt-success">Accept</button></td>
  		<td><button class="btn bnt-danger" @click="deleteprod(p.id)">Delete</button></td>
  	
  	</tr>
  </table>
</template>

<script>
    export default {
        	data(){
    		return {
    		 products:[]
    	}
    	},
        created:function(){
        this.axios.get("/api/admin/getproducts").then((r)=>{
        	this.products=r.data
        })
        },
        methods:{
        	deleteprod(id){
        		 this.axios.get("/api/admin/deleteprod/"+id).then((r)=>{
        	this.products=r.data
        })
        	},
        	acceptprod(id){
        		 this.axios.get("/api/admin/acceptprod/"+id).then((r)=>{
        	this.products=r.data
        	}
        }
    }
</script>