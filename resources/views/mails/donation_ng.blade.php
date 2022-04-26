@component('mail::message')

Dear {{ $order['name'] }},
<br>

<p>
    Thank you for your generous donation to the Ready to Vote Abia Project! Donors like you are vital to the continued success of our mission to encourage voters to use their right to vote for the greater good and we are grateful for your support.

    On {{ $order->created_at->format('d/m/Y') }}, you made a contribution of N{{number_format($order->amount), 2}} to NVDC NG project .

</p>
<p>
    Your donation was processed as a credit card transaction and made in support of our mission.

As a tax-exempt organization under Section 501(c)(3) of the Internal Revenue Code (EIN #111-111-1111), every donation makes an impact, and we are so thankful for your support.

No goods or services were exchanged for your contribution, and your gift is tax-deductible to the full extent permitted by law.
</p>
<p>
    Please retain this letter for your tax records.

Thank you again for your dedication to educating voters on their rights for fair elections and on how informed voting can significantly impact their life and health in positive ways. We’re excited to continue partnering with you!
 Your Friends at the Ready to Vote Abia Project.
</p>
<small>
    If you have any questions or comments, please send an email to <span style="color: #16a599"><a href="mailto:info@nvdcng.com"> info@nvdcng.com</a></span> or send us a message on *Twitter*, *Instagram* or *Facebook*.

    To gain more insight about {{ config('app.name') }} and to get firsthand information from us, visit our FAQ page *here*.
</small>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
