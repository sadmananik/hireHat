<?php ob_start(); ?>
<?php
session_start();
?>

<?php
if (isset($_SESSION["userId"]) && $_SESSION['status']=="Chief")
{
  if (isset($_SESSION['showPublicNotice'])) {
     $showPublicNotice=$_SESSION['showPublicNotice'];

  }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Welcome Chief</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../lib/css/Footer-with-social-icons.css">
    <link rel="stylesheet" type="text/css" href="../../../lib/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../lib/css/Loginstyle.css">
    <link rel="icon" type="png" href="images/icon.png">
    <script src="../../../lib/js/modernizr.custom.63321.js"></script>
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
}
body{
              overflow: hidden;
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
                    <ul><li><a href="?chief_messages" class="hvr-underline-from-center">Messages</a></li>
                        <li><a href="?chief_security" class="hvr-underline-from-center">Security</a></li>
                        <li><a href="?chief_profile" class="hvr-underline-from-center">profile</a></li>
                        <li><a href="?chief_logout" class="hvr-underline-from-center">logout</a></li>
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
    </header>


<!-- HOME -->

<div id="home">
<div style="height:40px; margin:15px 10px 10px 10px; border:1px solid black; padding:7px"> 
    <form >
    search for freelancer &nbsp
        <input type="search"/>
    </form>

</div>
<div style="height: 72%"  id="sidebar">

         <nav class="navi">
            <a class="burger-nav">Menu</a>
             <ul>
               <div style="border: 1px solid black;"><li><a href="?chief_home" class="hvr-underline-from-center">Home</a></li></div>
               <div style="border: 1px solid black;"><li><a href="?chief_hire" class="hvr-underline-from-center">Hire Staff's</a></li></div>
               <div style="border: 1px solid black;"><li><a href="?chief_job" class="hvr-underline-from-center">Jobs</a></li></div>              
               <div style="border: 1px solid black;"><li><a href="?chief_clan" class="hvr-underline-from-center">Team</a></li></div>
               <div style="border: 1px solid black;"><li><a href="?chief_financial" class="hvr-underline-from-center">Financial</a></li></div>
               <div style="border: 1px solid black;"><li><a href="?chief_notice" class="hvr-underline-from-center">Notice</a></li></div>
            </ul>
         </nav>

</div>

<!-- Main content-->

<div   class="content">
    <div style="width: 100%; margin:1px; padding-top: 20px; padding-bottom:10px;  border: 1px solid black; height: auto; ">
        <br>
        
            <br>
            <h4 style="padding-left: 10px; color:#333"><br/>All Notice</h4><br/>

            <div style="overflow-y: scroll; overflow-x: hidden;  height: 320px">

      <form method="POST">
        
<table style="width: 100%; margin:1px; padding: 2px; border: 1px solid black;">
            
            <tr>
                <td style="width: 8%">Notice Title</td> 
                <td style="width: 6%">From</td>
                <td style="width: 8%">Notice</td>      
                <td style="width: 8%">Date</td>   
                <td style="width: 8%">Time</td>    
            </tr>
            <?php
            if (isset($showPublicNotice)) {
            foreach ($showPublicNotice as $row) {
              echo  '<tr>
                <td style="width: 8%">'.$row['TITLE'].'</td> 
                <td style="width: 6%">'.$row['NAME'].'</td>
                <td style="width: 8%">'.$row['NOTICE'].'</td> 
                <td style="width: 8%">'.$row['DATE'].'</td>     
                <td style="width: 8%">'.$row['TIME'].'</td>    
            </tr>';
              }
            }

            ?>

          </table> 
        </form>

</div>

            <br>
           
        

    </div>

<?php

        $GLOBALS['phpValidation'] ="false";

        if (isset($_POST['createThisTeam'])) {

        $teamName=trim($_POST['teamName']," ");
        $teamDetails=trim($_POST['teamDetails']," ");
        

        if ($teamName==""){  
         echo '<span id="validationError">Team Name Can not be empty</span>';
        }else if ($teamDetails=="") {
            echo '<span id="validationError">Team Description Can not be empty</span>';
        }else{
                $GLOBALS['phpValidation'] ="true";
        }
      

        }
?>

</div>


    
<!-- HOME END -->
                        



    <script src="../../../lib/js/mobile.js"></script>



</body>
</html>


<?php
}
 define("APP_ROOT", "$_SERVER[DOCUMENT_ROOT]/HireHAT");
    $hasError = true;

        if (!isset($_SESSION["userId"]) && $_SESSION['status']!="Chief") {
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
             unset($_SESSION['thisTeamDetails']);
             $isDispatchedByFrontController = true; 
             include_once(APP_ROOT."/app/controller/".$controller."_controller.php");
        }
    }



    if($hasError){
        include_once(APP_ROOT."/app/error.php");
    }
        


?>

<?php ob_end_flush(); ?>
