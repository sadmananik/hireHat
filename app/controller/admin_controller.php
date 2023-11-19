<?php ob_start(); ?>

<!-- AJax controller-->
<?php 
if (isset($_GET['AjaxView'])) {
	$isDispatchedByFrontController=true;
	define("APP_ROOT", "$_SERVER[DOCUMENT_ROOT]/HireHat");
	include_once(APP_ROOT.'/core/admin_service.php'); 

	$view=$_GET['AjaxView'];
	switch($view){
		case "loginRec":
		 $user = $_GET['user'];
         adminLoginRecord($user);
			break;
		case "manageAcc":
		 $user = $_GET['user'];
         adminManageAccount($user);
			break;

		case "getNonValidatedAcc":
		 $user = $_GET['user'];
		 $type = $_GET['type'];
         getNonValidatedAcc($user, $type);
			break;	
		case "validate":
		 $user = $_GET['user'];
		 $status = "valid";
		 $type = $_GET['accountType'];
         $result=validateAccount($user, $status, $type);
         if ($result) {
         	header('Location: /HireHAT/app/view/admin/admin_manageAccount_view.php');
         }
			break;
		case "banUser":
		 $user = $_GET['user'];
		 $status = "INVALID";
		 $type = $_GET['accountType'];
         $result=invalidateAccount($user, $status, $type);
         if ($result) {
         	header('Location: /HireHAT/app/view/admin/admin_manageAccount_view.php');
         }
			break;	
			case "searchResult":
		 $user = $_GET['user'];
         $obj=$_GET['obj'];
         if($obj=="jobs")
         {
             
           adminJobSearchResult($user);
         }else{
                  adminSearchResult($user);
              }
			break;	
			case "searchDetails":
		 $user = $_GET['user'];
	     adminSearchDetails($user);
			break;
			case "searchJobDetails":
		    $user = $_GET['user'];
		    adminJobSearchDetails($user);
			break;	
		default:
			include_once(APP_ROOT."/app/error.php");
	}
}

