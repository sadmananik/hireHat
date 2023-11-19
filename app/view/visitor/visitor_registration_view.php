<?php ob_start();     
$GLOBALS['phpValidation']="false";

?>

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

        <style type="text/css">

    *,
*:after,
*:before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -o-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}

    .form-reg {
    /* Size and position */
    width: 100%;
    padding: 10px;
    position: relative;
    height: 630px;
    background: url(../../../data/assets/img/banner.jpg);
    background-repeat: no-repeat;
    border-bottom: 6px solid #373940;
    background-position: bottom;
    background-size: cover;

    /* Font styles */
    font-family: 'Raleway', 'Lato', Arial, sans-serif;
    color: black;
    text-shadow: 0 2px 1px rgba(0,0,0,0.3);
}

.portfolioboxreg{
    width:500px;
    height:430px;
    background:#edf1f340;
    color: #fff;
    box-sizing: border-box;
    border-radius: 25px;
    padding: 30px;
    margin: 0 auto;
    margin-top: 80px;
}

.form-reg input[type=text],
.form-reg input[type=number],
.form-reg input[type=password] {
    /* Size and position */
    width: 100%;
    padding: 8px 0px 8px 0px;
    /* Styles */
    border: 1px solid rgba(78,48,67, 0.8);
    background: rgba(0,0,0,0.15);
    border-radius: 2px;
    padding-left: 5px;
    box-shadow: 
        0 1px 0 rgba(255,255,255,0.2), 
        inset 0 1px 1px rgba(0,0,0,0.1);
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;

    /* Font styles */
    font-family: 'Raleway', 'Lato', Arial, sans-serif;
    color: #fff;
    font-size: 14px;
}


.form-reg input[type=submit] {
    /* Size and position */
    width: 100%;
    padding: 8px 5px;
    
    /* Styles */
    background:  rgba(37, 37, 37, 0.56);  
    border-radius: 5px;
    border: 1px solid #4e3043;
    box-shadow: inset 0 1px rgba(255,255,255,0.4), 0 2px 1px rgba(0,0,0,0.1);
    cursor: pointer;
    -webkit-transition: all 0.3s ease-out;
    -moz-transition: all 0.3s ease-out;
    -ms-transition: all 0.3s ease-out;
    -o-transition: all 0.3s ease-out;
    transition: all 0.3s ease-out;

    /* Font styles */
    color: white;
    text-shadow: 0 1px 0 rgba(0,0,0,0.3);
    font-size: 15px;
    font-weight: bold;
    font-family: 'Raleway', 'Lato', Arial, sans-serif;
}

.form-reg input::-webkit-input-placeholder {
    color: #404040;
    font-size: 16px;
    padding-left: 10px;
    text-shadow: 0 1px 0 rgba(255,255,255,0.15);
}

.form-reg input:-moz-placeholder {
    color: rgba(37,21,26,0.5);
    text-shadow: 0 1px 0 rgba(255,255,255,0.15);
}

.form-reg input:-ms-input-placeholder {
    color: rgba(37,21,26,0.5);
    text-shadow: 0 1px 0 rgba(255,255,255,0.15);
}

.form-reg input[type=text]:hover,
.form-reg input[type=password]:hover {
    border-color: #333;
}

.form-reg input[type=text]:focus,
.form-reg input[type=password]:focus,
.form-reg input[type=number]:focus,
.form-reg input[type=submit]:focus {
    box-shadow: 
        0 1px 0 rgba(255,255,255,0.2), 
        inset 0 1px 1px rgba(0,0,0,0.1),
        0 0 0 3px rgba(255,255,255,0.15);
    outline: none;
}

/* Fallback */
.no-boxshadow .form-reg input[type=text]:focus,
.no-boxshadow .form-reg input[type=number]:focus,
.no-boxshadow .form-reg input[type=password]:focus {
    outline: 1px solid white;
}

.form-reg input[type=text]:hover,
.form-reg input[type=number]:hover,
.form-reg input[type=password]:hover {
    border-color: #333;
}

