<?php ob_start(); ?>

<?php 

if (isset($_GET['AjaxView'])) {
	$controller=$_GET['status'];
	define("APP_ROOT", "$_SERVER[DOCUMENT_ROOT]/HireHAT");
	session_start();
}

if ($controller=="staff") {
	include_once(APP_ROOT.'/core/staff_service.php'); 
}else{
	//include_once('../error/php');
}

?>

<!-- AJax controller-->
<?php 
if (isset($_GET['AjaxView'])) {

	$view=$_GET['AjaxView'];
	switch($view){
		case "searchResult":
		 $user = $_GET['user'];
         $obj=$_GET['obj'];
         if($obj=="jobs")
         {

           staffJobSearchResult($user);
         }else{
                  staffSearchResult($user);
              }
			break;
			case "searchDetails":
		 $user = $_GET['user'];
	     staffSearchDetails($user);
			break;
			case "searchJobDetails":
		    $user = $_GET['user'];
		    $applied=$_GET['applied'];
		 staffJobSearchDetails($user,$applied);
			break;
			case "searchTeamDetails":
		    $user = $_GET['user'];
		 staffTeamSearchDetails($user);
			break;
			case 'apply':
        $jobId=$_GET['jobId'];
        $userId=$_SESSION["userId"];
        $result=staffJobApply($jobId,$userId);
       
        if($result==1)
        {
        	header("Refresh:0; /HireHAT/app/view/staff/staff_home_view.php");				
        }else
        {
        	echo "<SCRIPT type='text/javascript'> 
                        alert('Already Applied');
                        </SCRIPT>";
                        header("Refresh:0; /HireHAT/app/view/staff/staff_home_view.php");
        }
			break;  
			case 'requestAccept':
        $appliedId=$_GET['appliedId'];
        $userId=$_SESSION["userId"];
        $jobId=$_GET['jobid'];
        staffJobAccept($appliedId,$userId,$jobId);
             $result=staffRequestDetails($userId);
  			 $_SESSION['request']=$result;
        header("Location:/HireHAT/app/view/staff/staff_bidRequest_view.php");
        
			break;          
			case 'requestReject':
        $appliedId=$_GET['appliedId'];
        $userId=$_SESSION["userId"];
        staffJobReject($appliedId,$userId);
             $result=staffRequestDetails($userId);
  			 $_SESSION['request']=$result;
        echo "<SCRIPT type='text/javascript'> 
                        alert('Job Rejected');
                        </SCRIPT>";
        header("Refresh:0;/HireHAT/app/view/staff/staff_bidRequest_view.php");
            break;          
		default:
			include_once(APP_ROOT."/app/error.php");
	}	
}
else{
if(!isset($isDispatchedByFrontController)){
		//include_once('../error/php');
		echo "ERROR staff_controller";
		die;
	}

//PHP controller

	switch($view){
		case "logout":
			//header('Location:'.APP_ROOT);
		header('Location: /HireHAT/app/view/staff/staff_logout_view.php') ;

			break;
		case "profile":
			header('Location: /HireHAT/app/view/staff/staff_profile_view.php');
			break;
		case "changePassword":
			header('Location: /HireHAT/app/view/staff/staff_changePass_view.php');
			break;
		case "home":
           $result=staffJobPostShow();
		   
		   $_SESSION['jobArray']=$result;
		   header('Location: /HireHAT/app/view/staff/staff_home_view.php');
			break;
		case "saveEdit":
		if ($GLOBALS['phpValidation'] == "true") {

			 $fullname=trim($_POST['fullname']," ");
			 $email=trim($_POST['email']," ");
			 $maritalstatus=$_POST['maritalstatus'];
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

			 if(staffUpdateProfile($_SESSION['userId'], $fullname, $gender, $maritalstatus, $email, $address, $phonenumber, $picture ))
				{
					    echo "<SCRIPT type='text/javascript'> 
                        alert('Account Successfully Updated');
                        </SCRIPT>";
                        staffProfileDetails($_SESSION["userId"]);
                        header("Refresh:0; /HireHAT/app/view/staff/staff_profile_view.php");                       
				}

			 
		}
			break;

	    case "clan":
	       $userId=$_SESSION['userId'];
		   $result=staffTeamDetails($userId);
		      $_SESSION['team']=$result;
			header('Location: /HireHAT/app/view/staff/staff_clan_view.php');
			break;

		case "notice":
           $userId=$_SESSION['userId'];
		   $result=staffNotice($userId);
		    $_SESSION['notice']=$result;
		    $teamNotice=showTeamNotice($userId);
		     $_SESSION['teamNotice']=$teamNotice;
			header('Location: /HireHAT/app/view/staff/staff_notice_view.php');
			break;
           case "bidRequest":
           $userId=$_SESSION['userId'];
		   $result=staffRequestDetails($userId);
  			 $_SESSION['request']=$result;
		    header('Location: /HireHAT/app/view/staff/staff_bidRequest_view.php');
			break;	
		    case "payment":
		    $userId=$_SESSION['userId'];
		   $result=staffPaymentDetails($userId);
  			 $_SESSION['payment']=$result;
			header('Location: /HireHAT/app/view/staff/staff_payment_view.php');
			break;
			case "messages":
		$showAllMessages=showAllMessages($_SESSION['userId']);
		$_SESSION['showAllMessages']=$showAllMessages;
		header('Location: /HireHAT/app/view/staff/staff_'.$view.'_view.php') ;
			break;
			case "sendMessages":
		if ($GLOBALS['phpValidation'] =="true") {
			$fromID=$_SESSION['userId'];
			$toID=$_POST['user'];
			$title=$_POST['title'];
			$messages=$_POST['massages'];
			$result=staffSendMessages($fromID, $toID, $title, $messages);
			if ($result=="false") {
				echo "<script> 
                   alert('This User Does not exist!');
                   </script>";
			}else{
				header('Location: /HireHAT/app/view/staff/staff_messages_view.php?staff_messages') ;
			}
		}
			break;
		case "job":
		    $userId=$_SESSION['userId'];
		   $result=staffJobApplied($userId);
		   
		   $_SESSION['jobApplied']=$result;

			header('Location: /HireHAT/app/view/staff/staff_appliedJob_view.php');
			break;
			case "security":
		header('Location: /HireHAT/app/view/staff/staff_'.$view.'_view.php') ;
			break;
			case "submitCode":
		if ($GLOBALS['phpValidation'] =="true") {
			if (staffUpdateCode($_SESSION['userId'] , $_POST['reCode'])) {
			echo "<script> 
                   alert('Secendary Code Set Successfully');  
                   </script>";
        header('Location: /HireHAT/app/view/staff/staff_secendarySecurity_view.php?staff_security') ;
		}
		}
			break;

			case "secendarySecurity":
			header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;

			case "submitPassword":
			if ($GLOBALS['phpValidation']=="true") {
			if (changePassword($_SESSION["userId"],$_POST['pass'], $_POST['newPass'])=="Success"){
			echo "<script> 
                   alert('Password Successfully Updated');
                   </script>";
        header("Refresh:0; /HireHAT/app/view/staff/staff_home_view.php"); 
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