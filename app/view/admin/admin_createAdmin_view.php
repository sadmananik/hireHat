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

<form method="POST">
    
     
        <h5 style=" color:#333"><br/>Create New Admin Account</h5><br/>
        <table style="width: 98%; margin:0 auto">
            <tr>
                <td style="padding-bottom: 3px;" colspan="2" align="center"> <br>
                    

                </td>
            </tr>
            <tr>
    
                <td align="left" width="50%">Status :
                     <div style="margin-top: -19px; text-align: center;" >
                        <input style="text-align: center;" type="text" value="Admin" disabled> 
                    </div>
                </td>
            </tr>

             <tr>
                <td align="left"  >Full Name:
                     <div style="margin-top: -19px; text-align: center;" > 
                    <?php 
                    if (isset($_POST['fullname'])) {
                        echo '<input style="text-align: center;" type="text" name="fullname" value="'.$_POST['fullname'].'" >';
                    }else{
                        echo '<input style="text-align: center;" type="text" name="fullname" value="" >';
                    }
                    ?>
                      </div>
                </td>
                <td align="left">Username :
                     <div style="margin-top: -19px; text-align: center;" > 
                        <?php 
                    if (isset($_POST['fullname'])) {
                        echo '<input style="text-align: center;" type="text" name="username" value="'.$_POST['username'].'" >';
                    }else{
                        echo '<input style="text-align: center;" type="text" name="username" value="" >';
                    }
                    ?>
                    </div>
                </td>
            </tr>

             <tr>
                <td align="left">Gender :
                 <div style="margin-top: -19px; text-align: center;" >
                    <?php 
                    if (isset($_POST['gender'])) {
                        ?>
                        <input type="radio" name="gender"  value="Male" <?php echo ($_POST['gender']=="Male")?'checked':'' ?>>Male
                        <input type="radio" name="gender"  value="Female"<?php echo ($_POST['gender']=="Female")?'checked':'' ?>>Female
                        <input type="radio" name="gender"  value="Other"<?php echo ($_POST['gender']=="Other")?'checked':'' ?>>Other<br/><br/>    
                    <?php
                    }else{
                        echo '<input type="radio" name="gender"  value="Male">Male
                        <input type="radio" name="gender"  value="Female">Female
                        <input type="radio" name="gender"  value="Other">Other<br/><br/>';
                    }
                    ?>
                 
                </div>  

                </td>
                <td align="left">Date of Birth :
                 <div style="margin-top: -19px; text-align: center;" > 
                    <?php 
                    if (isset($_POST['dob'])) {
                        echo '<input style="text-align: center;" type="date"  name="dob" value="'.$_POST['dob'].'"> ';
                    }else{
                        echo '<input style="text-align: center;" type="date"  name="dob" value=""> ';
                    }
                    ?>
                    </div>             
                </td>
            </tr>
            <tr>
           
                <td align="left">Email :
                 <div style="margin-top: -19px; text-align: center;" >
                     <?php 
                    if (isset($_POST['email'])) {
                        echo '<input style="text-align: center;" type="text"  name="email" value="'.$_POST['email'].'"> ';
                    }else{
                        echo '<input style="text-align: center;" type="text"  name="email" value=""> ';
                    }
                    ?>         
                </td>
            </tr>

            <tr>
                <td align="left">Address :
                 <div style="margin-top: -19px; text-align: center;" >
                    <?php 
                    if (isset($_POST['address'])) {
                        echo '<textarea rows="4" cols="20" name="address" >'.$_POST['address'].' </textarea>';
                    }else{
                        echo '<textarea rows="4" cols="20" name="address" > </textarea>';
                    }
                    ?>   
                               

               </div>              
                </td>
                <td align="left">Phone :
                 <div style="margin-top: -19px; text-align: center;" >
                    <?php 
                    if (isset($_POST['phonenumber'])) {
                        echo '<input style="text-align: center;" type="text" name="phonenumber"  value="'.$_POST['phonenumber'].'" >';
                    }else{
                        echo '<input style="text-align: center;" type="text" name="phonenumber"  value="" > ';
                    }
                    ?>   
                            
              </div>            
                </td>
            </tr>

            <tr> 
                 <td colspan="2" align="center">
                     <input style="padding: 10px 18px;" formaction="?admin_submitCreateAdmin" name="createAccount" type="submit" value="Create Account">
                 </td>  
            </tr>

        </table>

        </form>

        <?php

        $GLOBALS['phpValidation'] ="false";

        if (isset($_POST['createAccount'])) {

        if (!isset($_POST['fullname']) || $_POST['fullname']=="") {
            echo '<span id="validationError">Full Name Can not be empty</span>';
        }else if (checkName($_POST['fullname'])=="haveDigit") {
            echo '<span id="validationError">Full Name Can not have any digit</span>';
        }else if (checkName($_POST['fullname'])=="oneWord") {
            echo '<span id="validationError">Full Name must be more than one word</span>';
        }else if (checkName($_POST['fullname'])=="specialChar") {
            echo '<span id="validationError">Username Can not have any special character</span>';
        }else if (!isset($_POST['username']) || $_POST['username']=="") {
            echo '<span id="validationError">Username Can not be empty</span>';
        }else if (!isset($_POST['gender']) || $_POST['gender']=="") {
            echo '<span id="validationError">Gender Can not be empty</span>';
        }else if (!isset($_POST['dob']) || $_POST['dob']=="") {
            echo '<span id="validationError">Date Of Birth Can not be empty</span>';
        }else if (!isset($_POST['address']) || $_POST['address']=="") {
            echo '<span id="validationError">Address Can not be empty</span>';
        }else if (!isset($_POST['phonenumber']) || $_POST['phonenumber']=="") {
            echo '<span id="validationError">Phonenumber Can not be empty</span>';
        }else if (!isset($_POST['email']) || $_POST['email']=="") {
            echo '<span id="validationError">Please enter a Valid email</span>';
        }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo '<span id="validationError">Please enter a Valid email</span>';
        }
        else{
                $GLOBALS['phpValidation'] ="true";
        }

        }
   ?>

   </div>
        

                <div id="d"></div>
                <div id="myModal" class="modal">

          <!-- Modal content -->
    <div class="modal-content" >
          
      <span class="close">&times;</span>
    <div  id="modelContent" class="con"></div>
    
    </div>

 </div>
</div>



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
