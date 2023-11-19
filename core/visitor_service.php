<?php include_once(APP_ROOT."/data/visitor_data_access.php"); ?>

<?php

	function userAuthentication($getID, $getPassword)
	{
		return userAuthenticationFromDB($getID, $getPassword);
	}

	function userAuthenticationUsingCookie($userId, $getKey)
	{
		return userAuthenticationUsingCookieFromDB($userId, $getKey);
	}

	function visitorSubmitCode($user, $code)
	{
		return visitorSubmitCodeFromDB($user, $code);
	}

	function sendingFeedbackEmail($text, $email){
		return sendingFeedbackEmailFromDB($text, $email);
	}

	function userCreateAccoint($fullname, $username, $email, $password, $dob, $status)
	{
		return userCreateAccointoDB($fullname, $username, $email, $password, $dob, $status);
	}

	function resetPassword($userId, $resetPassword){
		return resetPasswordFromDB($userId, $resetPassword);
	}

	function sendPasswordRestLinkViaEmail($user){
		return sendPassRestLinkViaEmail($user);
	}

	function getUserPassword($userId)
	{
		return getThisUserPassFromDB($userId);
	}
?>