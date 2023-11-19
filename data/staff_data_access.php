<?php require_once(APP_ROOT."/lib/helper/data_conn_helper.php") ?>


<?php
function getStaffProfileFromDB($getID){
        $query = "select * from staffaccounts where  ACCID =".$getID;
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


    function staffUpdateProfileToDB($getID, $fullname,$gender,$maritalstatus, $email, $address, $phonenumber, $picture)
    {
         $query = "UPDATE staffaccounts SET NAME='$fullname', GENDER='$gender', EMAIL='$email', PHONE='$phonenumber', ADDRESS='$address', PHOTO='$picture', MARITALSTATUS='$maritalstatus' WHERE ACCID=".$getID;

        $getResult = executeNonQuery($query);
       getStaffProfileFromDB($getID);
       return $getResult;
    }


        function changePasswordFromDB($getID,$cPass, $rePass){
            
        $query = "select PASSWORD from logininfo  where ACCID=$getID";
        $getResult = executeNonQuery($query);
        $Result="NotSuccess";
         
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


function staffSearchResultFromDB($user)
{
        $sql = "select ACCID,USERNAME,STATUS from logininfo where STATUS in('chief','staff') and (ACCID LIKE'%".$user."%' or USERNAME LIKE'%".$user."%')";

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
                
                <td style='width: 33%' onclick='getDetails(this)' class="detailsbutt" ><?php echo $row['ACCID'] ?></td>
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

function staffJobSearchResultFromDB($user)
{
    
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
                
                <td style="width: 20%" id="jobDetails" onclick="getJobDetails(this,0)" ><?php echo $row['JOBID'] ?></td>
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








function staffSearchDetailsFromDB($user)
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
    <hr>
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
function staffJobSearchDetailsFromDB($user,$applied)
{
    
    $sql = "select * from JOB WHERE JOBID=".$user;
      
       $result = executeNonQuery($sql);
    
       if(mysqli_num_rows($result)>0){
      
        while ($row = mysqli_fetch_assoc($result)) 
    {   

?>  
    
    <div style="text-align: left;margin-top: 40px;">    
    <div class='divJobDetail'>JOBID     :<?php echo $row['JOBID'] ?></br></br></div>
    
    <div class='divJobDetail'><span>TITLE     :<?php echo $row['TITLE'] ?></br></br></span></div>
    <div class='divJobDetail'><span>PUBLISHED BY    :<?php echo $row['PUBLISHED_BY_ACCID'] ?></br></br></span></div>
    <div class='divJobDetail'><span>DESIGNATION    :<?php echo $row['DESIGNATION'] ?></br></br></span></div> 
    <div class='divJobDetail'><span>VACANCY    :<?php echo $row['VACANCY'] ?></br></br></span></div>
    <div class='divJobDetail'><span>SALARY    :<?php echo $row['SALARY'] ?></br></br></span></div>
    <div class='divJobDetail'><span>LOCATION   :<?php echo $row['LOCATION'] ?></br></br></span></div>
    <div class='divJobDetail'><span>PUBLISHED DATE   :<?php echo $row['PUBLISHED_DATE'] ?></br></br></span></div>
    <div class='divJobDetail'><span>LAST DAY TO APPLY    :<?php echo $row['LAST_APPLY_DATE'] ?></br></br></span></div>
     
     <hr>
<?php
if($applied==0)
{
?>     <a class="butt" href="../../controller/staff_controller.php?status=staff&AjaxView=apply&&jobId=<?php echo $row['JOBID'] ?>" >Apply</a>           
            
    </div>


<?php
}
    }   

    }
    else{
        $Result= "No result found!";
    }
}
 function staffJobApplyDB($jobId,$userId)
 {

    $sql = "select ACCID from job_applied where JOBID=".$jobId;
    $result = executeNonQuery($sql);
    $row = mysqli_fetch_assoc($result);
    $ACCID=$row['ACCID'];
    if($userId==$ACCID){
       return 0;
    }
    else{
    $sql = "select APPLIED_COUNTER from job where JOBID=".$jobId;
    $result = executeNonQuery($sql);
    $row = mysqli_fetch_assoc($result);
    $totalApplied=$row['APPLIED_COUNTER'] + 1;
    $dat=date("d/m/y");

    $query = "UPDATE `job` SET `APPLIED_COUNTER`=".$totalApplied." WHERE JOBID=".$jobId;
    $getResult = executeNonQuery($query);

    $queryLogininfo = "INSERT INTO job_applied(`APPLIEDID`, `JOBID`,`APPLIED_BY_STATUS`, `ACCID`, `APPLIED_DATE`, `CONFIRMATION`, `CONFIRMBYACCID`) VALUES ('',$jobId,'Staff',$userId,'$dat','Not Yet',0 )";
        
        $getResult = executeNonQuery($queryLogininfo);
        return 1;
}


 }

function staffJobPostFromDB()
{        
        $sql = "select JOBID,TITLE,DEPARTMENT,LOCATION,TYPE from JOB where VACANCY>0 order by JOBID DESC";
        $result = executeNonQuery($sql);
        $data=array();
       if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['JOBID']] =array('TITLE' =>$row['TITLE'],'DEPARTMENT' =>$row['DEPARTMENT'],'TYPE'=>$row['TYPE']);
        }
        

        return $data;

 }
 else{
    return 'false';
 }
}
function staffJobAppliedFromDB($userId)
{        
        $sql = "select a.JOBID,a.TITLE,a.DEPARTMENT,a.LOCATION,b.APPLIED_DATE,b.CONFIRMATION,b.CONFIRMBY_ACC_STATUS from JOB a,job_applied b where a.JOBID=b.JOBID and ACCID=".$userId." order by JOBID DESC";
        $result = executeNonQuery($sql);
        $data=array();
       if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['JOBID']] =array('TITLE' =>$row['TITLE'],'DEPARTMENT' =>$row['DEPARTMENT'],'TYPE'=>$row['TYPE'],'DATE'=>$row['APPLIED_DATE'],'CONFIRMATION'=>$row['CONFIRMATION'],'CONFIRMATIONBY'=>$row['CONFIRMBY_ACC_STATUS']);
        }
        

        return $data;

 }
 else{
    return 'false';
 }
}
function staffNoticeFromDB($userId)
{        
        $sql = "select * from notice where TO_TYPE='to_public' order by NOTICEID DESC";
        $result = executeNonQuery($sql);
        $data=array();
       if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['NOTICEID']] =array('TITLE' =>$row['TITLE'],'NOTICE' =>$row['NOTICE'],'FROM_ACCID'=>$row['FROM_ACCID'],'DATE'=>$row['DATE'],'TIME'=>$row['TIME']);
        }
        

        return $data;

 }
 else{
    return 'false';
 }
}
function staffUpdateCodeToDB($staffId, $recode){
        $query = "UPDATE `logininfo` SET `SECRETQUEANS`='".$recode."' WHERE ACCID=".$staffId;
        $getResult = executeNonQuery($query);
        return $getResult;
    }
 
