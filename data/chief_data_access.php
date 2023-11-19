<?php require_once(APP_ROOT."/lib/helper/data_conn_helper.php") ?>

<?php

	function getChiefProfileFromDB($getID){
		$query = "select * from chiefaccounts where ACCID =".$getID;
		$getResult = executeNonQuery($query);

		if(mysqli_num_rows($getResult)>0){
        
        while($row=mysqli_fetch_assoc($getResult)){
            $_SESSION['accID'] = $row['ACCID'];
            $_SESSION['userName'] = $row['USERNAME'];
            $_SESSION['fullName'] = $row['NAME'];
            $_SESSION['status'] = $row['STATUS'];
            $_SESSION['gender'] = $row['GENDER'];
            $_SESSION['dob'] = $row['DOB'];
            $_SESSION['phone'] = $row['PHONE'];
            $_SESSION['email'] = $row['EMAIL'];
            $_SESSION['maritalStatus'] = $row['MARITALSTATUS'];
            $_SESSION['address'] = $row['ADDRESS'];  
            $_SESSION['photo']=$row['PHOTO']; 
        }
    }

	}

    function setLoginRecordToDB($userId){
        $query="SELECT l.*, c.ACCID, c.GENDER, c.NAME, c.EMAIL, c.STATUS FROM logininfo l, chiefaccounts c WHERE l.ACCID=c.ACCID and c.ACCID=".$userId;
        $getResult = executeNonQuery($query);
        
        $row=mysqli_fetch_assoc($getResult);
            $userName = $row['USERNAME'];
            $gender = $row['GENDER'];
            $email = $row['EMAIL'];
            $name = $row['NAME'];

        $query="INSERT INTO `loginrecord`(`ACCID`, `STATUS`, `USERNAME`, `NAME`, `GENDER`, `EMAIL`, `DATE`, `TIME`) VALUES ('".$userId."','Chief','".$userName."','".$name."','".$gender."','".$email."','".date("Y-m-d")."','".date("h:i:sa")."')";
            $getResult = executeNonQuery($query);
            return $getResult;
     }

    function chiefRemoveStaffTeamFromFB($staffId, $teamId){
        $query = "DELETE FROM `team_member` WHERE ACCID=".$staffId." and TEAMID=".$teamId;
        $getResult = executeNonQuery($query);
        return $getResult;
    }

    function chiefSendMessagesToDB($fromID, $toID, $title, $messages){
        $query="";
        if (is_numeric($toID)) {
            $query="select * from logininfo where ACCID=".$toID;   
        }else{
            $query="select * from logininfo where USERNAME='".$toID."'";
        }       
        $getResult = executeNonQuery($query);
        if (mysqli_num_rows($getResult)!=0) {
            $row=mysqli_fetch_assoc($getResult);
            $status=$row['STATUS'];
           $query = "INSERT INTO `notice`(`TITLE`, `NOTICE`, `FROM_ACCID`, `TO_ACCID`, `TO_TYPE`, `DATE`, `TIME`) VALUES ('".$title."','".$messages."',".$fromID.",".$toID.", 'to_".$status."','".date("Y-m-d")."','".date("h:i:sa")."')";
             $getResult = executeNonQuery($query);
            $result = "true";
        }else{
            $result = "false";
        }
        return $result;
    }

    function showAllMessagesFromDB($userId){
        $query= 'SELECT * FROM `notice` WHERE TO_TYPE!="to_team" AND TO_TYPE!="to_public" AND FROM_ACCID='.$userId.' or TO_ACCID='.$userId;
        $getResult = executeNonQueryArray($query);
        return $getResult;
    }

    function showHighRatedStaffFromDB(){
        $query= 'SELECT s.ACCID, s.NAME, s.GENDER, s.JOINDATE, s.MODE, SUM(r.RATE)/COUNT(r.ACCID) AS RATTING FROM ratting r, staffaccounts s WHERE r.ACCID=s.ACCID GROUP BY r.ACCID ORDER BY RATTING DESC';
        $getResult = executeNonQueryArray($query);
        return $getResult;
    }

    function showPublicNoticeFromFB(){
        $query= "SELECT n.*, a.NAME FROM notice n, adminaccounts a WHERE n.FROM_ACCID=a.ACCID and n.TO_TYPE='to_public'";
        $getResult = executeNonQueryArray($query);
        return $getResult;
    }

    function showTeamNoticeFromDB($chiefId, $teamId){
         $query= "SELECT n.*, t.T_NAME, t.TEAMID FROM notice n, team t WHERE t.TEAMID=n.TO_ACCID and n.TO_TYPE='to_team' and n.FROM_ACCID=".$chiefId." and n.TO_ACCID=".$teamId;
        $getResult = executeNonQueryArray($query);
        return $getResult;

    }

    function chiefRemoveStaffFromFB($staffId, $chiefId){
        $query = "DELETE FROM team_member WHERE TEAMID=(SELECT TEAMID FROM team WHERE CREATED_BY_ACCID=".$chiefId.") and ACCID=".$staffId;
        $getResult = executeNonQuery($query);
        $query = "DELETE FROM hire WHERE ACCID=".$staffId." and HIERDBYACCID=".$chiefId;
        $getResult = executeNonQuery($query);
        return $getResult;
    }

    function chiefUpdateCodeToDB($chiefId, $recode){
        $query = "UPDATE `logininfo` SET `SECRETQUEANS`='".$recode."' WHERE ACCID=".$chiefId;
        $getResult = executeNonQuery($query);
        return $getResult;
    }

    function chiefbanStaffTeamFromDB($staffId, $teamId){
        $query = "UPDATE `team_member` SET `VALIDITY`='INVALID' WHERE ACCID=".$staffId." and TEAMID=".$teamId;
        $getResult = executeNonQuery($query);
        return $getResult;
    }

    function chiefUnbanStaffTeamFromDB($staffId, $teamId){
        $query = "UPDATE `team_member` SET `VALIDITY`='VALID' WHERE ACCID=".$staffId." and TEAMID=".$teamId;
        $getResult = executeNonQuery($query);
        return $getResult;
    }

    function showManageTeamFromDB($chiefId){
        $query= "SELECT s.ACCID, s.NAME, t.TEAMID, t.T_NAME, m.VALIDITY, m.JOINDATE FROM team t, team_member m, staffaccounts s WHERE t.CREATED_BY_ACCID=".$chiefId." and m.TEAMID=t.TEAMID and m.ACCID=s.ACCID";
        $getResult = executeNonQueryArray($query);
        return $getResult;
    }

    function chiefRateStaffToDB($chiefId, $staffId, $RateValue){
        $query1= "SELECT * FROM `ratting` WHERE ACCID=".$staffId." and RATEDBYACCID=".$chiefId;
        $getResult1 = executeNonQuery($query1);
         if (mysqli_num_rows($getResult1)==0) {
            $query = "INSERT INTO `ratting`(`ACCID`, `STATUS`, `RATEDBYACCID`, `RATE`, `COMMENT`, `DATE`) VALUES (".$staffId.", 'Staff',".$chiefId.",".$RateValue.",'blank','".date("Y-m-d")."')";
            $getResult = executeNonQuery($query);
            return $getResult;
        }else{
            $query = "UPDATE `ratting` SET `RATE`=".$RateValue." WHERE ACCID=".$staffId." and RATEDBYACCID=".$chiefId;
            $getResult = executeNonQuery($query);
            return $getResult;
        }
    }

    function showTransactionHistoryFromDB($userId){
    $query = "SELECT s.ACCID, s.NAME, t.TRANSACTIONID, t.U_PAY, t.EXTRA_BONUS, t.JOBID, t.DATE FROM transaction t, staffaccounts s, hire h WHERE s.ACCID=h.ACCID and h.HIERDBYACCID=t.PAIEDBYACCID and t.PAIEDBYACCID=".$userId;
    $resultArray = executeNonQueryArray($query);
    return $resultArray;
    }

    function chiefAddStaffToTeamDB($teamId, $staffId){
        $query1= "SELECT * FROM `team_member` WHERE TEAMID=".$teamId." and ACCID=".$staffId;
        $getResult1 = executeNonQuery($query1);
         if (mysqli_num_rows($getResult1)==0) {
            $query = "INSERT INTO `team_member`(`TEAMID`, `ACCID`, `JOINDATE`, `VALIDITY`, `STATUS`) VALUES (".$teamId.",".$staffId.",'".date("Y-m-d")."', 'VALID', 'ACTIVE')";
            $getResult = executeNonQuery($query);

            return $getResult;
        }else{
            return "false";
        }
     
    }



    function chiefCreateTeamToDB($teamName, $teamDesciption, $chiefId){
            $query = "INSERT INTO `team`(`T_NAME`, `DESCRIPTION`, `CREATED_DATE`, `CREATED_BY_ACCID`) VALUES ('".$teamName."','".$teamDesciption."','".date("Y-m-d")."',".$chiefId.")";
            $getResult = executeNonQuery($query);
            return $getResult;
    }

    function chiefDeleteTeamFromDB($teamId){
        $query = "DELETE FROM `team` WHERE TEAMID=".$teamId;
        $getResult = executeNonQuery($query);
        return $getResult;
    }

    function chiefsendTeamNoticeFromDB($noticeTitle, $noticeDetails, $chiefId, $teamID){
        $query = "INSERT INTO `notice`(`TITLE`, `NOTICE`, `FROM_ACCID`, `TO_ACCID`, `TO_TYPE`, `DATE`, `TIME`) VALUES ('".$noticeTitle."','".$noticeDetails."',".$chiefId.",".$teamID.", 'to_team','".date("Y-m-d")."','".date("h:i:sa")."')";
        $getResult = executeNonQuery($query);
        return $getResult;
    }

    function chiefUpdateTeamToDB($teamId, $teamName, $teamDesciption){
        $query = "UPDATE team SET T_NAME='$teamName', DESCRIPTION='$teamDesciption' WHERE TEAMID=".$teamId;
        $getResult = executeNonQuery($query);
        return $getResult;
    }

    function deleteThisNoticeFromDB($noticeId){
         $query = "DELETE FROM `notice` WHERE NOTICEID=".$noticeId;
        $getResult = executeNonQuery($query);
        return $getResult;
    }

    function changePasswordFromDB($getID,$cPass, $rePass){
            
        $query = "select PASSWORD from logininfo  where ACCID=$getID";
        $getResult = executeNonQuery($query);
        $Result="notMatched";
         
        if(mysqli_num_rows($getResult)>0){
        
        while($row=mysqli_fetch_assoc($getResult)){
           $p=$row['PASSWORD'];
            
            if ($cPass==$row['PASSWORD']) {
             
             $query = "update logininfo set PASSWORD='$rePass' where ACCID=$getID";
             $getResult = executeNonQuery($query);
             $Result="Success";
                return $Result;
            }
        }

        return  $Result;
    }
    else{
        $Result= "Result not found!";
    }

        return $result;                        

    } 

    function cheifAcceptJobReqToDB($jobid, $staffId, $cheifId){
        $query = "UPDATE staffaccounts SET MODE='Hired' WHERE ACCID=".$staffId;
        $getResult = executeNonQuery($query);
        $query = "UPDATE job_applied SET CONFIRMATION='Confirmed', CONFIRMBYACCID=".$cheifId.", CONFIRMBY_ACC_STATUS='Chief' WHERE JOBID=".$jobid." and ACCID=".$staffId;
        $getResult = executeNonQuery($query);
        if ($getResult) {
            $query = "INSERT INTO `hire`(`JOBID`, `ACCID`, `DATE`, `HIERDBYACCID`) VALUES (".$jobid.",".$staffId.",'".date("Y-m-d")."',".$cheifId.")";
            $getResult = executeNonQuery($query);
            return $getResult;
        }else{
            return false;
        }
    }

     function cheifRejectJobReqToDB($jobid, $staffId, $cheifId){
        $query = "UPDATE job_applied SET CONFIRMATION='Rejected', CONFIRMBYACCID=".$cheifId.", CONFIRMBY_ACC_STATUS='Cheif' WHERE JOBID=".$jobid." and ACCID=".$staffId;
        $getResult = executeNonQuery($query);
        return $getResult;
    }

    function checkIfAppliedHireSameStaffFromDB($jobID, $staffID){
        $query = "select * from job_applied";
        $getResult = executeNonQuery($query);

        if(mysqli_num_rows($getResult)>0){
        
        while($row=mysqli_fetch_assoc($getResult)){
            if ($row['JOBID']==$jobID && $row['ACCID']==$staffID && $row['APPLIED_BY_STATUS']=='Chief') {
                return "false";
            }
        }
        return "true";
        }
    }

    function showCreatedTeamFromDB($chiefId){
    $query = "SELECT * FROM team WHERE CREATED_BY_ACCID=".$chiefId;
    $resultArray = executeNonQueryArray($query);
    return $resultArray;
    }

    function showSelectedTeamFromDB($teamID){
        $query = "SELECT * FROM team WHERE TEAMID=".$teamID;
        $resultArray = executeNonQueryArray($query);
        return $resultArray;
    }

    function showAppliedJobRequestFromDB($accid){
    $query = "SELECT ja.* FROM job_applied ja, job j WHERE j.PUBLISHED_BY_ACCID=".$accid." and ja.JOBID=j.JOBID and ja.CONFIRMATION='Not Yet'";
    $resultArray = executeNonQueryArray($query);
    return $resultArray;
    }

    function showHiredStaffFromDB($accid){
    $query = "SELECT h.*, s.NAME FROM  hire h, staffaccounts s WHERE s.ACCID=h.ACCID and h.HIERDBYACCID=".$accid;
    $resultArray = executeNonQueryArray($query);
    return $resultArray;
    }


    function chiefUpdateProfileToDB($getID, $fullname, $gender, $maritalstatus, $email, $address, $phonenumber, $picture)
    {
        $query = "UPDATE chiefaccounts SET NAME='$fullname', GENDER='$gender', EMAIL='$email', PHONE='$phonenumber', ADDRESS='$address', PHOTO='$picture', MARITALSTATUS='$maritalstatus' WHERE ACCID=".$getID;

        $getResult = executeNonQuery($query);
       getChiefProfileFromDB($getID);
       return $getResult;
    }

        function chiefUpdateJobToDB($jobid, $jobTitle, $jobDetails, $designation, $Jobtype, $dept, $vacancy, $experience, $education, $gender,  $age, $jobLocation, $lastDate, $salaryType, $salary)
    {
        $query = "UPDATE job SET TITLE='$jobTitle', DETAILS='$jobDetails', DESIGNATION='$designation', TYPE='$Jobtype', DEPARTMENT='$dept', VACANCY='$vacancy', EXPERIENCE='$experience', EDUCATION='$education', GENDER='$gender', AGE='$age', LOCATION='$jobLocation', LAST_APPLY_DATE='$lastDate', LAST_EDITED_DATE='".date("Y-m-d")."', SALARY_TYPE='$salaryType', SALARY=$salary WHERE JOBID=".$jobid;

        $getResult = executeNonQuery($query);
        getAJobFromDB($jobid);
        //echo $_SESSION['salaryType'];
        return $getResult;
    }



    function chiefpaySalaryToStaffToDB($chiefId, $staffId, $paidAmount, $exPaidAmount, $jobId){
        $query = "SELECT * FROM `transaction` WHERE ACCID=".$staffId." and JOBID=".$jobId." and PAIEDBYACCID=".$chiefId;
        $getResult = executeNonQuery($query);
        if(mysqli_num_rows($getResult)==0){
        $U_REC=$paidAmount + $exPaidAmount;
        $query="INSERT INTO `transaction`(`ACCID`, `U_RECIEVE`, `U_PAY`, `EXTRA_BONUS`, `JOBID`, `PAIEDBYACCID`, `DATE`) VALUES (".$staffId.", ".$U_REC.", ".$paidAmount.", ".$exPaidAmount.",".$jobId.", ".$chiefId.",".date("Y-m-d").")" ;
            $getResult = executeNonQuery($query);
           return $getResult;
        }else{
            return "false";  
        }
    }        


        function chiefPublishJobToDB($jobTitle, $jobDetails, $designation, $Jobtype, $dept, $vacancy, $experience, $education, $gender,  $age, $jobLocation, $lastDate, $salaryType, $salary)
    {
        $query = "INSERT INTO `job`(`TITLE`, `DETAILS`, `DESIGNATION`, `STATUS`, `TYPE`, `DEPARTMENT`, `VACANCY`, `EXPERIENCE`, `EDUCATION`, `GENDER`, `AGE`, `LOCATION`, `PUBLISHED_DATE`, `LAST_APPLY_DATE`, `SALARY_TYPE`, `SALARY`, `PUBLISHED_BY_ACCID`, `APPLIED_COUNTER`) VALUES ('".$jobTitle."','".$jobDetails."','".$designation."','ACTIVE','".$Jobtype."','".$dept."','".$vacancy."' ,'".$experience."' ,'".$education."' ,'".$gender."' ,'".$age."','".$jobLocation."','".date("Y-m-d")."' ,'".$lastDate."','".$salaryType."',".$salary.",".$_SESSION["userId"].",0)";

        $getResult = executeNonQuery($query);
        return $getResult;
    }

    function deleteAJobFromDB($jobid){
        $query = "DELETE FROM `job` WHERE JOBID=".$jobid;
        $getResult = executeNonQuery($query);
        return $getResult;
    }

    function getAStaffFromDB($accID){
        $query = "SELECt s.*, SUM(r.RATE)/COUNT(r.ACCID) as RATE FROM staffaccounts s, ratting r WHERE s.ACCID=r.ACCID and s.ACCID=".$accID;
        $getResult = executeNonQuery($query);

        if(mysqli_num_rows($getResult)>0){
        
        while($row=mysqli_fetch_assoc($getResult)){

            $staffDetails = array('ACCID' =>$row['ACCID'] ,'USERNAME' =>$row['USERNAME'],'NAME' =>$row['NAME'],'GENDER' =>$row['GENDER'],'DOB' =>$row['DOB'],'EMAIL' =>$row['EMAIL'],'PHONE' =>$row['PHONE'],'ADDRESS' =>$row['ADDRESS'],'MODE' =>$row['MODE'],'JOINDATE' =>$row['JOINDATE'],'PHOTO' =>$row['PHOTO'] ,'CURRENTJOBID' =>$row['CURRENTJOBID'], 'RATE' =>$row['RATE'] );
    }

    return $staffDetails;
        }
    }

    function getAJobFromDB($jobid){
        $query = "select * from job where JOBID =".$jobid;
        $getResult = executeNonQuery($query);

        if(mysqli_num_rows($getResult)>0){
        
        while($row=mysqli_fetch_assoc($getResult)){
            $_SESSION['jobID'] = $row['JOBID'];
            $_SESSION['jobTitle'] = $row['TITLE'];
            $_SESSION['jobDetails'] = $row['DETAILS'];
            $_SESSION['designation'] = $row['DESIGNATION'];
            $_SESSION['Jobtype'] = $row['TYPE'];
            $_SESSION['dept'] = $row['DEPARTMENT'];
            $_SESSION['vacancy'] = $row['VACANCY'];
            $_SESSION['experience'] = $row['EXPERIENCE'];
            $_SESSION['education'] = $row['EDUCATION'];
            $_SESSION['gender'] = $row['GENDER'];
            $_SESSION['age'] = $row['AGE'];  
            $_SESSION['jobLocation']=$row['LOCATION']; 
            $_SESSION['lastDate'] = $row['LAST_APPLY_DATE'];
            $_SESSION['salaryType'] = $row['SALARY_TYPE'];  
            $_SESSION['salary']=$row['SALARY']; 
            $_SESSION['jobStatus']=$row['STATUS']; 
        }
    }
}

    function chiefApplyHireStaffToDB($jobid, $staffAccID){
        $query = "INSERT INTO job_applied(JOBID, APPLIED_BY_STATUS, ACCID, APPLIED_DATE, CONFIRMATION) VALUES ($jobid, 'Chief' ,$staffAccID,'".date("Y-m-d")."','Not Yet')";
        $getResult = executeNonQuery($query);
        return $getResult;
    }

    function showAllJobFromDB($accID)
{

    $query = "select * from job where PUBLISHED_BY_ACCID=".$accID;
        $getResult = executeNonQuery($query);
         if(mysqli_num_rows($getResult)>0)
    {
        while ($row = mysqli_fetch_assoc($getResult))
        {
            
            ?>
            <tr>
                <td><?php echo $row['JOBID'] ?></td>
                <td><?php echo $row['TITLE'] ?></td>
                <td><?php echo $row['TYPE'] ?></td>
                <td><?php echo $row['SALARY'] ?></td>
                <td><?php echo $row['PUBLISHED_DATE'] ?></td>
                <td><?php echo $row['LAST_APPLY_DATE'] ?></td>
                <td><?php echo $row['APPLIED_COUNTER'] ?></td>
                <td> <a href="?chief_editJob&jobID=<?php echo $row['JOBID']; ?>">Edit/Delete</a></td>
            </tr>
            <?php   
        } 
    }
    else
    {
        $Result= "No result found!";
    }

    //return array($noticeId, $title, $notice, $fromAcc, $date, $time);  
}

