<?php ob_start(); ?>
<?php
session_start();
?>

<?php
if (isset($_SESSION["userId"]) && $_SESSION['status']=="Admin")
{
//echo "<h1> Welcome Home Admin </h1>";

?>


<!DOCTYPE html>
<html>

<head>
  <title>Welcome Staff</title>
  
   <link rel="stylesheet" href="../../../lib/css/componentDesign.css">
  <link rel="stylesheet" type="text/css" href="../../../lib/css/floatWindow.css">
  <link rel="stylesheet" href="../../../lib/css/Footer-with-social-icons.css">
  <link rel="stylesheet" type="text/css" href="../../../lib/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../lib/css/Loginstyle.css">
  
  <link rel="icon" type="png" href="images/icon.png">
   
    <style type="text/css">
        table {
        border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <header >
        <div class="divFlot" >       
                    <a href="#">
                        <h1 class="logo">hireHAT</h1>
                    </a>
                <nav>
                   
                    <ul><li><a href="?admin_messages" class="hvr-underline-from-center">Messages</a></li>
                        <li><a href="?admin_security" class="hvr-underline-from-center1">Security</a></li>
                        <li><a href="?admin_profile" class="hvr-underline-from-center1">Profile</a></li>
                        <li><a href="?admin_logout" class="hvr-underline-from-center1">Logout</a></li>
                        <li style="height: 50px; width: 50px; border-radius: 50%;">
                            <?php
                            if ($_SESSION['photo']=="") {
                                  echo '<img style="border-radius:  50%; width: 40px; height: 40px;" src="../../../data/assets/img/user.png">';
                             }else if ($_SESSION['photo']!=""){
                                echo '<img style="border-radius: 50%; width: 40px; height: 40px;" src="'.$_SESSION['photo'].'">';
                             }
                             ?>
                        </li>

                    </ul>
                </nav>
            </div>     
            <style type="text/css">
                #validationError{
    color:red;
    font-size: 16px;
    font-weight: bold;
}

table, td, th {    
    border: 1px solid #ddd;
    height: 10%;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 12px;
}
            </style> 
    </header>


<!-- HOME -->

<div id="home"  style="background-color: #f1f1f1;border:none;">
<div class="divFlot" style="height:60px; margin:15px 10px 10px 10px; text-align:center; "> 
    <form >
    <span style="margin-top:20px">Search &nbsp</span>
        <input type="search" id="search"onkeyup="getSelectedData2()" size="50" style="height: 35px;margin-top: 10px;background-color:#f1f1f1;border-radius:10px 10px; " />
         <input type="radio" name="ga" id="g"  value="Person" checked>Person   
        <input type="radio" name="ga" id="gr"  value="jobs">Jobs
       
    </form>

</div>
<div id="ssidebar" style="background-color:#f1f1f1;border:none" >
         <nav class="navii">
            <a class="burger-nav">Menu</a>
             <ul>
               <div><li><a href="?admin_home" class="hvr-underline-from-center1">Home</a></li></div>
               <div ><li><a href="?admin_manageAccount" class="hvr-underline-from-center1">Manage Account</a></li></div>
               <div ><li><a href="?admin_createAdmin" class="hvr-underline-from-center1">Create Account</a></li></div>
               <div ><li><a href="?admin_editFAQ" class="hvr-underline-from-center">Edit FAQ</a></li></div>
               
               <div ><li><a href="?admin_loginRecord" class="hvr-underline-from-center1">Login Record</a></li></div>

               <div ><li><a href="?admin_postNews" class="hvr-underline-from-center1">Post News</a></li></div>
            </ul>
         </nav>



</div>



<div class="content1"  style="background-color: white;border:none">
    <div   id="dis" style="width: 100%; margin:1px; padding: 2px;height: 100%;overflow:auto;">

<form method="POST" enctype="multipart/form-data">
     
        <h5 style=" color:#333"><br/> Admin Profile</h5><br/>
        <table>
            <tr>
                <td style="padding-bottom: 3px;" colspan="2" align="center">
                    <div style="height: 80px; width: 70px;">
                    <?php
                    if (isset($_SESSION['profilePicture'])) {
                        echo '<img style="border-radius: 50%; width: 80px; height: 80px;" src="'.$_SESSION['profilePicture'].'">';
                    }else if ($_SESSION['photo']=="") {
                        echo '<img style="border-radius:  50%; width: 80px; height: 80px;" src="../../../data/assets/img/addPic.png">';
                    }else{
                        echo '<img style="border-radius:  50%; width: 80px; height: 80px;" src="'.$_SESSION['photo'].'">';
                    }

                    ?>

                    </div> <br>
                    <?php if (isset($_POST['editProfile'])) {

                    echo '<span>Change Picture</span><input style="margin-left: 5px; width: 90px; color: transparent;direction: rtl;" type="file" name="file" formaction="?admin_changePicture" accept="image/*">';
                    }
                    ?>

                </td>
            </tr>
            <tr>
                <td align="left" width="50%">Account ID :
                    <div style="margin-top: -19px; text-align: center;" > 
                        <input style="text-align: center;" type="text" value="<?=$_SESSION["accID"]?>" name="" disabled> 
                    </div>
                </td>    
    
                <td align="left" width="50%">Status :
                     <div style="margin-top: -19px; text-align: center;" >
                        <input style="text-align: center;" type="text" value="<?=$_SESSION["status"]?>" disabled> 
                    </div>
                </td>
            </tr>

             <tr>
                <td align="left"  >Full Name:
                     <div style="margin-top: -19px; text-align: center;" > 
                        <?php if (!isset($_POST['editProfile'])) {
                         echo '<input style="text-align: center;" type="text" value="'.$_SESSION["fullName"].'" disabled>';} 
                         else if (isset($_POST['editProfile'])) {
                             echo '<input style="text-align: center;" type="text" name="fullname" value="'.$_SESSION["fullName"].'" >';} ?>
                      </div>
                </td>
                <td align="left">Username :
                     <div style="margin-top: -19px; text-align: center;" > 
                        <input style="text-align: center;" type="text" value="<?=$_SESSION["userName"]?>" disabled> 
                    </div>
                </td>
            </tr>

             <tr>
                <td align="left">Gender :
                 <div style="margin-top: -19px; text-align: center;" >
                 <?php if (!isset($_POST['editProfile'])) {
                         echo '<input style="text-align: center;" type="text" value="'.$_SESSION['gender'].'" disabled>';} 
                         else if (isset($_POST['editProfile'])) {
                                 ?>
        <input type="radio" name="gender"  value="Male"  <?php echo ($_SESSION['gender']=="Male")?'checked':'' ?>>Male
        <input type="radio" name="gender"  value="Female" <?php echo ($_SESSION['gender']=="Female")?'checked':'' ?>>Female
        <input type="radio" name="gender"  value="Other" <?php echo ($_SESSION['gender']=="Other")?'checked':'' ?>>Other<br/><br/>
        <?php } ?>         
                </div>  

                </td>
                <td align="left">Date of Birth :
                 <div style="margin-top: -19px; text-align: center;" > 
                    <input style="text-align: center;" type="date" value="<?=$_SESSION["dob"]?>" disabled> </div>             
                </td>
            </tr>

           
                <td align="left">Email :
                 <div style="margin-top: -19px; text-align: center;" >
                    <?php if (!isset($_POST['editProfile'])) {
                         echo '<input style="text-align: center;" type="text" placeholder="not set yet" name="email" value="'.$_SESSION["email"].'" disabled>';} 
                         else if (isset($_POST['editProfile'])) {
                         echo '<input style="text-align: center;" type="text" name="email" value="'.$_SESSION["email"].'" >';} ?>         
                </td>
            </tr>

            <tr>
                <td align="left">Address :
                 <div style="margin-top: -19px; text-align: center;" >
                    <?php if (!isset($_POST['editProfile'])) {
                         echo '<textarea rows="4" cols="20" name="address" placeholder="not set yet" disabled>'.$_SESSION["address"].' </textarea>';} 
                         else if (isset($_POST['editProfile'])) {
                             echo '<textarea rows="4" cols="20" name="address" >'.$_SESSION["address"].' </textarea>';} ?>   

               </div>              
                </td>
                <td align="left">Phone :
                 <div style="margin-top: -19px; text-align: center;" >
                  <?php if (!isset($_POST['editProfile'])) {
                         echo '<input style="text-align: center;" type="text" placeholder="not set yet" name="phonenumber" value="'.$_SESSION["phone"].'" disabled>';} 
                         else if (isset($_POST['editProfile'])) {
                             echo '<input style="text-align: center;" type="text" name="phonenumber"  value="'.$_SESSION["phone"].'" >';} ?>    
              </div>            
                </td>
            </tr>

            <tr>
                 <td>
                    <?php
                     if (!isset($_POST['editProfile']) || isset($_POST['saveEdit'])) {
                         echo '<button name="editProfile" formaction="?admin_editProfile" style="padding: 10px 18px;">Edit Profile</button>';
                     }
                     else if (isset($_POST['editProfile'])) {
                        echo '<button name="saveEdit" value="saveEdit" formaction="?admin_saveEdit" style="padding: 10px 18px;">Save Edit</button>';
                    }
                    ?>
                     
                 </td>    
                  
            </tr>

        </table>

        <?php

        $GLOBALS['phpValidation'] ="false";

        if (isset($_POST['saveEdit'])) {
        if (isset($_POST['fullname']) && isset($_POST['email'])) {
        $fullname=trim($_POST['fullname']," ");
        $email=trim($_POST['email']," ");
        $picValid=true;

        if (!empty($_FILES['file']['name'])) {  
            echo "pic selected";
            if (checkPicture()!="true") {
                $picValid=false;
                echo '<span id="validationError">'.checkPicture().'</span>';
            }else{
                $picValid=true;
            }          
        }

        if ($fullname=="") {
            echo '<span id="validationError">Full Name Can not be empty</span>';
        }else if (checkName($_POST['fullname'])=="haveDigit") {
            echo '<span id="validationError">Full Name Can not have any digit</span>';
        }else if (checkName($_POST['fullname'])=="oneWord") {
            echo '<span id="validationError">Full Name must be more than one word</span>';
        }else if (checkName($_POST['fullname'])=="specialChar") {
            echo '<span id="validationError">Username Can not have any special character</span>';
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<span id="validationError">Please enter a Valid email</span>';
        }
        else{
            if ($picValid) {
                $GLOBALS['phpValidation'] ="true";
            }
        }
        }

        }
?>

</div>
</div>

</form>

<!-- HOME END -->




    <script src="../../../lib/js/mobile.js"></script>



</body>
</html>


<?php

}
define("APP_ROOT", "$_SERVER[DOCUMENT_ROOT]/HireHAT");
function checkName($fullname)
        {

        for ($i=0; $i<strlen($fullname) ; $i++) {     
        $a= substr($fullname, $i, 1); 
        if (is_numeric($a)) {
            return "haveDigit";
        }
        //echo "<script type='text/javascript'>alert(\"$ok \");</script>";
        }

        if(substr_count($fullname, ' ')<1){
            return "oneWord";
        }
        else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fullname)){
            return "specialChar";
        }
}

