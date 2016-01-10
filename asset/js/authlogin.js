$(document).ready(function() {
   // Stuff to do as soon as the DOM is ready

   $("#authsub").click(function(){
     var code=$("#code").val();
     $.ajax({
       url:"asset/auth/login.php",
       type:"POST",
       data:"code="+code,
       dataType:'json',
       success:function(response){
         if(response.stat==="success"){
           log(response.aid);
         }else if(response.stat==='fail'){
           $("#message").html('<div class="alert alert-warning"><strong></strong>Your 6 digits code is wrong! Please enter again! </div>');
           return false;
         }else{
           $("#message").html('<div class="alert alert-danger"><strong>Error!</strong> '+response+' </div>');
           return false;
         }
       }
     })
   })
});

function log(aid){
    if(google.loader.ClientLocation!=null){
      var countryname=google.loader.ClientLocation.address.country;
      var latitude=google.loader.ClientLocation.latitude;
      var longitude=google.loader.ClientLocation.longitude;
      $.ajax({
        url:"asset/auth/log.php?act=adminlog",
        type:"POST",
        data:"contry="+countryname+"&lat="+latitude+"&long="+longitude+"&aid="+aid,
        success:function(response){
          if(response=="success"){
            window.location="index.php"
          }else{
            window.location="index.php"
          }
        }
      })
    }else{
      $.ajax({
        url:"asset/auth/log.php?act=adminlog",
        type:"POST",
        data:"aid="+aid,
        success:function(response){
          if(response=="success"){
            window.location="index.php"
          }else{
            window.location="index.php"
          }
        }
      })
    }
}
