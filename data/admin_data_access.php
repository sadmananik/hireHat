<?php ob_start(); ?>

<?php require_once(APP_ROOT."/lib/helper/data_conn_helper.php") ?>
<?php 

    function getAdminProfileFromDB($getID){
        $query = "select * from adminaccounts where ACCID =".$getID;
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
            $_SESSION['address'] = $row['ADDRESS'];  
            $_SESSION['photo']=$row['PHOTO']; 
        }
    }

    }

    function sendingMailToUser($to, $subject, $message)
    {
    $headers = 'From: hirehatcontact@gmail.com';
    mail($to, $subject, $message, $headers);
    }

    function CreateAdminAccountToDB($fullname, $username, $email, $dob, $gender, $phonenumber, $address)
    {
        $randPassword=rand(11111111,99999999);
        $message="Dear ".$fullname.",\nYour hireHat Account Succesfully Created. Your Password is - ".$randPassword."\n You can change your password anytime.\nThank You For Joining \n From: http://localhost/HireHAT";
        $queryLogininfo = "insert into logininfo (`USERNAME` ,`PASSWORD`, `STATUS`, `VALIDITY`)  values ('".$username."','".$randPassword."','Admin', 'VALID')";
        $sql="SELECT * FROM logininfo ORDER BY ACCID DESC LIMIT 1";

        $getResult = executeNonQuery($queryLogininfo);


        $row=mysqli_fetch_assoc(executeNonQuery($sql));
        $accID=$row['ACCID'];

         $query = "insert into adminaccounts (`ACCID` ,`USERNAME` ,`NAME`, `STATUS`, `DOB`, `EMAIL`, `JOINDATE`, `VALIDITY`)  values (".$accID." ,'".$username."','".$fullname."','Admin','".$dob."','".$email."','".date("Y-m-d")."','VALID')";

            $getResult = executeNonQuery($query);

            //sendingMailToUser($email, "hireHat Account" , $message);

            return $getResult;
    }

    function adminUpdateCodeToDB($chiefId, $recode){
        $query = "UPDATE `logininfo` SET `SECRETQUEANS`='".$recode."' WHERE ACCID=".$chiefId;
        $getResult = executeNonQuery($query);
        return $getResult;
    }


    function setLoginRecordToDB($userId){
        $query="SELECT l.*, c.ACCID, c.GENDER, c.NAME, c.EMAIL, c.STATUS FROM logininfo l, adminaccounts c WHERE l.ACCID=c.ACCID and c.ACCID=".$userId;
        $getResult = executeNonQuery($query);
        
        $row=mysqli_fetch_assoc($getResult);
            $userName = $row['USERNAME'];
            $gender = $row['GENDER'];
            $email = $row['EMAIL'];
            $name = $row['NAME'];

        $query="INSERT INTO `loginrecord`(`ACCID`, `STATUS`, `USERNAME`, `NAME`, `GENDER`, `EMAIL`, `DATE`, `TIME`) VALUES ('".$userId."','Admin','".$userName."','".$name."','".$gender."','".$email."','".date("Y-m-d")."','".date("h:i:sa")."')";
            $getResult = executeNonQuery($query);
            return $getResult;
     }

    function showAllMessagesFromDB($userId){
        $query= 'SELECT * FROM `notice` WHERE TO_TYPE!="to_team" AND TO_TYPE!="to_public" AND FROM_ACCID='.$userId.' or TO_ACCID='.$userId;
        $getResult = executeNonQueryArray($query);
        return $getResult;
    }

    function adminSendMessagesToDB($fromID, $toID, $title, $messages){
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


    function adminUpdateProfileToDB($getID, $fullname, $gender, $email, $address, $phonenumber, $picture)
    {
        $query = "UPDATE adminaccounts SET NAME='$fullname', GENDER='$gender', EMAIL='$email', PHONE='$phonenumber', ADDRESS='$address', PHOTO='$picture' WHERE ACCID=".$getID;

        $getResult = executeNonQuery($query);
       getAdminProfileFromDB($getID);
       return $getResult;
    }
function validateAccountFromDB($user, $status, $type)
    {
        if ($type=="Chief") 
            $query = "UPDATE chiefaccounts SET VALIDITY='$status' WHERE ACCID=$user";
        else if ($type=="Staff") 
            $query = "UPDATE staffaccounts SET VALIDITY='$status' WHERE ACCID=$user";
        $getResult = executeNonQuery($query);
        $query = "UPDATE logininfo SET VALIDITY='$status' WHERE ACCID=$user";
        $getResult = executeNonQuery($query);
        return $getResult;
    }

function invalidateAccountFromDB($user, $status, $type)
    {
        if ($type=="Chief") 
            $query = "UPDATE chiefaccounts SET VALIDITY='$status' WHERE ACCID=$user";
        else if ($type=="Staff") 
            $query = "UPDATE staffaccounts SET VALIDITY='$status' WHERE ACCID=$user";
        $getResult = executeNonQuery($query);
        $query = "UPDATE logininfo SET VALIDITY='$status' WHERE ACCID=$user";
        $getResult = executeNonQuery($query);
        return $getResult;
    }    

function adminLoginRecordFromDB($user)
{
    if ($user=="admin" || $user=="chief" || $user=="staff") 
        $sql = "select * from loginrecord where STATUS='".$user."'";
    else
        $sql = "select * from loginrecord where ACCID LIKE'%".$user."%' or USERNAME LIKE'%".$user."%'";

    $result = executeNonQuery($sql);
    if(mysqli_num_rows($result)>0){
        echo '<table style="width: 100%; margin:1px; padding: 2px; border: 1px solid black;">
            <tr style="background: rgb(230, 235, 255);">
                <td>Record ID</td> <td>Account ID</td> <td>Type</td> <td>User Name</td> <td>Full Name</td> <td>Gender</td> <td>Email</td> <td>Date</td> <td>Time</td>         
            </tr>';
        while ($row = mysqli_fetch_assoc($result)) 
    {   

?>  
       

            <tr>
                <td><?php echo $row['LOGINRECID'] ?></td>
                <td><?php echo $row['ACCID'] ?></td>
                <td><?php echo $row['STATUS'] ?></td>
                <td><?php echo $row['USERNAME'] ?></td>
                <td><?php echo $row['NAME'] ?></td>
                <td><?php echo $row['GENDER'] ?></td>
                <td><?php echo $row['EMAIL'] ?></td>
                <td><?php echo $row['DATE'] ?></td>
                <td><?php echo $row['TIME'] ?></td> 
            </tr>
        

<?php
    }   
        echo "</table>";
    }
    else{
        $Result= "No result found!";
    }
}

function adminManageAccountFromDB($user)
{
    if ($user=="staff") 
        $sql = 'select * from staffaccounts where validity="invalid"';
    else
        $sql = 'select * from chiefaccounts where validity="invalid"';

    $result = executeNonQuery($sql);
    if(mysqli_num_rows($result)>0){
        ?>
            <table style="width: 100%; margin:1px; padding: 2px; border: 1px solid black;">
            <tr style="background: rgb(230, 235, 255);">
                <td style="width: 8%">Account ID</td> 
                <td style="width: 19%">Name</td> 
                <td style="width: 40%">Email</td> 
                <td style="width: 8%">Status</td>             
            </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) 
    {   

?>  
            <tr>
                <td><?php echo $row['ACCID'] ?></td>
                <td><?php echo $row['NAME'] ?></td>
                <td><?php echo $row['EMAIL'] ?></td>
                <td><?php echo "<a href='../../../app/controller/admin_controller.php?AjaxView=validate&accountType=".$row["STATUS"]."&user=".$row["ACCID"]."' >Validate</a>" ?></td>
            </tr>

<?php
    }   


    }
    else{
        $Result= "No result found!";
    }
}

