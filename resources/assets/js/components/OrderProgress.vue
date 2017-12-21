<template>
	<div>
		<div class="row">
	        <div class="col-md-4 col-lg-5"><label>Delivered :</label></div>
	        <div class="col-md-8 col-lg-7">{{ statusNew == 1 ? "Yes" : "Waiting"  }}</div>
	    </div>

	    <br>

	    <div class="row">
	        <div class="col-md-0 col-lg-5"><label>Status :</label></div>
	        <div  class="col-md-5 col-lg-7 col-sm-10 ">
	            <div class="progress">
					<progressbar :now="progress" type="success" striped animated></progressbar>
				</div>
	        </div>
	    </div>
	</div>
	
</template>

<script>

	import { progressbar } from 'vue-strap'

	export default{

		components: {
		    progressbar
		},

		props: ['initial', 'order_id', 'status'],

		data(){
			return {
				statusNew : this.status,
				progress : this.initial
			}
		},

		mounted(){
			Echo.private('order-notification.' + this.order_id)
		      .listen('OrderNotification', (order) => {
		      	this.statusNew = order.delivered
		        this.progress = order.status_percent
		    });
		}
	}
</script>