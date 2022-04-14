<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Muli:400,300" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
</head>
<body>
    <div class="image-container set-full-height">
        <br><br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <address>
                                <strong>{{ config('app.name') }}</strong>
                                <br>
                                    Email: support@anvdcng.com
                                <br>
                                <abbr title="Phone">Tel:</abbr> 0700-6258244
                            </address>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <p>
                                <em id="receipt_date">Date: {{ date('d/m/Y') }}</em>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <h4 style="text-align:center;">Feedback Received</h4>
                        <div>
                            <p style="text-align:center;">
                                Your Feedback has been received {{$data->name}}. We will post it on our website as soon as it has been approved by the Admin.<br> thank you. Thanks once again for your time {{$data->name}}.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container text-center">
                {{ config('app.name') }} &copy; {{ date('Y') }}
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
</html>
