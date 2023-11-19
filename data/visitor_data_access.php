<?php require_once(APP_ROOT."/lib/helper/data_conn_helper.php") ?>

<?php

	function userAuthenticationFromDB($getID, $getPassword){
		$query = "select * from logininfo";
		$getResult = executeNonQuery($query);
		$haveID=false;
		$Result="false";
		$userId="";
		$status="";
        $password="";

		if(mysqli_num_rows($getResult)>0){
        
        while($row=mysqli_fetch_assoc($getResult)){
            if ($getID==$row['USERNAME'] || $getID==$row['ACCID']) 
            {
            	$haveID=true;
            	if ($getPassword==$row['PASSWORD']) {
            		
            		if ($row['VALIDITY']=="VALID") 
            		{
            			$userId = $row['ACCID'];
            			$status = $row['STATUS'];
                        $password = $row['PASSWORD'];
            			$Result = "FOUND & VALID";
            		}
            		else{
            			$Result = "INVALID";
            		}
            	}
            	else{
            		$Result = "INCORRECT PASSWORD";
            	}

            }
        }

        if ($haveID==false) {
        	$Result="INCORRECT ID OR USERNAME";
        }

        return array($Result, $userId, $status, $password);

    }
    else{
        $Result= "Result not found!";
    }

    	return array($Result, $userId, $status, $password);            			

	}

    function userAuthenticationUsingCookieFromDB($getID, $getPassword){
        $query = "select * from logininfo";
        $getResult = executeNonQuery($query);
        $haveID=false;
        $Result="false";
        $userId="";
        $status="";
        $password="";

        if(mysqli_num_rows($getResult)>0){
        
        while($row=mysqli_fetch_assoc($getResult)){
            if ($getID==$row['USERNAME'] || $getID==$row['ACCID']) 
            {
                $haveID=true;
                $password=md5($row['PASSWORD']);
                if ($getPassword==$password) {
                    
                    if ($row['VALIDITY']=="VALID") 
                    {
                        $userId = $row['ACCID'];
                        $status = $row['STATUS'];
                        $password=$row['PASSWORD'];
                        $Result = "FOUND & VALID";
                    }
                    else{
                        $Result = "INVALID";
                    }
                }
                else{
                    $Result = "INCORRECT PASSWORD";
                }

            }
        }

        if ($haveID==false) {
            $Result="INCORRECT ID OR USERNAME";
        }

        return array($Result, $userId, $status, $password);

    }
    else{
        $Result= "Result not found!";
    }

        return array($Result, $userId, $status, $password); 
    }


    function userCreateAccointoDB($fullname, $username, $email, $password, $dob, $status)
    {
        $queryLogininfo = "insert into logininfo (`USERNAME` ,`PASSWORD`, `STATUS`, `VALIDITY`)  values ('".$username."','".$password."','".$status."', 'VALID')";
        $sql="SELECT * FROM logininfo ORDER BY ACCID DESC LIMIT 1";

        $getResult = executeNonQuery($queryLogininfo);

        if ($getResult) {
            $row=mysqli_fetch_assoc(executeNonQuery($sql));
            $accID=$row['ACCID'];
        } 

        if ($status=="Staff") {
            $query = "insert into staffaccounts (`ACCID` ,`USERNAME` ,`NAME`, `STATUS`, `DOB`, `EMAIL`, `MODE`, `JOINDATE`, `VALIDITY`)  values (".$accID." ,'".$username."','".$fullname."','".$status."','".$dob."','".$email."','Free','".date("Y-m-d")."','INVALID')";
        }
        else if ($status=="Chief") {
            $query = "insert into chiefaccounts (`ACCID` ,`USERNAME` ,`NAME`, `STATUS`, `DOB`, `EMAIL`, `JOINDATE`, `VALIDITY`)  values (".$accID." ,'".$username."','".$fullname."','".$status."','".$dob."','".$email."','".date("Y-m-d")."','VALID')";
        }
            
            $getResult = executeNonQuery($query);
            return $getResult;
        }

        function visitorSubmitCodeFromDB($user, $code){
            $query = "select * from logininfo";
            $getResult = executeNonQuery($query);
            $haveID=false;
            $Result="false";
            $userId="";
            $status="";

            if(mysqli_num_rows($getResult)>0){
        
            while($row=mysqli_fetch_assoc($getResult)){
            if ($user==$row['USERNAME'] || $user==$row['ACCID']) 
            {
                $haveID=true;
                if ($row['SECRETQUEANS']=="") {
                    $Result = "You Did not set your Secret Code Yet. Try via Email";
                }
                else if ($code==$row['SECRETQUEANS']) {
                    
                    if ($row['VALIDITY']=="VALID") 
                    {
                        $userId = $row['ACCID'];
                        $status = $row['STATUS'];
                        $Result = "true";
                    }
                    else{
                        $Result = "Sorry You are INVALID User";
                    }
                }
                else{
                    $Result = "INCORRECT CODE! Try Again..";
                }

            }
        }

        if ($haveID==false) {
            $Result="INCORRECT ID OR USERNAME";
        }

        return array($Result, $userId, $status);

    }

     }

     function sendingMailTO($to, $subject, $message)
        {
        $headers = 'From: hirehatcontact@gmail.com';
        mail($to, $subject, $message, $headers);
        }

     function resetPasswordFromDB($userId, $resetPassword){
        $query = "UPDATE `logininfo` SET `PASSWORD`='".$resetPassword."' WHERE ACCID=".$userId." or USERNAME='".$userId."'";
        $getResult = executeNonQuery($query);
        return $getResult;
     }

     function getUserEmailAdd($userId, $status){
        $sql="";
        $email="false";
        if ($status=="Admin") {
           $sql="SELECT * from adminaccounts WHERE ACCID=".$userId;
        }else if ($status=="Chief") {
            $sql="SELECT * from chiefaccounts WHERE ACCID=".$userId;
        }else if ($status=="Staff") {
            $sql="SELECT * from staffaccounts WHERE ACCID=".$userId;
        }
         $getResult = executeNonQuery($sql);

         if(mysqli_num_rows($getResult)>0){
        
            while($row=mysqli_fetch_assoc($getResult)){
                $email=$row['EMAIL'];
            }
        }
        return $email;
     }


     function getThisUserPassFromDB($userId)
     {
            $query = "SELECT * from logininfo WHERE ACCID=".$userId;
            $getResult = executeNonQuery($query);
            $Result="";
            if(mysqli_num_rows($getResult)>0){
            $row=mysqli_fetch_assoc($getResult);
            $getResult=$row['PASSWORD'];
            }
            return $getResult;
     }

     function sendingFeedbackEmailFromDB($text, $email){
        $subject="Feedback";
        //sendingMailTO($email, $subject, $text);
     }


     function sendPassRestLinkViaEmail($user){
            $query = "select * from logininfo";
            $getResult = executeNonQuery($query);
            $haveID=false;
            $Result="false";
            $userId="";
            $status="";
            $secretAns="";
            $email="";
            $subject="PASSWORD RESET LINK - hireHAT";
            $message="";

            if(mysqli_num_rows($getResult)>0){
        
            while($row=mysqli_fetch_assoc($getResult)){
            if ($user==$row['USERNAME'] || $user==$row['ACCID']) 
            {
                $haveID=true;
                    
                    if ($row['VALIDITY']=="VALID") 
                    {
                        $userId = $row['ACCID'];
                        $status = $row['STATUS'];
                        $password = $row['PASSWORD'];
                        $userName=$row['USERNAME'];
                        if (getUserEmailAdd($userId, $status)!="false") {
                            $email=getUserEmailAdd($userId, $status); 
                        }
                        $message="<a href='http://localhost/HireHAT/app/view/visitor/visitor_resetPassword_view.php?userName=".$userName."&userId=".$userId."&key=".md5($password)."'>Click Here To Reset Password</a> \n Ignore If you are not an user of hireHAT.";
                        echo $email;
                        echo $message;
                        //sendingMailTO($email, $subject, $message);
                        $Result = "true";
                    }
                    else{
                        $Result = "INVALID";
                    }
            }
        }

        if ($haveID==false) {
            $Result="INCORRECT ID OR USERNAME";
        }
    
            }
            return $Result;
     }

?>