function staffRequestDetailsFromDB($userId)
{
      $sql = "select * from job_applied where CONFIRMATION='Not Yet' and APPLIED_BY_STATUS='Chief' and ACCID=".$userId." order by APPLIEDID DESC";
        $result = executeNonQuery($sql);
        $data=array();
       if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['APPLIEDID']] =array('JOBID' =>$row['JOBID'],'DATE'=>$row['APPLIED_DATE']);
        }
        

        return $data;

 }
 else{
    return 'false';
 }

}
 function staffJobAcceptFromDB($appliedId,$userId,$jobId)
 {
   $sql= "UPDATE `job_applied` SET `CONFIRMATION`='Confirmed',`CONFIRMBYACCID`=".$userId.",`CONFIRMBY_ACC_STATUS`='Staff' WHERE APPLIEDID=".$appliedId;
    $result = executeNonQuery($sql);
    $quary= "select PUBLISHED_BY_ACCID from job where JOBID=".$jobId;
    $result = executeNonQuery($quary);
    $row = mysqli_fetch_assoc($result);
    $ACCID=$row['PUBLISHED_BY_ACCID'];
    $dat=date("Y-m-d");
   $sql = "INSERT INTO `hire`(`HIREID`, `JOBID`, `ACCID`, `DATE`, `HIERDBYACCID`) VALUES('',$jobId,$userId,$dat,$ACCID)";
       $getResult = executeNonQuery($sql);
    }

    function showTeamNoticeFromDB($userId){
        $data="";
         $sql = 'SELECT * FROM hire h, notice n WHERE n.FROM_ACCID=h.HIERDBYACCID AND n.TO_TYPE="to_team" AND h.HIERDBYACCID IN (SELECT h.HIERDBYACCID WHERE h.ACCID='.$userId.') GROUP BY h.JOBID';
        $result = executeNonQuery($sql);
        $data=array();
       if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['NOTICEID']] =array('TITLE' =>$row['TITLE'],'NOTICE' =>$row['NOTICE'],'FROM_ACCID'=>$row['FROM_ACCID'],'DATE'=>$row['DATE'],'TIME'=>$row['TIME']);
        }
        return $data;
    }else{
        return 'false';
        
    }
    }

    


