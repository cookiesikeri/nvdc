<h4>{{ config('app.name') }}</h4>
<p>Sender: {{$data->name}}</p>
<p>E-Mail: {{$data->email}}</p>
<p>Subject: {{$data->subject}}</p>
<p>Message:</p>
{{$data->message}}
<p>
    &copy; {{ config('app.name') }} {{date('Y')}}
</p>
