$(document).ready(function(){
	$.ajax({
		type:"GET",
		url:"asset/adminfunction.php?act=shadmin",
		dataType:"json",
		success:function(response){
			json=response;
			var sesaid=$("#sesaid").val();
			for (var i= 0; i < json.length; i++) {
					$(".admindisplay").append('<tr><td>'+json[i]['adminid']+'</td><td>'+json[i]['username']+'</td><td class="hidden-xs">'+json[i]['type']+'</td><td><button type="button" id="editBtn" class="btn btn-info" data-toggle="modal" data-target="#adminEdit" onclick=editsh('+json[i]['adminid']+');><i class="fa fa-pencil"></i><span class="hidden-xs"> Change Type</span></button></td><td><button type="button" class="btn btn-danger" onclick=block('+sesaid+','+json[i]['adminid']+') id="adminDelBtn" >Block</button></td></tr>')
			}

		}
	});

				$("#addAdminBtn").click(function(){
					var user=$("#user").val();
					var pwda=$("#pwd").val();
					var pwdb=$("#pwdb").val();
					var type=$("input[name=type]:checked").val();
					if(pwda.length<8){
						$('#response').html('<div class="alert alert-warning"><strong>Warning!</strong>Password length should more than 8!</div>');
						return false;
					}
					else if(pwda!=pwdb){
						$('#response').html('<div class="alert alert-warning"><strong>Warning!</strong>Password are not match! </div>');
						return false;
					}else if(user==""||pwda==""||pwdb==""||type==""){
						$('#response').html('<div class="alert alert-warning"><strong>Warning!</strong>Should fill in all column!</div>');
						return false;
					}else{
						$.ajax({
							type:'POST',
							data:'user='+user+'&pwd='+pwda+'&type='+type,
							url:'asset/addadmin.php',
							success:function(response){
								if(response=='success'){
									$('#success').html('<div class="alert alert-success"><strong>Success!</strong>Add Successfully.</div>');
									window.location='admin.php';
								}else{
									$('#response').html('<div class="alert alert-warning"><strong>Warning!</strong>This admin exist already! </div>');
									return false;
								}
							}
						});
					return false;
					}
				})


			});

function block(id,aid){
	if(id==aid){
		alert("You can not block yourself");
	}else{
		var r=confirm("Sure to block?");
		if(r==true){
			$.ajax({
				type:"GET",
				url:"asset/adminfunction.php?act=block&aid="+aid,
				dataType:'html',
				success:function(response){
					if(response=="success"){
						alert("Already blocked");
						window.location="admin.php";
					}else{
						alert(response);
						console.log(response);
						window.location="admin.php";
					}
				}
			})
		}
	}

}

function editsh(aid){
	var aid=aid;
	$.ajax({
		url:'asset/adminfunction.php?act=shedit&aid='+aid,
		dataType:'json',
		success:function(res){
			json=res;
			for (var i = 0; i < json.length; i++) {
				$('#editauser').html(json[i]['username']);
				$("#editaid").html(json[i]['adminid']);
				$("#adminstatus").html(json[i]['type']);
				$("#editAdminBtn").attr("onclick","editadmin("+json[i]['adminid']+");");
				if(json[i]['type']=='block'){
					$("#statuslab").prop('class',"label label-danger");
				}else{
					$("#statuslab").prop('class',"label label-default");
				}

			}
		}
	})
}

function editadmin(aid){
	var aid=aid;
		var admintype=$("#admintype").val();
		var r=confirm("Sure to change the type to "+admintype+"?");
		if(r==true){
			$.ajax({
				url:"asset/adminfunction.php",
				type:"POST",
				data:"aid="+aid+"&type="+admintype+"&act=chtype",
				dataType:"html",
				ifModified:true,
				cache:false,
				success:function(response){
					if(response=="success"){
						alert("Type has been save");
						console.log(response);
						return false;
						//window.load("admin.php");
					}else{
						alert("Error");
						alert(respornse);
						console.log(response);
						return false;
						//window.load("admin.php");
					}
				}
			})
			return false;
		}
}