.form-reg input[type=submit]:hover {
    box-shadow: 
        inset 0 1px rgba(255,255,255,0.2), 
        inset 0 20px 30px #3a3b4d;
}
.no-boxshadow .form-reg input[type=submit]:hover {
    background: #594642;
}

.form-reg input[type=text]:focus,
.form-reg input[type=password]:focus,
.form-reg input[type=submit]:focus {
    box-shadow: 
        0 1px 0 rgba(255,255,255,0.2), 
        inset 0 1px 1px rgba(0,0,0,0.1),
        0 0 0 3px rgba(255,255,255,0.15);
    outline: none;
}

.btn-group button {
    background-color: #7e8282d9;
    border: 1px solid rgba(78,48,67, 0.8);
    border-radius: 2px;
    color: white;
    padding: 10px 24px;
    cursor: pointer;
    width: 100%;
}

/* Clear floats (clearfix hack) */
.btn-group:after {
    content: "";
    clear: both;
    display: table;
}

.btn-group button:not(:last-child) {
    border-right: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
    background-color: white;
    color: gray;
}

.validation{
border: 1px solid white;
border-radius: 15px 50px 30px;
margin-top: 15px;
padding: 5px;
display: none;
}

#validationError{
    color:red;
    font-size: 16px;
    font-weight: bold;
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
                        <li><a href="../../../index.php" class="hvr-underline-from-center">Login</a></li>
                        <li><a href="?visitor_registration" class="hvr-underline-from-center">Join</a></li>
                        <li><a href="visitor_howItWorks_view.php" class="hvr-underline-from-center">How It Works</a></li>
                        <li><a href="visitor_feedback_view.php" class="hvr-underline-from-center">Send Feedback</a></li>
                        <li><a href="visitor_FAQ_view.php" class="hvr-underline-from-center">FAQ</a></li>
                    </ul>
                </nav>
            </div>      
	</header>

<!-- HOME -->