function checkPicture(){
        $file=$_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png', '' );
        if (in_array($fileActualExt, $allowed)) {
        if ($fileError===0) {
            if ($fileSize<5000000) {
                $fileNameNew = $_SESSION['userId'].".".$fileActualExt;
                $fileUploadPath= APP_ROOT."/data/assets/uploadFile/profilePicture/";
                $fileDestination = $fileUploadPath.$fileNameNew;
                $existingFile=glob ($fileUploadPath.$_SESSION['userId'].".*");
                if($existingFile) {
                foreach($existingFile as $deleteFile){ // iterate files
                if(is_file($deleteFile))
                unlink($deleteFile); // delete file
                }
            }
                move_uploaded_file($fileTmpName, $fileDestination);
                $_SESSION['profilePicture']="/HireHAT/data/assets/uploadFile/profilePicture/".$fileNameNew;
                return "true";
            }
            else
            {
                return "File Size Can't greater than 5MB!";
            }
        }
        else
        {
            return "There was an error uploading file!";
        }
        }
        else
        {
                return "Picture Format Doesn't Support! (Try to upload JPG, PNG, JPEG)";
        }


}

    $hasError = true;

    if (!isset($_SESSION["userId"]) && $_SESSION['status']!="Admin") {
        header('Location: /HireHAT/') ;
    }
    if (time()>$_SESSION['expire']) {
        session_destroy();
        header('Location: /HireHAT/') ;
    }
    else if (time()<$_SESSION['expire']) {
        $_SESSION['expire'] = $_SESSION['expire'] + (5 * 60) ;
    }

    if(count($_GET)>0){
        $key = array_keys($_GET)[0];
        $path = explode('_', $key);

        if(count($path)==2){
            $hasError = false;
             $controller = $path[0];
             $view = $path[1];

             $isDispatchedByFrontController = true;
             include_once(APP_ROOT."/app/controller/".$controller."_controller.php");
        }
    }


    if($hasError){
        include_once(APP_ROOT."/app/error.php");
    }

?>

<?php ob_end_flush(); ?>
