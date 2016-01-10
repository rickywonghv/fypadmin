$(document).ready(function(){
	$("#chpwdbtn").click(function(){
					var opwd=$("#opwd").val();
					var npwd=$("#npwd").val();
					var rnpwd=$("#rnpwd").val();
					var aid=$("#hiddenaid").val();
					if(opwd==""){
						$("#shchmsg").html('<div class="alert alert-warning"><strong>Warning!</strong>Please enter your Old Password !</div>');
						return false;
					}else if(npwd==""){
						$("#shchmsg").html('<div class="alert alert-warning"><strong>Warning!</strong>Please enter your New Password !</div>');
						return false;
					}else if(rnpwd==""){
						$("#shchmsg").html('<div class="alert alert-warning"><strong>Warning!</strong>Please re-enter your New Password !</div>');
						return false;
					}else if(npwd!=rnpwd){
						$("#shchmsg").html('<div class="alert alert-warning"><strong>Warning!</strong> Password are not match !</div>');
						return false;
					}else{
						$.ajax({
							type:"POST",
							data:"opwd="+opwd+"&npwd="+npwd+"&rnpwd="+rnpwd+"&aid="+aid,
							url:"asset/adminfunction.php?act=chpwd",
							success:function(response){
								if(response=='true'){
									$("#shchmsg").html('<div class="alert alert-success"><strong>Success!</strong>Your new password is saved!</div>');
									
									$("#chclose").click(function(){
										window.location='index.php';
									})
									return false;
								}else if(response=='wrongpwd'){
									$("#shchmsg").html('<div class="alert alert-warning"><strong>Error!</strong>Your old password is wrong!</div>');
									return false;
								}else if(response=="error"){
									$("#shchmsg").html('<div class="alert alert-danger"><strong>Error!</strong>Your new password is not saved!</div>');
									return false;
								}
							}
						});
						return false;
					}
				});
})
