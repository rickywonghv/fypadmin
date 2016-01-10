$(document).ready(function() {
   // Stuff to do as soon as the DOM is ready
   info();
   $("#refreshdisk").click(function(){
     info();
   })
});

function info(){
  $.ajax({
    url:"asset/adminfunction.php?act=serverinfo",
    dataType:'json',
    success:function(response){
      var total=response.total;
      var free=response.free;
      var used=response.used;
      var perfree=(response.free/response.total)*100;
      var perused=(response.used/response.total)*100;
      if(perused>=85){
        $("#shdisk").attr("class","panel panel-danger");
        $("#diskinfo").attr("class","progress-bar progress-bar-danger");
        $("#diskicon").addClass("fa fa-exclamation-triangle");
      }
      if(perused>=75){
        $("#shdisk").attr("class","panel panel-warning");
        $("#diskinfo").attr("class","progress-bar progress-bar-warning");
        $("#diskicon").addClass("fa fa-exclamation-triangle");
      }
      $("#diskinfo").attr("aria-valuenow",perused);
      $("#diskinfo").attr("style","width:"+perused+"%;");
      $("#diskinfo").html(Math.round(perused)+"%");
      $("#shdisktotal").html(Math.round(total)+"MB");
      $("#shdiskused").html(Math.round(used)+"MB");
      $("#shdiskfree").html(Math.round(free)+"MB");
      $("#serverip").html(response.servip);
    }
  })
}
