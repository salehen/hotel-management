$("document").ready(function() {

    $(".rEdit").click(function(e) {
        e.preventDefault();
        var resID =parseInt($(this).val());

        $(".acb").click(function () {
            $(".acb").attr("class", "acb");
            $(this).attr("class", "acb table table-success title_color");
        });

        if (resID) {
            $.ajax({
                type: "post",
                url: $("meta[name='url']").attr("content") + "api/reservation_edit.php",
                data: {
                    'resID': resID,
                },
                dataType:'json',
                success: function(response) {
                    // var myObj = JSON.parse(response);
                    //console.log(response.res[0]['l_name']);
                    /*rtl = "";
                    $(".mofiz").remove();
                    for(var index in response['dining']){

                        rtl +="<tr class='mofiz'>";
                        rtl +="<td>"+response['dining'][index]['name']+"</td>";
                        rtl +="<td>"+response['dining'][index]['total']+"</td>";
                        rtl +="<td>"+response['dining'][index]['totalP']+"</td>";
                        rtl +="<td>"+response['dining'][index]['diamount']+"</td>";
                        rtl +="<td>"+response['dining'][index]['subtotal']+"</td>";
                        rtl +="</tr>";

                    }
                    rtl +="<tr class='mofiz'>";
                    rtl +="<th colspan='4'>Total Dinnig Amount </th>";
                    rtl +="<th >"+response['total']+"</th>";
                    rtl +="</tr>";

                    rtl +="<tr class='mofiz'>";
                    rtl +="<th colspan='4'>Room Rent </th>";
                    rtl +="<th >"+response['dining'][index]['resAmount']+"</th>";
                    rtl +="</tr>";

                    rtl +="<tr class='mofiz'>";
                    rtl +="<th colspan='4' class=\"text-danger\">Grand Total</th>";
                    rtl +="<th class=\"text-danger\">"+response['gtotal']+"</th>";
                    rtl +="</tr>";


                    $("#rdetails").append(rtl);*/
                    var cnme = (response.res[0]['f_name']+"  "+response.res[0]['l_name']).toUpperCase();
                    $("#rno").text(response.res[0]['serial']);
                    $("#cn").text(cnme);
                    $("#co").text(response.res[0]['contact']);
                    $("#ad").text(response.res[0]['address']);
                    $("#adult").val(response.res[0]['adult']);
                    $("#child").val(response.res[0]['child']);
                    $("#ciDate").val(response.res[0]['start_date']);
                    $("#coDate").val(response.res[0]['end_date']);
                    $("#regID").val(response.res[0]['id']);
                    $("#price").val(response.res[0]['price']);
                }
            });
        }
    });
});
