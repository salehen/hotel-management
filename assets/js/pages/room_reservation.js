$(document).ready(function(){
  $("#pay_det").hide();
  $("#pay_id").change(function(){
    var payID = $("#pay_id").val();
    if (payID) {
      $("#pay_det").show();
    }else
    {
      $("#pay_det").hide();
    }
  });
});



  function payMethod() {
    $('#exampleModalLongTitle').html('');
      $('.modal-body').html('');

    var payID = $("#pay_id").val();

    if (payID) {
      $("#payModal").modal();
    }
    // console.log(payID);
    if(payID == 1 ){
      $('#exampleModalLongTitle').html('Complete Your Payment With Bkash.');
      $('.modal-body').html(`<img src="assets/image/bkash-payment.jpg" alt="bkash-payment" width="450">`);
      $('#paySubmit').attr('value', 1);
    }
    else if(payID == 2 ){
      $('#exampleModalLongTitle').html('Complete Your Payment With MasterCard.');
      $('.modal-body').html(`<img src="assets/image/card.jpg" alt="MasterCard-payment" width="450">`);
      $('#paySubmit').attr('value', 2);
    }
    else if(payID == 3 ){
      $('#exampleModalLongTitle').html('Complete Your Payment With PayPal.');
      $('.modal-body').html(`<img src="assets/image/paypal.jpg" alt="PayPal-payment" width="450">`);
      $('#paySubmit').attr('value', 3);
    }
  }

  function paySubmit(id){
    // console.log(id);
    if(id == 1){
      let r = Math.random().toString(36).substring(2);
      let tid = 'bKash-'+r;
      $('#pay_det').val(tid);
    }
    else if(id == 2){
      let r = Math.random().toString(36).substring(2);
      let tid = 'master-'+r;
      $('#pay_det').val(tid);
    }
    else if(id == 3){
      let r = Math.random().toString(36).substring(2);
      let tid = 'paypal-'+r;
      $('#pay_det').val(tid);
    }
    $('#payModal').modal('hide')
  }

  function openModal() {
    document.getElementById("myModal").style.display = "block";
  }
  
  function closeModal() {
    document.getElementById("myModal").style.display = "none";
  }
  
  var slideIndex = 1;
  showSlides(slideIndex);
  
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  
  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += "active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }

  function callAjax(ids){
      var rtotal= parseInt($("#total").text());
      var tnight= parseInt($("#tnight").text());
      var rprice= parseInt($("#rprice").text());
      $("#mofiz").val(ids);
    if(ids != ""){
        //alert(ids);
        $.ajax({
          type: 'post',
          url: $("meta[name='url']").attr("content")+'api/total-api.php',
          data: {
            'ids': ids,
            'rtotal' : rtotal,
            'tnight' : tnight,
            'rprice' : rprice,
          },
          success:function(response){
            $("#total").text(response);
          }  
        });
    }
  }

