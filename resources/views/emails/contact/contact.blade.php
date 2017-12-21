@component('mail::message')
# Contact Message

New Message from : {{ $request->name }} --- {{ $request->email }}

@component('mail::panel')
Inquiry type : {{ ucfirst($request->problem) }} <br>

The message is as follow : <br>

{{ $request->comment }} . 

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
