<?php ob_start(); ?>
 
<!DOCTYPE html>
<html>

<head>
	<title>hireHAT</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../lib/css/Footer-with-social-icons.css">
	<link rel="stylesheet" type="text/css" href="../../../lib/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../lib/css/Loginstyle.css">
	<link rel="icon" type="png" href="../../../data/assets/img/icon.png">
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
                        <li><a href="../../../index.php" class="hvr-underline-from-center">Login</a></li>
                        <li><a href="?visitor_registration" class="hvr-underline-from-center">Join</a></li>
                        <li><a href="?visitor_howItWorks" class="hvr-underline-from-center">How It Works</a></li>
                        <li><a href="?visitor_feedback" class="hvr-underline-from-center">Send Feedback</a></li>
                        <li><a href="?visitor_FAQ" class="hvr-underline-from-center">FAQ</a></li>
                    </ul>
                </nav>
            </div> 

            <style type="text/css">
                #box {
                    width: 475px;
                    height: 400px;
                    background: #edf1f340;
                    color: #fff;
                    top: 90px;
                    margin: 0px auto;
                    position: relative;
                    box-sizing: border-box;
                    border-radius: 25px;
                    padding: 30px;
                     }

                #validationError{
                color:red;
                 font-size: 16px;
                font-weight: bold;
                margin-left: 30px;
                }
            </style>

	</header>

<!-- HOME -->
<div id="loginContainer">

<div id="box">
                <form method="POST" autocomplete="off" class="form-4">
                     <h1 style="padding-bottom: 30px; margin-top: 10px; text-align: center;">\Send Your Feedback Here/</h1>

                     
                    <p>
                        <label for="login">Enter Username or Id</label>    

                    <?php
                      if (isset($_POST['text'])) {

                           echo '<textarea name="text" rows="8" cols="41">'.$_POST['text'].'</textarea>';
                           }
                      else
                       {
                         echo '<textarea name="text" rows="8" cols="41" placeholder="Write Your Messages..."></textarea>';
                        }
                     ?>

                    </p>
                    <br> 

                    <p>
                        <input style="margin-bottom: 10px;" type="submit" formaction="?visitor_submitFeedback" name="submitFeedback" value="Submit">
                    </p>

                                    <?php

                $GLOBALS['phpValidation'] ="false";

                if (isset($_POST['submitFeedback'])) {

                $text=trim($_POST['text']," ");

                if ($text==""){  
                echo '<span id="validationError">Can not send Empty Feedback</span>';
                }else{
                $GLOBALS['phpValidation'] ="true";
                }
      

        }
            ?>

                </form>​            
                

   

</div>





</div>

<!-- HOME END -->

    <footer id="myFooter">
        <div class="container">
          
        </div>
        <div class="footer-copyright">
        	<div class="social-networks">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook-official"></i></a>
            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
        </div>
            <p>© 2018 Copyright Reserved </p>
        </div>
    </footer>
    <script src="../../../lib/js/mobile.js"></script>



</body>
</html>


<?php

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