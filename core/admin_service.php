<?php include_once(APP_ROOT."/data/admin_data_access.php"); ?>
<?php

function adminProfileDetails($getID)
{
	return getAdminProfileFromDB($getID);
}

function adminUpdateProfile($getID, $fullname, $gender, $email, $address, $phonenumber, $picture)
{
	return adminUpdateProfileToDB($getID, $fullname, $gender, $email, $address, $phonenumber, $picture);
}
	
function adminLoginRecord($user)
{
	return adminLoginRecordFromDB($user);
}

function CreateAdminAccount($fullname, $username, $email, $dob, $gender, $phonenumber, $address)
{
	return CreateAdminAccountToDB($fullname, $username, $email, $dob, $gender, $phonenumber, $address);
}

function adminManageAccount($user)
{
	adminManageAccountFromDB($user);
}

function adminUpdateCode($chiefId, $recode)
	{
		return adminUpdateCodeToDB($chiefId, $recode);
	}

function adminSendMessages($fromID, $toID, $title, $messages)
{
	return adminSendMessagesToDB($fromID, $toID, $title, $messages);
}

function getNonValidatedAcc($user, $type)
{
	getNonValidatedAccFromDB($user, $type);
}

function showAllMessages($userId)
{
	return showAllMessagesFromDB($userId);
}

function validateAccount($user, $status, $type)
{
	return validateAccountFromDB($user, $status, $type);
}

function invalidateAccount($user, $status, $type)
{
	return invalidateAccountFromDB($user, $status, $type);
}

function setLoginRecord($userId)
{
		return setLoginRecordToDB($userId);
}

function showAllAccount()
{
	showAllAccountFromDB();
}

function showPreviousnotice($admin_notice)
{
	showPreviousnoticeFromDB($admin_notice);
}

function adminPostnotice($title,$description)
{
	return adminPostnoticeFromDB($title,$description);
}

function changePassword($getID,$cPass, $rePass)
{
	return changePasswordFromDB($getID,$cPass, $rePass);
}

function adminSearchResult($user)
{
	return adminSearchResultFromDB($user);
}
	function adminJobSearchResult($user)
{
	return adminJobSearchResultFromDB($user);
}
function adminSearchDetails($user)
{
	return adminSearchDetailsFromDB($user);
}
function adminJobSearchDetails($user)
{
	return adminJobSearchDetailsFromDB($user);
}
?>