function setLoginRecordToDB($userId){
        $query="SELECT l.*, c.ACCID, c.GENDER, c.NAME, c.EMAIL, c.STATUS FROM logininfo l, staffaccounts c WHERE l.ACCID=c.ACCID and c.ACCID=".$userId;
        $getResult = executeNonQuery($query);
        
        $row=mysqli_fetch_assoc($getResult);
            $userName = $row['USERNAME'];
            $gender = $row['GENDER'];
            $email = $row['EMAIL'];
            $name = $row['NAME'];

        $query="INSERT INTO loginrecord (ACCID, STATUS, USERNAME, NAME, GENDER, EMAIL, DATE, TIME) VALUES ('".$userId."','Staff','".$userName."','".$name."','".$gender."','".$email."','".date("Y-m-d")."','".date("h:i:sa")."')";
            $getResult = executeNonQuery($query);
            return $getResult;
     }
    function staffJobRejectFromDB($appliedId,$userId)
    {
        $sql= "UPDATE `job_applied` SET `CONFIRMATION`='Reject' WHERE APPLIEDID=".$appliedId;
      $result = executeNonQuery($sql);

    }
    function staffPaymentDetailsFromDB($userId)
{
      $sql = "select * from TRANSACTION where ACCID=".$userId." order by TRANSACTIONID DESC";
        $result = executeNonQuery($sql);
        $data=array();
       if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['TRANSACTIONID']] =array('RECIEVE' =>$row['U_RECIEVE'],'BONUS'=>$row['EXTRA_BONUS'],'JOBID'=>$row['JOBID'],'PAYEDBY'=>$row['PAIEDBYACCID'],'DATE'=>$row['DATE']);
        }
        

        return $data;

 }
 else{
    return 'false';
 }

}

 function staffTeamDetailsFromDB($userId)
{
      $sql = "select * from team_member a,team b where a.TEAMID=b.TEAMID and a.ACCID=".$userId;
        $result = executeNonQuery($sql);
        $data=array();
       if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['TEAMID']] =array('JOINDATE' =>$row['JOINDATE'],'VALIDITY'=>$row['VALIDITY'],'STATUS'=>$row['STATUS'],'CREATEDBY'=>$row['CREATED_BY_ACCID'],'TEAMNAME'=>$row['T_NAME'],'DESCRIPTION'=>$row['DESCRIPTION']);
        }
        

        return $data;

 }
 else{
    return 'false';
 }

}
function staffTeamSearchDetailsFromDB($user)
{
    
    $sql = "select * from team_member WHERE TEAMID=".$user;
      
       $result = executeNonQuery($sql);
    
       if(mysqli_num_rows($result)>0){
      
        while ($row = mysqli_fetch_assoc($result)) 
    {   

?>  
    
    <div style="text-align: left;margin-top: 40px;">    
    <div class='divJobDetail'>Member Id    :<?php echo $row['ACCID'] ?></br></br></div>
    
     
     <hr>

<?php

    }   

    }
    else{
        $Result= "No result found!";
    }
}
function staffSendMessagesToDB($fromID, $toID, $title, $messages){
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
?>



