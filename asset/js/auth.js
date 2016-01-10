$(document).ready(function() {
  $(document).on('click','#startauth',function(){
    $("#auth").modal("hide");
    $("#authreg").modal({backdrop: 'static',keyboard: false,show:true});

    $.ajax({
      url:"asset/auth/reg.php",
      dataType:'json',
      success:function(response){
        //console.log(response);
        $("#regqrimg").attr('src',response.qrurl);
        $("#regsecret").html(response.secret);
      }

    })
  })
  $(document).on('click','#authregbtn',function(){
    var regsecret=$("#regsecret").text();
      $.ajax({
      url:"asset/adminfunction.php?act=twoauthreg",
      type:"POST",
      data:"secret="+regsecret,
      success:function(response){
        if(response=='success'){
          $(".twoauthmsg").html('<div class="alert alert-success"><strong>Success!</strong></div>');
        }else{
          $(".twoauthmsg").html(response);
        }
      }
    })
  })
});

function distwofa(aid){
  var a=confirm("Sure to disable 2FA");
	if(a==true){
    $.ajax({
      url:"asset/adminfunction.php?act=distwoauthreg",
      type:"POST",
      success:function(response){
        if(response=='success'){
          alert("Disabled");
          window.location='index.php';
        }else{
          alert(response);

        }
      }
    })
  }
}
