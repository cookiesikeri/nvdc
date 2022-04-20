<script src="js/custom.js"></script>

<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
    function showNote(type, msg) {
        new Noty({
            type: ''+type,
            layout: 'bottomRight',
            text: ''+msg
        }).show();
    }
    $(function() {
        $('#cardBtn').click(function() {
            console.log("making payment");
            var amt = $('#amount').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var _auth = $('#_auth').val();
            amt = amt.replace(/,/g, '');
             console.log(amt);
            $(this).attr("disabled", true);
            var handler = PaystackPop.setup({
                key: 'pk_live_ce28323dfd295fd2c055b09a16b0122bca9013fa',
                email: email,
                amount: amt * 100,
                metadata: {
                    custom_fields: [{
                        display_name: "Mobile Number",
                        variable_name: "mobile_number",
                        value: amt
                    }]
                },
                callback: function(response) {
                    console.log(response);
                    var data = {'pRef': response.reference, 'amount':amt, 'name':name,'email':email, 'phone':phone, '_token':_auth};
                    $.ajax({
                        url: "/wallet/card-payment",
                        type: "POST",
                        dataType: "JSON",
                        data: data,
                        success: function(data) {
                            console.log(data);
                            if(data.status == -1) {
                                new Noty({
                                    type: 'warning',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                // showNote('warning', data.msg);
                                return false;
                            }
                            if((1 <= data.status) && (data.status <= 88)) {
                                new Noty({
                                    type: 'warning',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                // showNote('warning', data.msg);
                                return false;
                            }
                            if(data.status == 404) {
                                new Noty({
                                    type: 'warning',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                // showNote('warning', data.msg);
                                return false;
                            }
                            if(data.status == '503') {
                                new Noty({
                                    type: 'warning',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                return false;
                            }
                            if(data.status == 200) {
                                console.log("successful section");
                                new Noty({
                                    type: 'success',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                window.location.href="/paymentsummary";
                                // window.location.href= domain + "/paymentsummary/" + 1;
                            }
                            if(data.status == 100) {
                                console.log("successful section");
                                new Noty({
                                    type: 'success',
                                    layout: 'bottomRight',
                                    text: data.msg
                                }).show();
                                window.location.href="/paymentsummary";
                                // window.location.href= domain + "/paymentsummary/" + 1;
                            }
                        },
                        error: function(error) {
                            console.log(error);
                            // new Noty({
                            //     type: 'error',
                            //     layout: 'bottomRight',
                            //     text: 'Unable to verify payment at this time. Kindly contact customer care for more details.'
                            // }).show();
                            showNote('warning', data.msg);
                            return false;
                        }
                    })
                },
                onClose: function(){
                    $('#cardBtn').attr("disabled", false);
                }
            });
            handler.openIframe();
        });
    });
</script>

