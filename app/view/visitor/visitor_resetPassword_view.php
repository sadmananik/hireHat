<?php ob_start(); 
session_start();

$isRealUser="";

if (isset($_GET['userId'])) {
    $getUserId=$_GET['userId'];
}

if (isset($_GET['userName'])) {
    $getUserName=$_GET['userName'];
}

if ((isset($_SESSION["accID"]) && $_SESSION["accID"]==$getUserId) || (isset($_SESSION["user"]) && ($_SESSION["user"]==$getUserId || $_SESSION["user"]==$getUserName) )) {
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style type="text/css">
        table, td, th {    
    border: 1px solid #ddd;
    height: 10%;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
}

fieldset{
border: 1px solid white;
}

legend {
    font-size:  15px;
    font-weight:  bold;
    position:  relative;
}

#validationError{
    color:red;
    font-size: 16px;
    font-weight: bold;
    margin: 0 auto;
}

    </style>
</head>
<body>
    <div style="margin: 0 auto; height: auto; width: 70%; padding-top: 150px;">
    

    <form method="POST">
  <fieldset>
    <legend align=center>Reset Password:</legend>
        <table>
            <tr>
                <td><span>Type New Password</span></td>
                 
                 <?php
                        if (isset($_POST['newPassword'])) {
                                 echo '<td><input type="Password" name="newPassword" value='.$_POST['newPassword'].'></td>';
                        }else{
                                echo '<td><input type="Password" name="newPassword"></td>';
                        }
                  ?>
            </tr>
            <tr>
                <td><span>Re-Type New Password</span></td> 
                <?php
                        if (isset($_POST['reNewPassword'])) {
                                 echo '<td><input type="Password" name="reNewPassword" value='.$_POST['reNewPassword'].'></td>';
                        }else{
                                echo '<td><input type="Password" name="reNewPassword"></td>';
                        }
                  ?>
            </tr>
            <tr> 
            <?php
            if (isset($_GET['key'])) {
                echo '<input type="hidden" name="key" value="'.$_GET['key'].'">';
                echo '<input type="hidden" name="userId" value="'.$_GET['userId'].'">';
            }
                echo '<td style="text-align: center;" colspan="2"> <input type="submit" formaction="?visitor_submitResetPassword&userId='.$_GET['userId'].'" name="submit" value="Submit"> </td>'; ?>

            </tr>
            <tr>
                <td style="text-align: center;" colspan="2">
                    <?php

        $GLOBALS['phpValidation'] ="false";

        if (isset($_POST['submit'])) {
        if (isset($_POST['newPassword']) && isset($_POST['reNewPassword'])) {
        $pass=trim($_POST['newPassword']," ");
        $newPass=trim($_POST['reNewPassword']," ");

        if ($pass=="" || $newPass=="") {
            echo '<span id="validationError">Password Can not be empty</span>';
        }else if (strlen($pass)<8 ||strlen($newPass)<8  ) {
            echo '<span id="validationError">Password Must be 8 Char</span>';
        }
        else{
                $GLOBALS['phpValidation'] ="true";

        }
        }
        }
?>
                </td>
            </tr>
        </table>
  </fieldset>
</form>


</div>


</body>
</html>

<?php
}
else{
   echo "<SCRIPT type='text/javascript'> 
                        alert('Invaid Access. Try Again..!');
                        window.location.assign(\"http://localhost/HireHAT\");
                        </SCRIPT>";
}

 define("APP_ROOT", "$_SERVER[DOCUMENT_ROOT]/HireHAT");
    $hasError = true;

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

