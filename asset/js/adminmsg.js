$(document).ready(function(){
	$.ajax({
		type:"GET",
		url:"asset/amsg.php?act=amsgtable",
		dataType:"json",
		success:function(response){
			json=response;
						if(json==""){
							$("#amsgbody").html('<tr><td colspan=7><div class="alert alert-warning">No Message! </div></td></tr>');
						}else{
							var NumOfJData = json.length;
							for(var i = 0; i < NumOfJData; i++) {
								if(json[i]["reada"]==1){
								$("#amsgbody").append("<tr><td><b>"+json[i]["msgid"]+"</b></td><td><b>"+json[i]["fromadmin"]+"</b></td><td><b>"+json[i]["toadmin"]+"</b></td><td><b>"+json[i]["date"]+"</b></td><td><b>"+json[i]["time"]+"</b></td><td><button class='btn btn-info' data-toggle='modal' data-target='#msgmodal' onclick='msgdetail("+json[i]["msgid"]+")'>Detail</button></td><td><button class='btn btn-danger' onclick='msgdel("+json[i]["msgid"]+")'>Delete</button></td></tr>");
							}else{
								$("#amsgbody").append("<tr><td>"+json[i]["msgid"]+"</td><td>"+json[i]["fromadmin"]+"</td><td>"+json[i]["toadmin"]+"</td><td>"+json[i]["date"]+"</td><td>"+json[i]["time"]+"</td><td><button class='btn btn-info' data-toggle='modal' data-target='#msgmodal' onclick='msgdetail("+json[i]["msgid"]+")'>Detail</button></td><td><button class='btn btn-danger' onclick='msgdel("+json[i]["msgid"]+")'>Delete</button></td></tr>");
							}
							}

						}
		}
	})
	$("#msgsendmodal").click(function(){
		$.ajax({
			url:"asset/amsg.php?act=shadmin",
			type:"GET",
			dataType:"json",
			success:function(response){
				json=response;
				var NumOfJData = json.length;
							for(var i = 0; i < NumOfJData; i++) {
								$("#toadmin").append('<option value='+json[i]["username"]+'>'+json[i]["username"]+'</option>');
							}
			}
		})
	})

	$("#sendBtn").click(function(){
		var fromadmin=$("#hiddenuser").val();
		var toadmin=$("#toadmin").val();
		var msg=$("#msgtext").val();
		if(msg==""){
			$("#callbackmsg").html('<div class="alert alert-danger"><strong>Error!</strong>Please enter before send! </div>');
			return false;
		}else{
			$.ajax({
				type:"POST",
				url:"asset/amsg.php",
				data:"fromadmin="+fromadmin+"&toadmin="+toadmin+"&msg="+msg+"&act=sendmsg",
				success:function(response){
					if(response=="success"){
						$("#callbackmsg").html('<div class="alert alert-success"><strong>Success!</strong>Your Message sent! </div>');

						return false;
					}else if(response=="error"){
						$("#callbackmsg").html('<div class="alert alert-danger"><strong>Error!</strong></div>');
						return false;
					}
				}
			})
			return false;
		}
	})
})

function msgdetail(id){

	$.ajax({
		type:"GET",
		url:"asset/amsg.php?act=detail&id="+id,
		dataType:"json",
		success:function(response){
			json=response;
			var NumOfJData = json.length;
							for(var i = 0; i < NumOfJData; i++) {

								$("#fadmin").html(json[i]["fromadmin"]);
								$("#msg").html(json[i]["msg"]);
								$("#date").html(json[i]["date"]);
								$("#time").html(json[i]["time"]);
								$("#ip").html(json[i]["ip"]);
								$("#adminclosemsg").click(function(){
									window.location="adminmessage.php";
								})
							}
		}
	})
}

function msgdel(id){
	var a=confirm("Are you sure to delete the message that you selected!");
	if(a==true){
		$.ajax({
			type:"POST",
			url:"asset/amsg.php",
			data:"act=del&msgid="+id,
			success:function(response){
				if(response=="success"){
					alert("Delete successful");
					window.location="adminmessage.php";
				}else{
					alert("Error");
					window.location="adminmessage.php";
				}
			}
		})
	}
}
