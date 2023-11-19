<?php ob_start(); 
session_start();
define("APP_ROOT", "$_SERVER[DOCUMENT_ROOT]/HireHAT");

if (isset($_SESSION["userId"]) && $_SESSION['status']=="Staff")
{
//echo "<h1> Welcome Home Admin </h1>";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Welcome Staff</title>
  <meta charset="utf-8">
    <link rel="stylesheet" href="../../../lib/css/profileQualification.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../lib/css/Footer-with-social-icons.css">
    <link rel="stylesheet" href="../../../lib/css/componentDesign.css">
      <link rel="stylesheet" type="text/css" href="../../../lib/css/floatWindow.css">
  <link rel="stylesheet" type="text/css" href="../../../lib/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../lib/css/Loginstyle.css">
  <link rel="icon" type="png" href="images/icon.png">
    <script src="../../../lib/js/modernizr.custom.63321.js"></script>
    <style type="text/css">

.content{
    padding: 0px;
}

#sidebar{
    height: 72%;
}
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
</head>

<body>
  <header>
    <div class="wrapper">   
                  <a href="#">
                    <h1 class="logo">hireHAT</h1>
                  </a>
                <nav>
                    <a class="burger-nav">Menu</a>
                    <ul>
                        <li><a href="?staff_changepassword" class="hvr-underline-from-center">Security</a></li>
                        <li><a href="?staff_profile" class="hvr-underline-from-center">Profile</a></li>
                        <li><a href="?staff_logout" class="hvr-underline-from-center">Logout</a></li>
                        <li style="height: 50px; width: 50px; border-radius: 50%;"><img style="width: 100%; height: auto;" src="../../../data/assets/img/head.png"></li>
                    </ul>
                </nav>
            </div>      
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
            
             <ul>
               <div ><li><a href="?staff_home" class="hvr-underline-from-center1">Home</a></li></div>
               <div ><li><a href="?staff_clan" class="hvr-underline-from-center1">Clan</a></li></div>
               <div ><li><a href="?staff_notice" class="hvr-underline-from-center1">Notice</a></li></div>
               <div ><li><a href="?staff_bidRequest" class="hvr-underline-from-center1">Bid Request</a></li></div>
               <div ><li><a href="?staff_payment" class="hvr-underline-from-center1">Payment</a></li></div>
               <div ><li><a href="?staff_job" class="hvr-underline-from-center1">Jobs</a></li></div>
            </ul>
         </nav>



</div>

<!-- Main content-->
<form method="POST" enctype="multipart/form-data">
    
