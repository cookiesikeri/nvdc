@component('mail::message')
Hello <b>{{ $data['name'] }}</b>! <br>

<p>
Thank you for registering as our Partner, Our Admin would reach out to ypou soon, <br>
Thanks once again.

</p>
<small>
    If you have any questions or comments, please send an email to <span style="color: #11c054"><a href="mailto:info@nvdcng.com"> info@nvdcng.com</a></span> or send us a message on *Twitter*, *Instagram* or *Facebook*.

    To gain more insight about {{ config('app.name') }} and to get firsthand information from us, visit our FAQ page *here*.
</small>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
