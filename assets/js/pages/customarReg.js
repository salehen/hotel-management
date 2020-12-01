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
    
    $("#coid").change(function () {
        let id = $(this).val();
        if(id > 0){
            $.ajax({
                type: "post",
                url: $("meta[name='url']").attr('content')+"api/city.php",
                data: {
                    "id": id
                },
                success:function(response){
                    if (response){
                        rtl = "";
                        $("#cid option").remove();
                        rtl += `<option value="">Select one</option>`;
                        for(var index in response['city']){
                            rtl += `<option value="`+response['city'][index]['id']+`">`+response['city'][index]['name']+`</option>`
                        }
                        $('#cid').append(rtl);
                    }else{
                        $("#cid option").remove();
                        $('#cid').append(`<option value="">No City Found</option>`);
                    }
                }
            })
        } else {
            $("#cid option").remove();
            $('#cid').append(`<option value="">Select County First</option>`);
        }
    })
    
    
    
    
});