<div style="background-color: white" class="content1" >
   <?php if(!isset($_POST['editQualification'])){

    ?>
    <div>
        <h5 style=" color:#333"><br/> staff Profile</h5><br/>
        <table>
            <tr>
                <td style="padding-bottom: 3px;" colspan="2" align="center">
                    <div style="height: 80px; width: 70px;">
                    <?php
                    if (isset($_SESSION['profilePicture'])) {
                        echo '<img style="border-radius: 50%; width: 80px; height: 80px;" src="'.$_SESSION['profilePicture'].'">';
                        echo '<input type="hidden" name="profilePicture" value="'.$_SESSION['profilePicture'].'">';
                    }else if (isset($_SESSION['photo'])) {
                        echo '<img style="border-radius:  50%; width: 80px; height: 80px;" src="../../../data/assets/img/user.png">';
                    }else{
                        echo '<img style="border-radius:  50%; width: 80px; height: 80px;" src="'.$_SESSION['photo'].'">';
                        echo '<input type="hidden" name="profilePicture" value="'.$_SESSION['photo'].'">';
                    }

                    ?>

                    </div> <br>
                    <?php if (isset($_POST['editProfile'])) {

                    echo '<span>Change Picture</span><input style="margin-left: 5px; width: 90px; color: transparent;direction: rtl;" type="file" name="file" formaction="?staff_changePicture" accept="image/*">';
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
        <input type="radio" name="gender"  value="Male"   <?php echo ($_SESSION['gender']=="Male")?'checked':'' ?>>Male
        <input type="radio" name="gender"  value="Female"  <?php echo ($_SESSION['gender']=="Female")?'checked':'' ?>>Female
        <input type="radio" name="gender"  value="Other" <?php echo ($_SESSION['gender']=="Other")?'checked':'' ?>>Other<br/><br/>
        <?php } ?>         
                </div>  

                </td>
                <td align="left">Date of Birth :
                 <div style="margin-top: -19px; text-align: center;" > 
                    <input style="text-align: center;" type="date" value="<?=$_SESSION["dob"]?>" disabled> </div>             
                </td>
            </tr>

            <tr>
                <td align="left">Marital Status :
                 <div style="margin-top: -19px; text-align: center;" >
                    <?php if (!isset($_POST['editProfile'])) {
                         echo '<input style="text-align: center;" placeholder="not set yet" type="text" value="'.$_SESSION["maritalStatus"].'" disabled>';} 
                         else if (isset($_POST['editProfile'])) {
                            ?>
                            <select name="maritalstatus" style="padding: 3px 30px;">
                                    
                                    <option value="Single" <?php echo ($_SESSION['maritalStatus']=="Single")?'selected':'' ?>>Single</option>
                                    <option value="Married" <?php echo ($_SESSION['maritalStatus']=="Married")?'selected':'' ?>>Married</option>
                                    <option value="Divorced" <?php echo ($_SESSION['maritalStatus']=="Divorced")?'selected':'' ?>>Divorced</option>
                                    <option value="Complecated" <?php echo ($_SESSION['maritalStatus']=="Complecated")?'selected':'' ?>>Complecated</option>
                                    </select>
                            <?php } ?>  
                </div>               
                </td>
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
                         echo '<button class="butt" name="editProfile" formaction="?staff_editProfile" style="padding: 10px 18px;">Edit Profile</button>';
                     }
                     else if (isset($_POST['editProfile'])) {
                        echo '<button class="butt" name="saveEdit" value="saveEdit" formaction="?staff_saveEdit" style="padding: 10px 18px;">Save Edit</button>';
                    }
                    ?>
                     
                 </td>    
                 <td>
                     <button class="butt" name="editQualification" formaction="?staff_editQualification" style="padding: 10px 18px;">Edit Qualification</button>
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
    echo '</div>';  }
      else{
?>

<div  style="height:500px;padding-top: 20px;overflow:auto " >
  <table>
  <tr>
    <td width="50%">Educational Qualifications</td>
    <td width="50%">Experiences               </td>
  </tr>
  <tr>
<td width="50%"><div style="text-align: left">
<input type="button" id="myBt1"   class="collapsible" value="Collage                          +">   
    <div class="content2">
    <table>
    <tr>
  <td> Name    :</td>
  <td><input  type="text" name="collName" disabled value="<?php echo $_SESSION['COLLAGE'];?>"></td>
  </tr>
  <tr>
  <td> Period :</td>
   <td><input type="text" name="collPeriod" disabled value="<?php echo $_SESSION['C_PERIOD'];?>"></td>
  </tr>
   <tr>
  <td> Grade :</td>
   <td><input type="text" name="collGrade" disabled value="<?php echo $_SESSION['C_GRADE'];?>"></td>
  </tr>
  </table>
</div>

</div><td rowspan="3" width="50%">
  <div style="text-align: left">
<input type="button" id="myBt4"   class="collapsible" value="Experiences                +">   
    <div class="content2">
    <table>
    <tr>
  <td> Title    :</td>
  <td><input type="text" name=""></td>
  </tr>
  <tr>
  <td> Company :</td>
   <td><input type="text" name=""></td>
  </tr>
  <tr>
  <td> Period :</td>
   <td><input type="text" name=""></td>
  </tr>
   <tr>
  <td> Designation :</td>
   <td><input type="text" name=""></td>
  </tr>
   
  </table>
</div>

</div>

</td>

</tr>
<tr>
<td width="50%"><div style="text-align: left">
<input type="button" id="myBt2"   class="collapsible" value="Undergraduate              +">   
    <div class="content2">
    <table>
    <tr>
  <td> Name    :</td>
  <td><input type="text" name=""></td>
  </tr>
  <tr>
  <td> Period :</td>
   <td><input type="text" name=""></td>
  </tr>
   <tr>
  <td> Grade :</td>
   <td><input type="text" name=""></td>
  </tr>
  </table>
</div>

</div>

</tr>
<tr>
<td width="50%"><div style="text-align: left">
<input type="button" id="myBt3"   class="collapsible" value="Master's                        +">   
    <div class="content2">
    <table>
    <tr>
  <td> Name    :</td>
  <td><input type="text" name=""></td>
  </tr>
  <tr>
  <td> Period :</td>
   <td><input type="text" name=""></td>
  </tr>
   <tr>
  <td> Grade :</td>
   <td><input type="text" name=""></td>
  </tr>
  </table>
</div>

</div>

</tr>
<tr>
                 <td colspan="2">
                   
                        <input type="button"  class="butt" onclick="changeAttribute()" id="editQualification" name="editProfile" value="Edit" formaction="?staff_editProfile" >
                  
                        <input type="button" style="display: none" class="butt" id="saveQEdit" name="saveEdit" value="Save" formaction="?staff_saveQEdit" >
                   
                   
                     
                 </td>
                 </tr>



</table>



</div>

<?php } ?>

</div>


</form>

<!-- HOME END -->




    <script type="">
     var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
            content.style.display = "none";
            if(this.id=="myBt1"){
            document.getElementById("myBt1").value="Collage                          +";
          }
          else if(this.id=="myBt2"){
            document.getElementById("myBt2").value="Undergraduate              +";
          }
          else if(this.id=="myBt3"){
            document.getElementById("myBt3").value="Master's                        +";
          }
        } else {
            content.style.display = "block";
             if(this.id=="myBt1"){
            document.getElementById("myBt1").value="Collage                          -";
          }
          else if(this.id=="myBt2"){
            document.getElementById("myBt2").value="Undergraduate              -";
          }
          else if(this.id=="myBt3"){
            document.getElementById("myBt3").value="Master's                        -";
          }
        }
    });
}
function changeAttribute()
{
  document.getElementById('editQualification').style.display="none";
  document.getElementById('saveQEdit').style.display="inline";


}

    </script>



</body>
</html>


<?php

}

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

        if (!isset($_SESSION["userId"]) && $_SESSION['status']!="Staff") {
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
