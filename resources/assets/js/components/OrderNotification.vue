<template>
 
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bell-o"></i>
          <span class="label label-warning" >0</span>
        </a>

        <ul class="dropdown-menu">
            <li>

                <ul class="menu">

                  <li>
                    <a href="">
                        <div >
                            <i class="fa fa-users text-aqua"></i> Something
                            <span class="pull-right" style="font-size: 9px; margin: 7px">
                                <strong><timeago :since="new Date()" :auto-update="60"></timeago></strong>
                            </span>
                        </div>
                      
                        
                    </a>
                  </li>

                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> There is no new Notifications
                    </a>
                  </li>

                </ul>
            </li>
          
          <li class="footer"><a href="#">View all</a></li>
        </ul>

    </li>

</template>

<script>
   import VueTimeago from 'vue-timeago'

    Vue.use(VueTimeago, {
      name: 'timeago', // component name, `timeago` by default
      locale: 'en-US',
      locales: {
        'en-US': require('vue-timeago/locales/en-US.json')
      }
    })

    export default {
        props:[],

        data(){
            return {
                
            }
        },

        methods: {
            
        },

        mounted(){
            console.log('Component mounted.');
            
        }

    }

    /*
        mounted(){
            console.log('notifications mounted');
            Echo.channel('order-notification')
            .listen('OrderNotification', (e) => {
               
                    this.notifications.unshift({
                        description : 'Order ID ' + order.id + ' updated',
                        url: '/orders/' + order.id,
                        time : new Date()
                    })
                    
                
            });
    
        }*/

</script>