function getNonValidatedAccFromDB($user,$type)
{
    if ($type=="staff") 
        $sql = "select * from staffaccounts where VALIDITY='invalid' and (ACCID LIKE'%".$user."%' or NAME LIKE'%".$user."%')";
    else if($type=="chief")
        $sql = $sql = "select * from chiefaccounts where VALIDITY='invalid' and (ACCID LIKE'%".$user."%' or NAME LIKE'%".$user."%')";

    $result = executeNonQuery($sql);
    if(mysqli_num_rows($result)>0){
        ?>
            <table style="width: 100%; margin:1px; padding: 2px; border: 1px solid black;">
            <tr style="background: rgb(230, 235, 255);">
                <td style="width: 8%">Account ID</td> 
                <td style="width: 19%">Name</td> 
                <td style="width: 40%">Email</td> 
                <td style="width: 8%">Status</td>             
            </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) 
    {   

?>  
            <tr>
                <td><?php echo $row['ACCID'] ?></td>
                <td><?php echo $row['NAME'] ?></td>
                <td><?php echo $row['EMAIL'] ?></td>
                <td><?php echo "<a href='../../../app/controller/admin_controller.php?AjaxView=validate&accountType=".$row["STATUS"]."&user=".$row["ACCID"]."' >Validate</a>" ?></td>
            </tr>

<?php
    }   


    }
    else{
        $Result= "No result found!";
    }
}

