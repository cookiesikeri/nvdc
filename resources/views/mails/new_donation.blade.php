<h4>{{ config('app.name') }}</h4>
<p>Sender: {{$user->name}}</p>
<p>E-Mail: {{$user->email}}</p>
<p>Subject: You Have A New Donation</p>
<p>Message:
Hello Admin,<br>
you have a new donation of ${{number_format($user->amount), 2}}
<p>
    &copy; {{ config('app.name') }} {{date('Y')}}
</p>