<form method="post"class="form-reg" name="Form"  onsubmit="return checkAllOk()" >
    <div class="portfolioboxreg">
    <center>
        <table>
            <tr>
                <td colspan="3">  
                    <p style="font-weight: bold; margin-bottom: 10px;">Registration</p>
                </td>
            </tr>

            <tr>
                <td  colspan="2"> 
            <?php
            if (isset($_POST['fullname'])) {
                echo '<input onkeyup="fullnameValidity()" onblur="fullnameValidity()"  id="fullname" type="text" title="Full Name" name="fullname" placeholder="Full Name" value="'.$_POST['fullname'].'">';
            }
            else
            {
                echo '<input onkeyup="fullnameValidity()" onblur="fullnameValidity()"  id="fullname" type="text" title="Full Name" name="fullname" placeholder="Full Name">';
            }
            ?>                      
                </td>
                <td>  
            <?php
            if (isset($_POST['username'])) {
                echo '<input onblur="usernameValidity()" id="username" type="text" title="Username" name="username" placeholder="Username" value="'.$_POST['username'].'">';
            }
            else
            {
                echo '<input onblur="usernameValidity()" id="username" type="text" title="Username" name="username" placeholder="Username">';
            }
            ?>                         
                </td>
            </tr>
            <tr>
                <td colspan="3">  
            <?php
            if (isset($_POST['email'])) {
                echo '<input onkeyup="emailValidity()" onblur="emailValidity()" id="email" type="text" title="Email" name="email" placeholder="Email" value="'.$_POST['email'].'">';
            }
            else
            {
                echo '<input onkeyup="emailValidity()" onblur="emailValidity()" id="email" type="text" title="Email" name="email" placeholder="Email">';
            }
            ?>            
                </td>
            </tr>
            <tr>
                <td colspan="3">
            <?php
            if (isset($_POST['password'])) {
                echo '<input onblur ="passwordValidity()" onkeyup ="passwordValidity()" type="password" id="password" title="Password" name="password" placeholder="Password" value="'.$_POST['password'].'">';
            }
            else
            {
                echo '<input onblur ="passwordValidity()" onkeyup ="passwordValidity()" type="password" id="password" title="Password" name="password" placeholder="Password">';
            }
            ?> 
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <span>Date Of Birth</span>
                </td>
                
            </tr>
            <tr>
                <td>
            <?php
            if (isset($_POST['day'])) {
                echo '<input onblur="dayValidity()" onkeyup ="dayValidity()" id="day" type="number" name="day" min="1" max="31" placeholder="Day" value="'.$_POST['day'].'">';
            }
            else
            {
                echo '<input onblur="dayValidity()" onkeyup ="dayValidity()" id="day" type="number" name="day" min="1" max="31" placeholder="Day" >';
            }
            ?>
                </td>
                <td>  
            <?php
            if (isset($_POST['month'])) {
                echo '<input onblur="monthValidity()" onkeyup="monthValidity()" id="month" type="number" name="month" min="1" max="12" placeholder="Month" value="'.$_POST['month'].'">';
            }
            else
            {
                echo '<input onblur="monthValidity()" onkeyup="monthValidity()" id="month" type="number" name="month" min="1" max="12" placeholder="Month">';
            }
            ?>
                </td>
                <td> 
            <?php
            if (isset($_POST['year'])) {
                echo '<input onblur="yearValidity()" onkeyup="yearValidity()" id="year" type="number" name="year" min="1900" max="3000" placeholder="Year" value="'.$_POST['year'].'">';
            }
            else
            {
                echo '<input onblur="yearValidity()" onkeyup="yearValidity()" id="year" type="number" name="year" min="1900" max="3000" placeholder="Year">';
            }
            ?>   
                </td>
            </tr>
            <tr>
                <td  colspan="2"> 
                    <div class="btn-group">
            <?php
            if (isset($_POST['status']) && $_POST['status']=="Chief") {

                echo '<input type="hidden" name="statusSelected" value="Chief">';
            }else if (isset($_POST['statusSelected']) && $_POST['statusSelected']=="Chief") {
                echo '<input type="hidden" name="statusSelected" value="Chief">';
            }
            ?>

              <button onClick="selectStatus(this.id)" id="chiefStatus" name="status" value="Chief">Chief</button> 
                        
                    </div>
                </td>

                <td> 
                    <div class="btn-group">
            <?php
            if (isset($_POST['status']) && $_POST['status']=="Staff") {
                echo '<input type="hidden" name="statusSelected" value="Staff">';
            }else if (isset($_POST['statusSelected']) && $_POST['statusSelected']=="Staff") {
                echo '<input type="hidden" name="statusSelected" value="Staff">';
            }
            ?>
            <button onClick="selectStatus(this.id)" id="staffStatus" name="status" value="Staff">Staff</button>
                        
                    </div>
                </td>   

                <input type="hidden" id="status" name="statusSelected" value="Chief">

            </tr>


            <tr>
                <th colspan="3" style="padding: 10px;">
                         <input onclick="selectCheckBox()"  id="agreement" type="checkbox" name="All" value="clicked">      
            <span id="checkboxAgree"> I Acknowledge that, I have read and accept terms of use Agreement and Other Rules </span>
                </th>
            </tr>
            <tr>
                <td align="center" colspan="3"> 
                    <input onclick = "return validateForm()" formaction="?visitor_createAccount" type="submit" name="submit" value="Create Account">
                </td>
            </tr>

             <tr>
                <td align="center" colspan="3"> 
                    <div class="validation">
                         <span id="validationError">Error</span>
                    </div>
                    <div style="margin-top: 15px;">
