<?php ob_start(); ?>

<?php

	if (isset($_GET['AjaxView'])) {
	$controller=$_GET['status'];
	define("APP_ROOT", "$_SERVER[DOCUMENT_ROOT]/HireHAT");
    $view=$_GET['AjaxView'];
    
} 
else{
	if(!isset($isDispatchedByFrontController)){
		//include_once('../error/php');
		echo "ERROR admin_controller";
		die;
}
}


if ($controller=="chief") {
	include_once(APP_ROOT.'/core/chief_service.php'); 
}else{
	//include_once('../error/php');
}

?>

<?php

	switch($view){   
		case "home":
		$showHighRatedStaff=showHighRatedStaff();
		$_SESSION['showHighRatedStaff']=$showHighRatedStaff;

		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "sendMessages":
		if ($GLOBALS['phpValidation'] =="true") {
			$fromID=$_SESSION['userId'];
			$toID=$_POST['user'];
			$title=$_POST['title'];
			$messages=$_POST['massages'];
			$result=chiefSendMessages($fromID, $toID, $title, $messages);
			if ($result=="false") {
				echo "<script> 
                   alert('This User Does not exist!');
                   </script>";
			}else{
				header('Location: /HireHAT/app/view/chief/chief_messages_view.php?chief_messages') ;
			}
		}
			break;
		case "messages":
		$showAllMessages=showAllMessages($_SESSION['userId']);
		$_SESSION['showAllMessages']=$showAllMessages;
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "deleteNotice":
		$teamID=$_GET['teamID'];
		if (deleteThisNotice($_GET['noticeId'])) {
		$showThisTeamNotice=showTeamNotice($_SESSION['userId'],$teamID);
		$_SESSION['showThisTeamNotice']=$showThisTeamNotice;
		header('Location: /HireHAT/app/view/chief/chief_teamNotice_view.php') ;
		}
			break;
		case "sendThisNotice":
		if ( $GLOBALS['phpValidation'] =="true") {
		$noticeTitle=trim($_POST['noticeTitle']," ");
		$noticeDetails=trim($_POST['noticeDetails']," ");
		$teamID=$_GET['teamId'];
		$chiefId=$_SESSION['userId'];
		if (chiefsendTeamNotice($noticeTitle, $noticeDetails, $chiefId, $teamID)) {
		header('Location: /HireHAT/app/view/chief/chief_clan_view.php?chief_clan') ;
		}
		}
			break;
		case "sendTeamNotice": 
		$teamId=$_GET['teamId'];
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php?teamId='.$teamId) ;
			break;
		case "teamNotice": 
		$showThisTeamNotice=showTeamNotice($_SESSION['userId'],$_GET['teamId']);
		$_SESSION['showThisTeamNotice']=$showThisTeamNotice;
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "notice":
		$showPublicNotice=showPublicNotice();
		$_SESSION['showPublicNotice']=$showPublicNotice;
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "profile":
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "security":
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "paySalary":
		$hiredStaffDetails=showHiredStaff($_SESSION['userId']);
		$_SESSION['hiredStaffDetails']=$hiredStaffDetails;
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "payThisStaff":
			if ($GLOBALS['phpValidation'] == "true") {
			$jobId=$_GET['jobId'];
			$staffId=$_GET['staffId'];
			$paidAmount=$_POST['uPay'];
			$exPaidAmount=$_POST['uExPay'];
			$chiefId=$_SESSION['userId'];
			$payStaff=chiefpaySalaryToStaff($chiefId, $staffId, $paidAmount, $exPaidAmount, $jobId);

			if ($payStaff==1) {
				echo "<script> 
                   alert('Paid Successfully');
                   </script>";
				header('Location: /HireHAT/app/view/chief/chief_paySalary_view.php?chief_paySalary') ;
			}elseif ($payStaff=="false") {
				echo "<script> 
                   alert('Already Paid This Staff for This Job');
                   </script>";
			}
			}
			break;
		case "financial":
		$showTransactionDetails=showTransactionHistory($_SESSION['userId']);
		$_SESSION['showTransactionDetails']=$showTransactionDetails;
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "removeStaff":
		if (chiefRemoveStaff($_GET['staffId'], $_SESSION['userId'])) {
		header('Location: /HireHAT/app/view/chief/chief_manageTeam_view.php?chief_clan') ;
		}
			break;
		case "submitCode":
		if ($GLOBALS['phpValidation'] =="true") {
			if (chiefUpdateCode($_SESSION['userId'] , $_POST['reCode'])) {
			echo "<script> 
                   alert('Secendary Code Set Successfully');  
                   </script>";
        header('Location: /HireHAT/app/view/chief/chief_secendarySecurity_view.php?chief_security') ;
		}
		}
			break;
		case "secendarySecurity":
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "removeStaffTeam":
		$staffId=$_GET['staffId'];
		$teamId=$_GET['teamId'];

		if (chiefRemoveStaffTeam($staffId, $teamId)) {
		header('Location: /HireHAT/app/view/chief/chief_manageTeam_view.php?chief_manageTeam') ;
		}
			break;
		case "banStaffTeam":
		$staffId=$_GET['staffId'];
		$teamId=$_GET['teamId'];

		if (chiefbanStaffTeam($staffId, $teamId)) {
		header('Location: /HireHAT/app/view/chief/chief_manageTeam_view.php?chief_manageTeam') ;
		}
			break;

		case "ubanStaffTeam":
		$staffId=$_GET['staffId'];
		$teamId=$_GET['teamId'];

		if (chiefUnbanStaffTeam($staffId, $teamId)) {
		header('Location: /HireHAT/app/view/chief/chief_manageTeam_view.php?chief_manageTeam') ;
		}
			break;
		case "manageTeam":
		$getSelectedTeamDetails=showManageTeam($_SESSION['userId']);
		$_SESSION['getSelectedTeamDetails']=$getSelectedTeamDetails;
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "rateStaff":
		if ($GLOBALS['phpValidation'] =="true") {
			chiefRateStaff($_SESSION['userId'], $_GET['staffId'], $_POST['RateValue']);
			echo "<script> 
                   alert('Ratting Done');
                   </script>";
				// header('Location: /HireHAT/app/view/chief/chief_manageHiredStaff_view.php?chief_manageHiredStaff') ;
		}else{
			echo "<script> 
                   alert('nt  Done');
                   </script>";
			
		}
		break;
		case "addThisStaffTeam":
			$teamId=$_POST['teamId'];
			$staffId=$_GET['staffId'];
			$addStaff=chiefAddStaffToTeam($teamId, $staffId);

			if ($addStaff==1) {
				echo "<script> 
                   alert('This Staff Added To This Team');
                   </script>";
				header('Refresh:0; /HireHAT/app/view/chief/chief_addStaff_view.php?chief_clan') ;
			}elseif ($addStaff=="false") {
				echo "<script> 
                   alert('This Staff Already Member of This Team');
                   </script>";
			}
			break;
		case "saveEditTeam":
		$teamName=trim($_POST['teamName']," ");
		$teamDesciption=trim($_POST['teamDetails']," ");
		$teamId=$_GET['teamId'];
		if (chiefUpdateTeam($teamId, $teamName, $teamDesciption)) {
			header('Refresh:0; /HireHAT/app/view/chief/chief_createTeam_view.php?chief_clan') ;
		}
			break;
		case "deleteThisTeam":
		$teamId=$_GET['teamId'];
		if (chiefDeleteTeam($teamId)) {
			header('Refresh:0; /HireHAT/app/view/chief/chief_createTeam_view.php?chief_clan') ;
		}
			break;
		case "addStaff":
		$hiredStaffDetails=showHiredStaff($_SESSION['userId']);
		$_SESSION['hiredStaffDetails']=$hiredStaffDetails;
		$teamId=$_GET['teamId'];
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php?teamId='.$teamId) ;
			break;
		case "editTeam":
		$thisTeamDetails=showSelectedTeam($_GET['teamId']);
		$_SESSION['thisTeamDetails']=$thisTeamDetails;
		header('Location: /HireHAT/app/view/chief/chief_createTeam_view.php') ;
			break;
		case "clan":
		$createdTeamDetails=showCreatedTeam($_SESSION['userId']);
		$_SESSION['createdTeamDetails']=$createdTeamDetails;
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "createTeam":
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "createThisTeam":
		$teamName=trim($_POST['teamName']," ");
		$teamDesciption=trim($_POST['teamDetails']," ");
		$chiefId=$_SESSION['userId'];
		if (chiefCreateTeam($teamName, $teamDesciption, $chiefId)) {
		header('Location: /HireHAT/app/view/chief/chief_clan_view.php') ;
		}
			break;
		case "manageHiredStaff":
		$hiredStaffDetails=showHiredStaff($_SESSION['userId']);
		$_SESSION['hiredStaffDetails']=$hiredStaffDetails;
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "hire":
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php?chief_ShowStaff') ;
			break;

		case "submitPassword":
		if ($GLOBALS['phpValidation']=="true") {
			if (changePassword($_SESSION["userId"],$_POST['pass'], $_POST['newPass'])=="Success"){
			echo "<script> 
                   alert('Password Successfully Updated');
                   </script>";
        header("Refresh:0; /HireHAT/app/view/chief/chief_home_view.php"); 
			}
			else
			{
				echo "<script> 
                        alert('Current Password Not Matched');
                        </script>";
			}
		}
			break;			
		case "ShowStaff":
		showAllStaff();
			break;   
		case "requestedJob":
		$jobReqDetails=showAppliedJobRequest($_SESSION['userId']);
		$_SESSION['jobReqDetails']=$jobReqDetails;
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;

		case "acceptJob":
		if (cheifAcceptJobReq($_GET['jobId'], $_GET['staffId'], $_SESSION['userId'])) {
			header("Location: /HireHAT/app/view/chief/chief_requestedJob_view.php?chief_requestedJob");
		}
			break;
		case "rejectJob":
		if (cheifRejectJobReq($_GET['jobId'], $_GET['staffId'], $_SESSION['userId'])) {
			header("Location: /HireHAT/app/view/chief/chief_requestedJob_view.php?chief_requestedJob");
		}
		break;
		case "hireStaff":
		$staffDetails=getAStaff($_GET['accID']);
		$thisCheifJob=getPostedJobIDs($_SESSION['userId']);
		$_SESSION['staffDetails']=$staffDetails;
		$_SESSION['thisCheifJob']=$thisCheifJob;
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "hireThisStaff":
		if ($GLOBALS['phpValidation'] =="true") { 
			if( checkIfAppliedHireSameStaff($_POST['jobID'], $_GET['accID']) == "false") {
				echo "<SCRIPT type='text/javascript'> 
                        alert('Already Applied to hire this staff');
                        </SCRIPT>";
			}else if(chiefApplyHireStaff($_POST['jobID'], $_GET['accID'])){
				header("Refresh:0; /HireHAT/app/view/chief/chief_hire_view.php?chief_ShowStaff");
			}
		}
			break;
		case "postJob":
			unset($_SESSION['jobID']); unset($_SESSION['jobTitle']); unset($_SESSION['jobDetails']); unset($_SESSION['designation'] ); 
			unset($_SESSION['Jobtype'] ); unset($_SESSION['dept'] ); unset($_SESSION['vacancy'] );unset($_SESSION['experience'] );
            unset($_SESSION['education'] );unset($_SESSION['gender'] ); unset($_SESSION['age'] );unset($_SESSION['jobLocation']);
            unset($_SESSION['lastDate']); unset($_SESSION['salaryType']);unset($_SESSION['salary']); unset($_SESSION['jobStatus']);
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "editJob":
		getAJob($_GET['jobID']);
		header('Location: /HireHAT/app/view/chief/chief_postJob_view.php') ;
			break;
		case "publishJob":
		if ($GLOBALS['phpValidation'] == "true") {
		$jobTitle=trim($_POST['jobTitle']," ");
        $jobDetails=trim($_POST['jobDetails']," ");
        $salaryType=trim($_POST['Saltype']," ");
        $salary=trim($_POST['salary']," ");
        $lastDate=trim($_POST['lastDate']," ");
        $age=trim($_POST['age']," ");
        if (isset($_POST['gender'])) {
          $gender=trim($_POST['gender']," ");
        }
        else{
        	$gender="Not mentioned";
        }

        $jobLocation=trim($_POST['jobLocation']," ");
        $designation=trim($_POST['designation']," ");
        $vacancy=trim($_POST['vacancy']," ");
        $Jobtype=trim($_POST['Jobtype']," ");
        $dept=trim($_POST['dept']," ");
        $experience=trim($_POST['experience']," ");
        $education=trim($_POST['education']," ");

        if(chiefPublishJob($jobTitle, $jobDetails, $designation, $Jobtype, $dept, $vacancy, $experience, $education, $gender,  $age, $jobLocation, $lastDate, $salaryType, $salary)){
        	header('Location: /HireHAT/app/view/chief/chief_job_view.php?chief_ShowJob');
		} 
	}
		break;
		case 'deleteJob':
		if (deleteAJob($_GET['jobID'])) {
			header('Location: /HireHAT/app/view/chief/chief_job_view.php?chief_ShowJob');;
		}
			break;
		case 'saveJobEdit':
		if ($GLOBALS['phpValidation'] == "true") {
		$jobTitle=trim($_POST['jobTitle']," ");
        $jobDetails=trim($_POST['jobDetails']," ");
        $salaryType=trim($_POST['Saltype']," ");
        $salary=trim($_POST['salary']," ");
        $lastDate=trim($_POST['lastDate']," ");
        $age=trim($_POST['age']," ");
        if (isset($_POST['gender'])) {
          $gender=trim($_POST['gender']," ");
        }
        else{
        	$gender="Not mentioned";
        }

        $jobLocation=trim($_POST['jobLocation']," ");
        $designation=trim($_POST['designation']," ");
        $vacancy=trim($_POST['vacancy']," ");
        $Jobtype=trim($_POST['Jobtype']," ");
        $dept=trim($_POST['dept']," ");
        $experience=trim($_POST['experience']," ");
        $education=trim($_POST['education']," ");

         if(chiefUpdateJob($_SESSION['jobID'], $jobTitle, $jobDetails, $designation, $Jobtype, $dept, $vacancy, $experience, $education, $gender,  $age, $jobLocation, $lastDate, $salaryType, $salary)){
         	 
         	header('Location: /HireHAT/app/view/chief/chief_job_view.php?chief_ShowJob');
		 } 
	}
			break;
		case "logout":
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php') ;
			break;
		case "job":
		header('Location: /HireHAT/app/view/chief/chief_'.$view.'_view.php?chief_ShowJob') ;
			break;
		case "ShowJob":
		showAllJob($_SESSION['userId']);
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

			 if(chiefUpdateProfile($_SESSION['userId'], $fullname, $gender, $maritalstatus, $email, $address, $phonenumber, $picture ))
				{
					    echo "<SCRIPT type='text/javascript'> 
                        alert('Account Successfully Updated');
                        </SCRIPT>";
                        chiefProfileDetails($_SESSION["userId"]);
                        header("Refresh:0; /HireHAT/app/view/chief/chief_profile_view.php");                       
				}

			 
		}
			break;
		case "searchResult":
		 $user = $_GET['user'];
         $obj=$_GET['obj'];
         if($obj=="jobs")
         {

           chiefJobSearchResult($user);
         }else{
                  chiefSearchResult($user);
              }
			break;
		case "searchDetails":
		 $user = $_GET['user'];
	     chiefSearchDetails($user);
			break;
			case "searchJobDetails":
		    $user = $_GET['user'];
		 chiefJobSearchDetails($user);
			break;
			
		default:
			include_once(APP_ROOT."/app/error.php");
	}	
?>


<?php ob_end_flush(); ?>