//PHP controller
else{
if(!isset($isDispatchedByFrontController)){
		//include_once('../error/php');
		echo "ERROR admin_controller";
		die;
	}
?>

<?php 

if ($controller=="admin") {
	include_once(APP_ROOT.'/core/admin_service.php'); 
}
else{
	//include_once('../error/php');
}

?>


<?php

	switch($view)
	{
		case "logout":
					//header('Location:'.APP_ROOT);
				header('Location: /HireHAT/app/view/admin/admin_logout_view.php') ;
				break;
		case "profile":
				header('Location: /HireHAT/app/view/admin/admin_profile_view.php') ;
					break;
		case "loginRecord":
					header('Location: /HireHAT/app/view/admin/admin_loginRecord_view.php') ;
					break;
		case "submitCreateAdmin":
			if ($GLOBALS['phpValidation'] =="true") {
				$fullname=trim($_POST['fullname']," ");
				$username=trim($_POST['username']," ");
				$email=trim($_POST['email']," ");
				$dob=$_POST['dob'];
				$gender=$_POST['gender'];
				$phonenumber=$_POST['phonenumber'];
				$address=$_POST['address'];

				if(CreateAdminAccount($fullname, $username, $email, $dob, $gender, $phonenumber, $address))
				{
					    echo "<SCRIPT type='text/javascript'> 
                        alert('Account Successfully Created');
                        </SCRIPT>";
                        header('Refresh:0; /HireHAT/app/view/admin/admin_home_view.php?admin_home') ;
				}
			}
			break;
		case "sendMessages":
		if ($GLOBALS['phpValidation'] =="true") {
			$fromID=$_SESSION['userId'];
			$toID=$_POST['user'];
			$title=$_POST['title'];
			$messages=$_POST['massages'];
			$result=adminfSendMessages($fromID, $toID, $title, $messages);
			if ($result=="false") {
				echo "<script> 
                   alert('This User Does not exist!');
                   </script>";
			}else{
				header('Location: /HireHAT/app/view/admin/admin_messages_view.php?admin_messages') ;
			}
		}
		break;
		case "editFAQ":
					header('Location: /HireHAT/app/view/admin/admin_editFAQ_view.php') ;
		break;	
		case "submitFAQ":
		if ($FAQvalidaion) {
			$myfile = fopen("../../../lib/xml/faq.xml", "w+");
			$myXMLData =
				"<?xml version='1.0' encoding='UTF-8'?>
				<Guide>";
			fwrite($myfile, $myXMLData);
			fclose($myfile);
			
			$myfile = fopen("../../../lib/xml/faq.xml", "a");
			$i='0';
    		$j='1';
			for ($x=0; $x < 5; $x++) 
			{ 
				
				$myXMLData =
					"<faq>
	          			<q>".$_POST[$i]."</q>
	          			<a>".$_POST[$j]."</a>
					</faq>";
				fwrite($myfile, $myXMLData);
				 $i=$i.'0';
      			 $j=$j.'1';
			}			

			$myXMLData =
				"</Guide>";
			fwrite($myfile, $myXMLData);
			fclose($myfile);
			echo "<script> 
                   alert('FAQ successfully updated');  
                   </script>";
			header('Location: /HireHAT/app/view/admin/admin_editFAQ_view.php') ;
		}
		else
			echo "<script> 
                   alert('Field can not be empty');  
                   </script>";
			
		break;			
		case "messages":
		$showAllMessages=showAllMessages($_SESSION['userId']);
		$_SESSION['showAllMessages']=$showAllMessages;
		header('Location: /HireHAT/app/view/admin/admin_'.$view.'_view.php') ;
			break;
			
		case "security":
		header('Location: /HireHAT/app/view/admin/admin_'.$view.'_view.php') ;
		break;

		case "secendarySecurity":
		header('Location: /HireHAT/app/view/admin/admin_'.$view.'_view.php') ;
		break;
		case "submitCode":
		if ($GLOBALS['phpValidation'] =="true") {
			if (adminUpdateCode($_SESSION['userId'] , $_POST['reCode'])) {
			echo "<script> 
                   alert('Secendary Code Set Successfully');  
                   </script>";
        header('Location: /HireHAT/app/view/admin/admin_secendarySecurity_view.php?admin_security') ;
		}
		}
			break;
		case "saveEdit":
				if ($GLOBALS['phpValidation'] == "true") {

					 $fullname=trim($_POST['fullname']," ");
					 $email=trim($_POST['email']," ");
					 $address=trim($_POST['address']," ");
					 $phonenumber=trim($_POST['phonenumber']," ");

					if (!isset($_SESSION['profilePicture'])) {  
					 	$picture="";
					 }else{
					 	$picture=$_SESSION['profilePicture'];
					 }
					 if (!isset($_POST['gender'])) {
					 	$gender="";
					 }else{
					 	$gender=$_POST['gender'];
					 }

					 if(adminUpdateProfile($_SESSION['userId'], $fullname, $gender, $email, $address, $phonenumber, $picture ))
						{
							    echo "<SCRIPT type='text/javascript'> 
		                        alert('Account Successfully Updated');
		                        </SCRIPT>";
		                        adminProfileDetails($_SESSION["userId"]);
		                        header("Refresh:0; /HireHAT/app/view/admin/admin_profile_view.php");                       
						}
				}
				break;
		case "changePass":
					header('Location: /HireHAT/app/view/admin/admin_changePass_view.php') ;
					break;
		case 'postNews':
		if (isset($_POST['submit'])) {
			$result=adminPostnotice($_POST["jobTitle"],$_POST["jobdescription"]);
				if ($result=="success") 
				{
					header('Location: /HireHAT/app/view/admin/admin_postNews_view.php?admin_showPreviousnotice');
				}
		}else{
			header('Location: /HireHAT/app/view/admin/admin_postNews_view.php?admin_showPreviousnotice');
		}				
					break;
		case "showPreviousnotice":
					showPreviousnotice('to_public');
					break;	
		case "home":
					header('Location: /HireHAT/app/view/admin/admin_home_view.php') ;
					break;
		case "manageAccount":
					header('Location: /HireHAT/app/view/admin/admin_manageAccount_view.php') ;
					break;
		case "showAllAccount":
					showAllAccount();
					break;		
		case "createAdmin":
					header('Location: /HireHAT/app/view/admin/admin_createAdmin_view.php') ;
					break;
		case "createDepartment":
					header('Location: /HireHAT/app/view/admin/admin_createDepartment_view.php') ;
					break;	
		case "submitPassword":
					if ($GLOBALS['phpValidation']) {
						if (changePassword($_SESSION["userId"],$_POST['pass'], $_POST['newPass'])=="Success")
					{
						echo "<script> 
		                        alert('Password Successfully Updated');
		                        </script>";
		                         header("Refresh:0; /HireHAT/app/view/admin/admin_home_view.php");      
						//header 
					}
					else
					{
						echo "<script> 
		                        alert('Current Password Not Matched');
		                        </script>";
					}
					}
					break;														
		default:
					include_once(APP_ROOT."/app/error.php");
	}	
}



	
?>






<?php ob_end_flush(); ?>