$(document).ready(function () {
    $("input[name='email']").keyup(function () {
        var em = $(this).val();
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
        if (validateEmail(em)){
            $.ajax({
                type: "post",
                url: $("meta[name='url']").attr('content')+"api/CustomarReg.php",
                data: {
                    "email": em
                },
                success:function(res){
                    // console.log(res);
                    if (res == 1){
                        $("#val-email").html("<h5>This Email NOT Available.</h5>");
                        $(".em").css({
                            'color': 'red'
                        })
                    }else {
                        $("#val-email").html("<h5>Available.</h5>");
                        $(".em").css({
                            'color': 'green'
                        })
                    }
                }
            })
        }else {
            $("#val-email").text("");
        }

        //alert(em);
    });
});