function getPostedJobIDsFromDB($accID){
    $query = "select * from job where PUBLISHED_BY_ACCID=".$accID;
    $resultArray = executeNonQueryArray($query);
    return $resultArray;
}

function showAllStaffFromDB(){

    $query = "select * from staffaccounts";
        $getResult = executeNonQuery($query);
         if(mysqli_num_rows($getResult)>0)
    {
        while ($row = mysqli_fetch_assoc($getResult))
        {
            ?>
            <tr>
                <td><?php echo $row['NAME'] ?></td>
                <td><?php echo $row['GENDER'] ?></td>
                <td><?php echo $row['DOB'] ?></td>
                <td><?php echo $row['EMAIL'] ?></td>
                <td><?php echo $row['MODE'] ?></td>
                <td><?php echo $row['JOINDATE'] ?></td>
                <td> <a href="?chief_hireStaff&accID=<?php echo $row['ACCID']; ?>">View/Hire</a></td>
            </tr>
            <?php   
        } 
    
    }
    else
    {
        $Result= "No result found!";
    }
}

    

   function chiefSearchResultFromDB($user)
{
    if ($user=="") 
        $sql = "select ACCID,USERNAME,STATUS from logininfo where STATUS in('chief','staff') and VALIDITY='VALID'";
    else
        $sql = "select ACCID,USERNAME,STATUS from logininfo where STATUS in('chief','staff') and (ACCID LIKE'%".$user."%' or USERNAME LIKE'%".$user."%') and VALIDITY='VALID'";

    $result = executeNonQuery($sql);

    if(mysqli_num_rows($result)>0){
        echo "  </br><table style='width: 100%; margin:1px; padding: 2px; border: 1px solid black;''>
            <tr>
                <td style='width: 33%'>Account ID</td> <td style='width: 33%'>Type</td> <td style='width: 33%'>Name</td>             
            </tr></table>
";
        while ($row = mysqli_fetch_assoc($result)) 
    {   
   
?> 
 
<table style='width: 100%; margin:1px; padding: 2px; border: 1px solid black;'>
      
            <tr>
                
                <td style='width: 33%' onclick='getDetails(this)'><?php echo $row['ACCID'] ?></td>
                <td style='width: 33%' id='stat'><?php echo $row['STATUS'] ?></td>
                <td style='width: 33%'><?php echo $row['USERNAME'] ?></td>
            
            </tr>
        </table>

<?php
    }   

    }
    else{
        $Result= "No result found!";
    }
}

