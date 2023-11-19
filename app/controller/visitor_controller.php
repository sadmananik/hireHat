<?php ob_start(); 
?>

<?php
	if(!isset($isDispatchedByFrontController)){
		//include_once('../error/php');
		echo "ERROR visitor_controller";
		die;
	}
?>

<?php 

if ($controller=="visitor") {
	include_once(APP_ROOT.'/core/visitor_service.php');
}else{
	//include_once('../error/php');
}

?>


<?php


	switch($view){
		case "registration":
			header('Location: /HireHAT/app/view/visitor/visitor_registration_view.php');
			break;
		case "howItWorks":
			header('Location: /HireHAT/app/view/visitor/visitor_'.$view.'_view.php') ;
			break;
		case "FAQ":
			header('Location: /HireHAT/app/view/visitor/visitor_'.$view.'_view.php') ;
		break;
		case "feedback":
			header('Location: /HireHAT/app/view/visitor/visitor_'.$view.'_view.php') ;
		break;
		case "submitFeedback":
		if ($GLOBALS['phpValidation']=="true") {
			$email="example@mail.com";
			$text=$_POST['text'];
		sendingFeedbackEmail($text, $email);
		echo "<script> 
                   alert('Thanks for Your Valuable Time.');  
                   </script>";
        header('Refresh:0; /HireHAT/app/view/visitor/visitor_index.php') ;
		}
			break;
		case "resetViaEmail":
			header('Location: /HireHAT/app/view/visitor/visitor_'.$view.'_view.php') ;
			break;
		case "submitResetPasswordEmail":
			$getMsg=sendPasswordRestLinkViaEmail($_POST['user']);
			session_start();
			$_SESSION["user"] = $_POST['user'];
			if ($getMsg=="true") {
				echo "<script> 
                   alert('Check Your HireHAT Email Address for Password Reset Link');
                   </script>";
			}else{
				echo "<script> 
                   alert('".$getMsg."');
                   </script>";
			}
			break;
		case "submitCode":
			list($result, $userId, $status)=visitorSubmitCode($_POST['user'], $_POST['code']);
			if ($result=="true") {
			session_start();
			$_SESSION["accID"] = $userId;
			header('Location: /HireHAT/app/view/visitor/visitor_resetPassword_view.php?userId='. $_SESSION['accID'].'') ;
			}else{
				echo "<script> 
                   alert('".$result."');
                   </script>";
			}
		break;
		case "forgetPassword":
			header('Location: /HireHAT/app/view/visitor/visitor_'.$view.'_view.php') ;
			break;

		case "submitResetPassword":
		if (isset($_POST['key'])) {
			$secrectAns=getUserPassword($_POST['userId']);
			if (md5($secrectAns)==$_POST['key']) {
				if (resetPassword($_POST['userId'], $_POST['reNewPassword'])) {

                   echo "<SCRIPT type='text/javascript'> 
                        alert('Password Successfully Reset');
                        window.location.assign(\"http://localhost/HireHAT\");
                        </SCRIPT>";
			}


			}else{
                   echo "<SCRIPT type='text/javascript'> 
                        alert('Something Went Wrong. Try Again!');
                        window.location.assign(\"http://localhost/HireHAT\");
                        </SCRIPT>";
			}	

		}else{
			if ($GLOBALS['phpValidation']=="true") {
			$userId=$_SESSION["accID"];
			if (resetPassword($userId, $_POST['reNewPassword'])) {
                   echo "<SCRIPT type='text/javascript'> 
                        alert('Password Successfully Reset');
                        window.location.assign(\"http://localhost/HireHAT\");
                        </SCRIPT>";
			}
			}
		} 
			break;

		case "home":
			header('Location: /HireHAT/index.php');
			break;

			case "login":
			if (isset($_GET['userId']) && isset($_GET['key'])) {
				list($result, $userId, $status, $password)  = userAuthenticationUsingCookie($_GET['userId'],$_GET['key']);
			}else{
				list($result, $userId, $status, $password)  = userAuthentication(trim($_POST['user']," "),trim($_POST['password']," "));
			}

			if ($result=="FOUND & VALID") {
				if ($status=="Admin") {
					session_start();
					$_SESSION["userId"] = $userId;
					$_SESSION["status"] = $status;
					$_SESSION['start'] = time();
					// taking now logged in time
					$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
					
					if (isset($_POST['remember'])) {
						setcookie("userId", $userId, time()+(86400 *7), "/");
						setcookie("status", $status, time()+(86400 *7), "/");
						setcookie("key", md5($password), time()+(86400 *7), "/");
					}
					
					include_once(APP_ROOT.'/core/admin_service.php');
					setLoginRecord($_SESSION["userId"]);
					adminProfileDetails($_SESSION["userId"]);
					header('Location: /HireHAT/app/view/admin/admin_home_view.php');

				}elseif ($status=="Chief") {
					session_start();
					$_SESSION["userId"] = $userId;
					$_SESSION["status"] = $status;
					$_SESSION['start'] = time();
					// taking now logged in time
					$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;

					if (isset($_POST['remember'])) {
						setcookie("userId", $userId, time()+(86400 *7), "/");
						setcookie("status", $status, time()+(86400 *7), "/");
						setcookie("key", md5($password), time()+(86400 *7), "/");
					}
					
					include_once(APP_ROOT.'/core/chief_service.php');
					setLoginRecord($_SESSION["userId"]);
					chiefProfileDetails($_SESSION["userId"]);
					header('Location: /HireHAT/app/view/chief/chief_home_view.php');

				}elseif ($status=="Staff") {
					session_start();
					$_SESSION["userId"] = $userId;
					$_SESSION["status"] = $status;
					$_SESSION['start'] = time();
					// taking now logged in time
					$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;

					if (isset($_POST['remember'])) {
						setcookie("userId", $userId, time()+(86400 *7), "/");
						setcookie("status", $status, time()+(86400 *7), "/");
						setcookie("key", md5($password), time()+(86400 *7), "/");
					}
					
					include_once(APP_ROOT.'/core/staff_service.php');
					setLoginRecord($_SESSION["userId"]);
					staffProfileDetails($_SESSION["userId"]);
					header('Location: /HireHAT/app/view/staff/staff_home_view.php');
				}
			}
			else
			{
				echo "<script type='text/javascript'>alert(\"$result \");</script>";
				?>

				<form method="POST" id="theForm" action="../../view/visitor/visitor_index.php">
					<input type="hidden" name="username" value="<?php echo $_POST["user"];?>" >
					<input type="hidden" name="password" value="<?php echo $_POST["password"];?>" >
				</form>

				<script type="text/javascript">
					document.getElementById("theForm").submit();
				</script>

				<?php
 
			
			break;
			}

			case "createAccount":
			if (isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['day']) && isset($_POST['month']) && isset($_POST['year']) && isset($_POST['statusSelected']) ) {
				$fullname=trim($_POST['fullname']," ");
				$username=trim($_POST['username']," ");
				$email=trim($_POST['email']," ");
				$password=trim($_POST['password']," ");
				$dob=trim($_POST['year']," ") ."-". trim($_POST['month']," ") ."-". trim($_POST['day']," ");
				$status=trim($_POST['statusSelected']," ");

				if(userCreateAccoint($fullname, $username, $email, $password, $dob, $status))
				{
					    echo "<SCRIPT type='text/javascript'> 
                        alert('Account Successfully Created');
                        window.location.assign(\"http://localhost/HireHAT\");
                        </SCRIPT>";
				}
				else
				{
					//js error msg
				}
			}
				
				break;
			
		default:
			include_once(APP_ROOT."/app/error.php");
	}	
?>


<?php ob_end_flush(); ?>