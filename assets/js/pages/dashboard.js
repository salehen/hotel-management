$("document").ready(function() {
    $("#room-detail").hide();

    $(".rView").click(function(e) {
        e.preventDefault();
        var resID =parseInt($(this).val());
        $("#room-detail").show();

        $(".acb").click(function () {
            $(".acb").attr("class", "acb");
            $(this).attr("class", "acb table table-primary");
        });



        if (resID) {
            $.ajax({
                type: "post",
                url: $("meta[name='url']").attr("content") + "api/dashboard.php",
                data: {
                    'resID': resID,
                },
                success: function(response) {
                    rtl = "";
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
            rtl += "<th colspan='4'>Room Rent ( "+response['dining'][index]['price']+" X " + response['totalDays'] + " )</th>";
            rtl +="<th >"+response['dining'][index]['resAmount']+"</th>";
            rtl +="</tr>";

            rtl +="<tr class='mofiz'>";
            rtl +="<th colspan='4' class=\"text-danger\">Grand Total</th>";
            rtl +="<th class=\"text-danger\">"+response['gtotal']+"</th>";
            rtl +="</tr>";


            $("#rdetails").append(rtl);
            $("#rno").text("  "+response['dining'][index]['serial']);
        
        }
            });
        }
    });
});