function chiefJobSearchResultFromDB($user)
{
    if ($user=="") 
        $sql = "select JOBID,TITLE,DEPARTMENT,LOCATION,TYPE from JOB where VACANCY>0";
    else
        $sql = "select JOBID,TITLE,DEPARTMENT,LOCATION,TYPE from JOB WHERE (JOBID LIKE'%".$user."%' or TITLE LIKE'%".$user."%' or DEPARTMENT LIKE'%".$user."%' or LOCATION LIKE'%".$user."%' or TYPE LIKE'%".$user."%') and VACANCY>0";

    $result = executeNonQuery($sql);

    if(mysqli_num_rows($result)>0){
        echo "  </br><table style='width: 100%; margin:1px; padding: 2px; border: 1px solid black;''>
            <tr>
                <td style='width: 20%'>JOB ID</td> <td style='width: 20%'>TITLE</td> <td style='width: 20%'>DEPARTMENT</td>
                <td style='width: 20%'>LOCATION</td>
                <td style='width: 20%'>TYPE</td>              
            </tr></table>
";
        while ($row = mysqli_fetch_assoc($result)) 
    {   

?>  
<table style="width: 100%; margin:1px; padding: 2px; border: 1px solid black;" id="mytable">
      
            <tr>
                
                <td style="width: 20%" id="jobDetails" onclick="getJobDetails(this)" ><?php echo $row['JOBID'] ?></td>
                <td style="width: 20%"><span id="stat"><?php echo $row['TITLE'] ?></span></td>
                <td style="width: 20%"><?php echo $row['DEPARTMENT'] ?></td>
                <td style="width: 20%"><?php echo $row['LOCATION'] ?></td>
                <td style="width: 20%"><?php echo $row['TYPE'] ?></td>
            
            </tr>
        </table>


<?php
    }   

    }
    else{
        $Result= "No result found!";
    }
}