<?php
    if (isset($_POST['submit'])) {
        if (isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['email'])  && isset($_POST['password'])  && isset($_POST['day']) && isset($_POST['month']) && isset($_POST['year']) ) {
        
                $fullname=trim($_POST['fullname']," ");
                $username=trim($_POST['username']," ");
                $email=trim($_POST['email']," ");
                $password=trim($_POST['password']," ");
                $day=trim($_POST['day']," ");
                $month= trim($_POST['month']," ");
                $year= trim($_POST['year']," ");
                $GLOBALS['phpValidation']="false";

                if ($fullname=="") {
                    echo '<span id="validationError">Full Name Can not be empty</span>';
                }else if (checkFullName($_POST['fullname'])=="haveDigit") {
                    echo '<span id="validationError">Full Name Can not have any digit</span>';
                }else if (checkFullName($_POST['fullname'])=="oneWord") {
                    echo '<span id="validationError">Full Name must be more than one word</span>';
                }else if (checkFullName($_POST['fullname'])=="specialChar") {
                    echo '<span id="validationError">Username Can not have any special character</span>';
                }else if($username==""){
                    echo '<span id="validationError">Username Can not be empty</span>';
                }else if($email==""){
                    echo '<span id="validationError">Email Can not be empty</span>';
                }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo("Please enter a valid email address");
                }else if($password==""){
                     echo '<span id="validationError">Password Can not be empty</span>';
                }else if (strlen($password)<8) {
                     echo '<span id="validationError">Password must be 8 character long</span>';
                }else if($day==""){
                     echo '<span id="validationError">Day Can not be empty</span>';
                }else if ($day<1 || $day>31) {
                     echo '<span id="validationError">Day must be in between 1-31</span>';
                } else if($month==""){
                    echo '<span id="validationError">Month Can not be empty</span>';
                }else if ($month<1 || $month>12) {
                     echo '<span id="validationError">Month must be in between 1-12</span>';
                }else if($year==""){
                    echo '<span id="validationError">Year Can not be empty</span>';
                }else if($year>2000 || $year<1900){
                    echo '<span id="validationError">User must be at least 18 years old</span>';
                }else if (!isset($_POST['statusSelected'])) {
                   echo '<span id="validationError">Please select a Status</span>';
                }
                else if (!isset($_POST['All'])) {
                   echo '<span id="validationError">Please select the checkbox below</span>';
                }else
                {
                    $GLOBALS['phpValidation']="true";
                }
                    }
                        
                    }
?>

                    </div>
                </td>
            </tr>

        </table>
    </center>       
    </div>
</form>




<!-- HOME END -->


<!--<div class="content">
</div>-->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="../../../lib/js/mobile.js"></script>



    </style>


</body>
</html>

<?php

//php validation

function checkFullName($fullname)
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



if (isset($_POST['status']) && $_POST['status']=="Chief") {
        
        echo '<style type="text/css">
        #chiefStatus{
            background: white;
            color: gray
        }
        #staffStatus{
            background: gray;
            color: white
        } </style> ' ;
    }
    else if (isset($_POST['status']) && $_POST['status']=="Staff") {
        
        echo '<style type="text/css">
        #staffStatus{
            background: white;
            color: gray
        }

        #chiefStatus{
            background: gray;
            color: white
        } </style> ';
    }

if (isset($_POST['submit'])) {

        if (isset($_POST['statusSelected']) && $_POST['statusSelected']=="Chief") {
        
        echo '<style type="text/css">
        #chiefStatus{
            background: white;
            color: gray
        }

        #staffStatus{
            background: gray;
            color: white
        } </style> ';

    }
    else if (isset($_POST['statusSelected']) && $_POST['statusSelected']=="Staff") {
        
         echo '<style type="text/css">
        #staffStatus{
            background: white;
            color: gray
        }

        #chiefStatus{
            background: gray;
            color: white
        } </style> ';
    }

    }



?> 




<!--validation in JS -->

