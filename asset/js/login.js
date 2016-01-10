$(document).ready(function(){
	$("#loginbtn").click(function(){
		var user=$("#username").val();
		var pass=$("#pwd").val();
		if(google.loader.ClientLocation==null){
			if(user.length>0&&pass.length>0){
				$.ajax({
					type:"POST",
					data:"username="+user+"&pwd="+pass+"&countryname=null&latitude=null&longitude=null",
					url:"asset/cklogin.php",
					beforeSend: function() {
              $("#message").html('<img src="asset/img/loading.gif">');
           },
					success:function(html){
						if(html=='true'){
								window.location='index.php';
						}else if(html=="block"){
							$("#message").html('<div class="alert alert-danger"><strong>Error!</strong>Your account has been blocked! </div>');
							return false;
						}else if (html=='auth') {
							window.location='auth.php';
						}
						else{
							$("#message").html('<div class="alert alert-warning"><strong>Error!</strong>Wrong Username or Password</div>');
							return false;
						}
					}
				});
				return false;
			}else{
				$("#message").html('<div class="alert alert-danger"><strong>Error!</strong> Please fill in Username and Password!</div>');
				return false;
			}
		}else{
			if(user.length>0&&pass.length>0){
			var countryname=google.loader.ClientLocation.address.country;
			var latitude=google.loader.ClientLocation.latitude;
			var longitude=google.loader.ClientLocation.longitude;
				$.ajax({
					type:"POST",
					data:"username="+user+"&pwd="+pass+"&countryname="+countryname+"&latitude="+latitude+"&longitude="+longitude,
					url:"asset/cklogin.php",
					success:function(html){
						if(html=='true'){
								window.location='index.php';
						}else if(html=="block"){
							$("#message").html('<div class="alert alert-danger"><strong>Error!</strong>Your account has been blocked! </div>');
							return false;
						}
						else if (html=='auth') {
							window.location='auth.php';
						}
						else{
							$("#message").html('<div class="alert alert-danger"><strong>Error!</strong>Wrong Username or Password</div>');
							return false;
						}
					}
				});
				return false;
		}else{
			$("#message").html('<div class="alert alert-danger"><strong>Error!</strong> Please fill in Username and Password!</div>');
			return false;
		}
		}

	})
})