function showAllAccountFromDB()
{

    $query = 'select * from chiefaccounts where validity="" or validity="valid"';
    $query1 = 'select * from staffaccounts where validity="" or validity="valid"';
        $getResult = executeNonQuery($query);  
        $getResult1 = executeNonQuery($query1);    
         if(mysqli_num_rows($getResult)>0 || mysqli_num_rows($getResult1)>0)
    {
        while ($row = mysqli_fetch_assoc($getResult))
        {
            ?>
            <tr>
                <td><?php echo $row['ACCID'] ?></td>
                <td><?php echo $row['NAME'] ?></td>
                <td><?php echo $row['EMAIL'] ?></td>
                <td><?php echo $row['STATUS'] ?></td>
                <td><?php echo "<a href='../../../app/controller/admin_controller.php?AjaxView=banUser&accountType=".$row["STATUS"]."&user=".$row["ACCID"]."' >Ban User</a>" ?></td>
            </tr>
            <?php   
        } 
        while ($row = mysqli_fetch_assoc($getResult1))
        {
            ?>
            <tr>
                <td><?php echo $row['ACCID'] ?></td>
                <td><?php echo $row['NAME'] ?></td>
                <td><?php echo $row['EMAIL'] ?></td>
                <td><?php echo $row['STATUS'] ?></td>
                <td><?php echo "<a href='../../../app/controller/admin_controller.php?AjaxView=banUser&accountType=".$row["STATUS"]."&user=".$row["ACCID"]."' >Ban User</a>" ?></td>
            </tr>
            <?php   
        } 
    }
    else
    {
        $Result= "No result found!";
    }
}

function showPreviousnoticeFromDB($admin_notice)
{
     /*$noticeId[]=array();
     $title[]=array();
     $notice[]=array();
     $fromAcc[]=array();
     $date[]=array();
     $time[]=array();*/
    $query = "select * from notice where to_type='".$admin_notice."'";
        $getResult = executeNonQuery($query);
         if(mysqli_num_rows($getResult)>0)
    {
        while ($row = mysqli_fetch_assoc($getResult))
        {
            ?>
            <tr>
                <td><?php echo $row['NOTICEID'] ?></td>
                <td><?php echo $row['TITLE'] ?></td>
                <td><?php echo $row['NOTICE'] ?></td>
                <td><?php echo $row['FROM_ACCID'] ?></td>
                <td><?php echo $row['DATE'] ?></td>
                <td><?php echo $row['TIME'] ?></td>
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

function adminPostnoticeFromDB($title,$description)
{
    $noticeId=""; $toacc=0; $admin=1000;
    $nquery = "SELECT NOTICEID FROM `notice` ORDER by NOTICEID DESC";
    $NIDResult = executeNonQuery($nquery);
    if(mysqli_num_rows($NIDResult)>0)
        while ($row = mysqli_fetch_assoc($NIDResult))
            {
                $noticeId=$row['NOTICEID']+1;
                break;
            }
            echo $noticeId; echo $description; echo $title;

    $query = "INSERT into notice (NOTICEID, TITLE, NOTICE, FROM_ACCID, TO_ACCID, TO_TYPE, DATE, TIME) VALUES ('".$noticeId."','".$title."','".$description."','".$admin."','".$toacc."','to_public','".date("Y/m/d")."','".date("h:i:sa")."')";

    $result = executeNonQuery($query);
    if ($result)
        return "success";
    else
       return "error";
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
    function adminSearchResultFromDB($user)
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
function adminJobSearchResultFromDB($user)
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
                
                <td style="width: 20%" id="jobDetails" onclick="getJobDetails(this) ><?php echo $row['JOBID'] ?></td>
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

function adminSearchDetailsFromDB($user)
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
function adminJobSearchDetailsFromDB($user,$applied)
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
    <div class='divJobDetail'><span>DESIGNATION    :<?php echo $row['DESIGNATION'] ?></br></br></span></div> 
    <div class='divJobDetail'><span>VACANCY    :<?php echo $row['VACANCY'] ?></br></br></span></div>
    <div class='divJobDetail'><span>SALARY    :<?php echo $row['SALARY'] ?></br></br></span></div>
    <div class='divJobDetail'><span>LOCATION   :<?php echo $row['LOCATION'] ?></br></br></span></div>
     
     <hr>


<?php
    }   

    }
    else{
        $Result= "No result found!";
    }
}
 

 ?>

            
<?php ob_end_flush(); ?>