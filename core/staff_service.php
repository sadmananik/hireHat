<?php include_once(APP_ROOT."/data/staff_data_access.php"); ?>

<?php

	function changePassword($getID,$cPass, $rePass)
	{
		return changePasswordFromDB($getID,$cPass, $rePass);
	}
	function staffSearchResult($user)
{
	return staffSearchResultFromDB($user);
}
	function staffJobSearchResult($user)
{
	return staffJobSearchResultFromDB($user);
}
function staffSearchDetails($user)
{
	return staffSearchDetailsFromDB($user);
}
function staffJobSearchDetails($user,$applied)
{
	return staffJobSearchDetailsFromDB($user,$applied);
}
function staffProfileDetails($getID)
	{
		return getStaffProfileFromDB($getID);
	}
	function staffUpdateProfile($getID, $fullname,$gender,$maritalstatus, $email, $address, $phonenumber, $picture)
	{
		return staffUpdateProfileToDB($getID, $fullname,$gender, $maritalstatus, $email, $address, $phonenumber, $picture);
	}
	function staffJobApply($jobId,$userId)
	{

		return staffJobApplyDB($jobId,$userId);
	}
	function staffJobPostShow()
	{

		return staffJobPostFromDB();
	}
	function staffJobApplied($userId)
	{

		return staffJobAppliedFromDB($userId);
	}

	function showTeamNotice($userId)
	{
		return showTeamNoticeFromDB($userId);
	}

	function staffNotice($userId)
	{

		return staffNoticeFromDB($userId);
	}
	function staffUpdateCode($staffId, $recode)
	{
		return staffUpdateCodeToDB($staffId, $recode);
	}
	function staffTeamDetails($userId)
	{

		return staffTeamDetailsFromDB($userId);
	}
function staffRequestDetails($userId)
	{

		return staffRequestDetailsFromDB($userId);
	}
	function staffJobAccept($appliedId,$userId,$jobId)
	{

		return staffJobAcceptFromDB($appliedId,$userId,$jobId);
	}
  function staffJobReject($appliedId,$userId)
  {

		return staffJobRejectFromDB($appliedId,$userId);
	}

	function setLoginRecord($userId)
	{
		return setLoginRecordToDB($userId);
	}
	function staffPaymentDetails($userId)
	{

		return staffPaymentDetailsFromDB($userId);
	}
  function staffTeamSearchDetails($user)
  {

		return staffTeamSearchDetailsFromDB($user);
 }
 function staffSendMessages($fromID, $toID, $title, $messages)
	{
		return staffSendMessagesToDB($fromID, $toID, $title, $messages);
	}
	function showAllMessages($userId)
	{
		return showAllMessagesFromDB($userId);
	}
?>