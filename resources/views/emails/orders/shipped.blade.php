@component('mail::message')

@component('mail::panel')
# Order Shipped
@endcomponent


Your Order has been shipped Successfully. <br>

To keep track of your Order please save this Code : {{$order->hash}}

@component('mail::table')
| Order ID      | Total Price   | Delivered     | Last Status
| ------------- |:-------------:| :-----------: | :-----------:
|{{$order->id}} | ${{$order->total}}| {{$order->delivered ? 'Delivered' :'On the Process' }} |     {{$order->status }} %

@endcomponent


@component('mail::button', ['url' => $url, 'color' => 'green'])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

