<?php include_once(APP_ROOT."/data/chief_data_access.php"); ?>

<?php

	function chiefProfileDetails($getID)
	{
		return getChiefProfileFromDB($getID);
	}

	function chiefUpdateProfile($getID, $fullname, $gender, $maritalstatus, $email, $address, $phonenumber, $picture)
	{
		return chiefUpdateProfileToDB($getID, $fullname, $gender, $maritalstatus, $email, $address, $phonenumber, $picture);
	}

	function setLoginRecord($userId)
	{
		return setLoginRecordToDB($userId);
	}

	function showHighRatedStaff()
	{
		return showHighRatedStaffFromDB();
	}


	function chiefPublishJob($jobTitle, $jobDetails, $designation, $Jobtype, $dept, $vacancy, $experience, $education, $gender,  $age, $jobLocation, $lastDate, $salaryType, $salary)
	{
		return chiefPublishJobToDB($jobTitle, $jobDetails, $designation, $Jobtype, $dept, $vacancy, $experience, $education, $gender,  $age, $jobLocation, $lastDate, $salaryType, $salary);
	}

	function chiefUpdateJob($jobid, $jobTitle, $jobDetails, $designation, $Jobtype, $dept, $vacancy, $experience, $education, $gender,  $age, $jobLocation, $lastDate, $salaryType, $salary)
	{
		return chiefUpdateJobToDB($jobid, $jobTitle, $jobDetails, $designation, $Jobtype, $dept, $vacancy, $experience, $education, $gender,  $age, $jobLocation, $lastDate, $salaryType, $salary);
	}

	function chiefSendMessages($fromID, $toID, $title, $messages)
	{
		return chiefSendMessagesToDB($fromID, $toID, $title, $messages);
	}

	function showAllMessages($userId)
	{
		return showAllMessagesFromDB($userId);
	}

	function chiefRateStaff($chiefId, $staffId, $RateValue){
		return chiefRateStaffToDB($chiefId, $staffId, $RateValue);
	}

	function showCreatedTeam($chiefId)
	{
		return showCreatedTeamFromDB($chiefId);
	}

	function showTeamNotice($cheifId, $teamId)
	{
		return showTeamNoticeFromDB($cheifId, $teamId);
	}

	function showPublicNotice()
	{
		return showPublicNoticeFromFB();
	}

	function showSelectedTeam($teamID)
	{
		return showSelectedTeamFromDB($teamID);
	}

	function chiefUpdateCode($chiefId, $recode)
	{
		return chiefUpdateCodeToDB($chiefId, $recode);
	}

	function chiefRemoveStaffTeam($staffId, $teamId)
	{
		return chiefRemoveStaffTeamFromFB($staffId, $teamId);
	}

	function chiefbanStaffTeam($staffId, $teamId)
	{
		return chiefbanStaffTeamFromDB($staffId, $teamId);
	}

	function chiefUpdateTeam($teamId, $teamName, $teamDesciption)
	{
		return chiefUpdateTeamToDB($teamId, $teamName, $teamDesciption);
	}

	function deleteThisNotice($noticeID)
	{
		return deleteThisNoticeFromDB($noticeID);
	}

	function chiefsendTeamNotice($noticeTitle, $noticeDetails, $chiefId, $teamID)
	{
		return chiefsendTeamNoticeFromDB($noticeTitle, $noticeDetails, $chiefId, $teamID);
	}

	function chiefDeleteTeam($teamId)
	{
		return chiefDeleteTeamFromDB($teamId);
	}

	function chiefRemoveStaff($staffId, $chiefId)
	{
		return chiefRemoveStaffFromFB($staffId, $chiefId);
	}

	function cheifAcceptJobReq($jobid, $staffId, $cheifId){
		return cheifAcceptJobReqToDB($jobid, $staffId, $cheifId);
	}

	function chiefCreateTeam($teamName, $teamDesciption, $chiefId){
		return chiefCreateTeamToDB($teamName, $teamDesciption, $chiefId);
	}

	function cheifRejectJobReq($jobid, $staffId, $cheifId){
		return cheifRejectJobReqToDB($jobid, $staffId, $cheifId);
	}

	function changePassword($getID,$cPass, $rePass)
	{
	return changePasswordFromDB($getID,$cPass, $rePass);
	}
	
	function showAllStaff()
	{
		return showAllStaffFromDB();
	}

	function showAppliedJobRequest($accid)
	{
		return showAppliedJobRequestFromDB($accid);
	}

	function chiefUnbanStaffTeam($staffId, $teamId)
	{
		return chiefUnbanStaffTeamFromDB($staffId, $teamId);
	}

	function showHiredStaff($accid)
	{
		return showHiredStaffFromDB($accid);
	}

	function showTransactionHistory($userId)
	{
		return showTransactionHistoryFromDB($userId);
	}

	function chiefpaySalaryToStaff($chiefId, $staffId, $paidAmount, $exPaidAmount, $jobId)
	{
		return chiefpaySalaryToStaffToDB($chiefId, $staffId, $paidAmount, $exPaidAmount, $jobId);
	}

	function showManageTeam($chiefId)
	{
		return showManageTeamFromDB($chiefId);
	}

	function chiefAddStaffToTeam($teamId, $staffId)
	{
		return chiefAddStaffToTeamDB($teamId, $staffId);
	}

	function chiefApplyHireStaff($jobid, $staffAccID)
	{
		return chiefApplyHireStaffToDB($jobid, $staffAccID);
	}
	function checkIfAppliedHireSameStaff($jobID, $staffID){
		return checkIfAppliedHireSameStaffFromDB($jobID, $staffID);
	}

	function getPostedJobIDs($accID){
		return getPostedJobIDsFromDB($accID);
	}

	function showAllJob($accID)
	{
		return showAllJobFromDB($accID);
	}

	function deleteAJob($jobid){
		return deleteAJobFromDB($jobid);
	}

	function getAStaff($accID){
		return getAStaffFromDB($accID);
	}

	function getAJob($jobid){
		return getAJobFromDB($jobid);
	}

	function chiefSearchResult($user)
	{
	return chiefSearchResultFromDB($user);
	}
	function chiefJobSearchResult($user)
	{
	return chiefJobSearchResultFromDB($user);
	}
	function chiefSearchDetails($user)
	{
	return chiefSearchDetailsFromDB($user);
	}
	function chiefJobSearchDetails($user)
	{
	return chiefJobSearchDetailsFromDB($user);
	}

?>