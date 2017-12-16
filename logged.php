<?php 
	
	include "admin/connection.php";
	include "customFunctions.php";

	if (isset($_POST['login_btn'])) {
		$request=mysqli_query($db,"select * from users_tbl where user_name='".filter_sql($db,$_POST['user_name_txt'])."' and user_password='".md5(filter_sql($db,$_POST['user_password_txt']))."'");
		$response=mysqli_fetch_assoc($request);



		if (mysqli_num_rows($request) == 0) {
			echo "<script type='text/javascript'>alert('Kullanici Adi veya Parola Hatali!');window.location = 'login.php';</script>";
		}
		else{
            $request_auth=mysqli_query($db,"select * from employees_tbl where emp_id='".$response['emp_id']."'");
            $response_auth=mysqli_fetch_assoc($request_auth);
			$_SESSION['emp_id']=$response['emp_id'];
			$_SESSION['user_name']=$response['user_name'];
			$_SESSION['authority_code']=$response_auth['authority_code'];

            if (strcmp($_SESSION['authority_code'],"MUD") == 0){
                header("location:manager/index.php");
            }
            elseif(strcmp($_SESSION['authority_code'],"VEZ") == 0){
                header("location:treasurer/index.php");
            }
            elseif(strcmp($_SESSION['authority_code'],"ANT") == 0){
                header("location:index.php");
            }
            else{
                echo "<script type='text/javascript'>alert('Kimsin Sen....!');window.location = 'login.php'</script>";
            }
		}
	}


 ?>