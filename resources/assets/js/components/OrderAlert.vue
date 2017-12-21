<template>
	<div>
		<alert v-model="ShowAlert" placement="top-right" duration="3000" type="success" width="400px" dismissable>
		  <span class="icon-ok-circled alert-icon-float-left"></span>
		  <strong>Order Status Updated ! </strong>
		  <p>Order ID : {{ order_id }} has been updated.</p>
		</alert>
	</div>
	
</template>

<script>

	import { alert } from 'vue-strap'

	export default{

		components: {
		    alert
		},

		props: ['user_id'],

		data(){
			return {
				ShowAlert : false,
				order_id: ''
			}
		},

		mounted(){
			Echo.channel('order-notification')
		      .listen('OrderNotification', (order) => {
		      	if(this.user_id == order.user_id){
					this.ShowAlert = true,
		      		this.order_id = order.id
		      	}    	
		    });
		}
	}
</script>