<script>
	
    var fullnameValid, usernameValid, emailValid, passwordValid, dayValid, monthValid, yearValid, agreementValid;
    var statusValid="false";
    var allOk=false;

    function checkAllOk(){
        if (allOk) {
            return true;
        }
        else{
            return false;
        }
    }

    function validateForm()
    {
        agreementValid=selectCheckBox();
        yearValid=yearValidity();
        monthValid=monthValidity();
        dayValid=dayValidity();
        passwordValid=passwordValidity();
        emailValid=emailValidity();
        usernameValid=usernameValidity();
        fullnameValid=fullnameValidity();
        
debugger;
        if (!fullnameValid) {   
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
             document.getElementById("validationError").innerHTML="Full Name Field is required!";
             return false; 
        }
        else if (!usernameValid) {
             var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
             document.getElementById("validationError").innerHTML="Username Field is required!";
             return false; 
        }
        else if (!emailValid) {
             var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
             document.getElementById("validationError").innerHTML="Email Field is required!";
             return false; 
        }
         else if (!passwordValid) {
             var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
             document.getElementById("validationError").innerHTML="Password Field is required!";
             return false; 
        }
         else if (!dayValid) {
             var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
             document.getElementById("validationError").innerHTML="Date of birth (Day) Field is required!";
             return false; 
        }
         else if (!monthValid) {
             var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
             document.getElementById("validationError").innerHTML="Date of birth (Month) Field is required!";
             return false; 
        }
         else if (!yearValid) {
             var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
             document.getElementById("validationError").innerHTML="Date of birth (Year) Field is required!";
             return false; 
        }
         else if (statusValid == "false") {
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Please Select any Status (Chief/Staff)";
            return false; 
        }          
         else if (!agreementValid) {
             var css = document.getElementsByClassName("validation");
             css[0].style.display = "block";
             document.getElementById("validationError").innerHTML="Please accept the checkbox";
             return false; 
        }
        else{
            document.getElementById('status').value = statusValid;
            allOk=true;
            return true;
        }
          
    }

    function selectStatus(clicked_id){

         var css = document.getElementsByClassName("validation");
        css[0].style.display = "none";

        if (clicked_id=="chiefStatus") {
            statusValid = document.getElementById("chiefStatus").value; 

            document.getElementById("chiefStatus").style.backgroundColor="white";
            document.getElementById("chiefStatus").style.color="gray";

            //unSelect Other
            document.getElementById("staffStatus").style.backgroundColor="#7e8282d9";
            document.getElementById("staffStatus").style.color="white";

        }
        else if (clicked_id=="staffStatus") {
            statusValid= document.getElementById("staffStatus").value;
            document.getElementById("staffStatus").style.backgroundColor="white";
            document.getElementById("staffStatus").style.color="gray";

            //unselect other                      
            document.getElementById("chiefStatus").style.backgroundColor=" #7e8282d9";
            document.getElementById("chiefStatus").style.color="white";

        }
        else{
            return "false";
        }

    }

    function fullnameValidity(){

        var fullname=document.forms["Form"]["fullname"].value.trim();
        var noDigit=true;
        var spaceCount=0;
        var name = fullname.replace(/\s/g,"a");  

        for (var i = 0; i < fullname.length; i++) {
             if(!isNaN(name.charAt(i)))
             {
                noDigit=false;
                break;     
             }

             if (fullname.charAt(i) == " ")
             {
                    spaceCount++;
             }
        }

        if (!fullname) {
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Plese Enter Valid Full Name";
            document.getElementById("fullname").style.background = "rgba(244, 67, 54, 0.38)";
             
            return false;
        }
        else if (!noDigit) {
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Full Name Can't Have Digit";
            return false;
        }
        else if (spaceCount<1) {
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Full Name Must Contain More Than One Word";
            return false;
        }
        else{
        var css = document.getElementsByClassName("validation");
        css[0].style.display = "none";
        document.getElementById("fullname").style.background = "rgba(139, 195, 74, 0.38)";
            return true;
        }
    }

    function usernameValidity(){

        var username=document.forms["Form"]["username"].value;
        if (!username) {
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Plese Enter Valid Username";
            document.getElementById("username").style.background = "rgba(244, 67, 54, 0.38)";
            return false;
        }
        else{
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "none";
            document.getElementById("username").style.background = "rgba(139, 195, 74, 0.38)";
            return true;
        }
    }

    function emailValidity(){
        var username=document.forms["Form"]["email"].value;
        var x=email.value.indexOf('@');
        var y=email.value.lastIndexOf('.');

        if(email =="" || x==-1 || y==-1 || (x+2)>=y){
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Email address is not valid";
            document.getElementById("email").style.background = "rgba(244, 67, 54, 0.38)";
            return false;
        }
        else{
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "none";
            document.getElementById("email").style.background = "rgba(139, 195, 74, 0.38)";
            return true;
        }
    }

    function passwordValidity(){

        var password=document.forms["Form"]["password"].value;

        if(password ==""){
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Please Enter Valid Password";
            document.getElementById("password").style.background = "rgba(244, 67, 54, 0.38)";
            return false;
        }
        else if (password.length<8) {
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Password Must Contain Al Least 8 Character";
            document.getElementById("password").style.background = "rgba(244, 67, 54, 0.38)";
            return false;
        }
        else{
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "none";
            document.getElementById("password").style.background = "rgba(139, 195, 74, 0.38)";
            return true;
        }

    }

    function dayValidity(){

        var day=document.forms["Form"]["day"].value;

        if(day ==""){
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Please Enter Valid Day";
            document.getElementById("day").style.background = "rgba(244, 67, 54, 0.38)";
            return false;
        }
        else if (day<1 || day >31) {
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Day Can Be (1-31)";
            document.getElementById("day").style.background = "rgba(244, 67, 54, 0.38)";
            return false;
        }
        else{
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "none";
            document.getElementById("day").style.background = "rgba(139, 195, 74, 0.38)";
            return true;
        }
    }

    function monthValidity(){
      
        var month=document.forms["Form"]["month"].value;

        if(month ==""){
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Please Enter Valid Month";
            document.getElementById("month").style.background = "rgba(244, 67, 54, 0.38)";
            return false;
        }
        else if (month<1 || month >12) {
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Month Can Be (1-12)";
            document.getElementById("month").style.background = "rgba(244, 67, 54, 0.38)";
            return false;
        }
        else{
              var css = document.getElementsByClassName("validation");
            css[0].style.display = "none";
            document.getElementById("month").style.background = "rgba(139, 195, 74, 0.38)";
            return true;
        }
    }

    function yearValidity(){

        var year=document.forms["Form"]["year"].value;

        if(year =="" || year <1900){
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Please Enter Valid Year";
            document.getElementById("year").style.background = "rgba(244, 67, 54, 0.38)";
            return false;
        }
        else if (year >2000) {
            var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="You Must Be at least 18 years Old";
             document.getElementById("year").style.background = "rgba(244, 67, 54, 0.38)";
            return false;
        }
        else{
             var css = document.getElementsByClassName("validation");
            css[0].style.display = "none";
            document.getElementById("year").style.background = "rgba(139, 195, 74, 0.38)";
            return true;
        }

    }

    function selectCheckBox(){
        var css = document.getElementsByClassName("validation");
        css[0].style.display = "none";

        checkAgreementValid = document.getElementById("agreement").checked;

        if(checkAgreementValid==false)
        {
             var css = document.getElementsByClassName("validation");
            css[0].style.display = "block";
            document.getElementById("validationError").innerHTML="Please accept the checkbox";
            document.getElementById("checkboxAgree").style.background = "rgba(244, 67, 54, 0.38)";
            return checkAgreementValid;
        }
        else{
            return checkAgreementValid;
        }

    }
 
</script> 




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

              if ($GLOBALS['phpValidation']=="true") {
                  include_once(APP_ROOT."/app/controller/".$controller."_controller.php");
              }
        }
    }

    if($hasError){
        include_once(APP_ROOT."/app/error.php");
    }

?>


<?php ob_end_flush(); ?>