function chiefSearchDetailsFromDB($user)
{    
    $sql = "select STATUS from logininfo where ACCID=".$user;
    $result = executeNonQuery($sql);
    $row = mysqli_fetch_assoc($result);
    $status=$row['STATUS'];
    if ($status=="Staff") 
         $sql = "select ACCID,NAME,STATUS,EMAIL,GENDER,ADDRESS,PHOTO from staffaccounts where ACCID=".$user;
    else
       $sql = "select ACCID,NAME,STATUS,EMAIL,GENDER,ADDRESS,PHOTO from chiefaccounts where ACCID=".$user;
      
       $result = executeNonQuery($sql);
    
       if(mysqli_num_rows($result)>0){
      
        while ($row = mysqli_fetch_assoc($result)) 
    {   
        echo '<div style="margin: 0 auto; padding-top: 15px;width: 100px;height: 100px;"><img style="border-radius: 50%; width: 70px; height: 70px;" src="'.$row['PHOTO'].'"></div><hr>';

?>  
    </hr>
    <span>ACCID     :<?php echo $row['ACCID'] ?></br></br></span>
    <span>NAME      :<?php echo $row['NAME'] ?></br></br></span>
    <span>STATUS    :<?php echo $row['STATUS'] ?></br></br></span>
    <span>E-MAIL    :<?php echo $row['EMAIL'] ?></br></br></span>
    <span>GENDER    :<?php echo $row['GENDER'] ?></br></br></span>
    <span>ADDRESS   :<?php echo $row['ADDRESS'] ?></br></br></span>
    

<?php
    }   

    }
    else{
        $Result= "No result found!";
    }
}


function chiefJobSearchDetailsFromDB($user)
{
    
    $sql = "select * from JOB WHERE JOBID=".$user;
      
       $result = executeNonQuery($sql);
    
       if(mysqli_num_rows($result)>0){
      
        while ($row = mysqli_fetch_assoc($result)) 
    {   

?>  
    
    <span>JOBID     :<?php echo $row['JOBID'] ?></br></br></span>
    <span>TITLE     :<?php echo $row['TITLE'] ?></br></br></span>
    <span>DESIGNATION    :<?php echo $row['DESIGNATION'] ?></br></br></span>
    <span>VACANCY    :<?php echo $row['VACANCY'] ?></br></br></span>
    <span>SALARY    :<?php echo $row['SALARY'] ?></br></br></span>
    <span>LOCATION   :<?php echo $row['LOCATION'] ?></br></br></span>   
       

<?php
    }   

    }
    else{
        $Result= "No result found!";
    }
}

?>
