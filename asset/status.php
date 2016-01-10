<?php
if(isset($_GET['msg'])){
		if($_GET['msg']=='error'){
			echo '<div class="alert alert-danger"><strong>Error!</strong> Wrong Username or Password!</div>';
		}
	}
?>