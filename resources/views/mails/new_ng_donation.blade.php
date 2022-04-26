<h4>{{ config('app.name') }}</h4>
<p>Sender: {{$order->name}}</p>
<p>E-Mail: {{$order->email}}</p>
<p>Subject: You Have A New NG Donation </p>
<p>Message:
Hello Admin,<br>
you have a new donation of N{{number_format($order->amount), 2}}
<p>
    &copy; {{ config('app.name') }} {{date('Y')}}
</p>
