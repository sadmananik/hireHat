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
    
    <div style="width: 100%; margin:1px; padding: 2px; border: 1px solid black; height: 20%">
        <form autocomplete="off" method="POST">
            <h4 style="float: left; padding-left: 10px; color:#333">Post New Notice</h4><br/>
            <h5 style="float: left; margin-top:10px; padding-left: 10px; color:#333">Title &nbsp &nbsp</h5> 
            <input id="title" style="width: 25%; margin-top:10px; float: left;" type="text" name="jobTitle" placeholder="t i t l e . . . ">
            <h5 style="float: left; margin-top:10px; padding-left: 10px; color:#333">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Body &nbsp &nbsp</h5>
            <textarea id="body" style="width: 30%; margin-top:10px; height:55px; float: left;" name="jobdescription" placeholder="T y p e   h e r e . . ."></textarea> 
            <input onclick="validate();" style="width: 7%; height:30%; margin-top:10px; float: right; margin-right: 90px; color:#333;" type="submit" name="submit" value="Post">
        </form>
    </div>
        <h4 style="padding-left: 10px; color:#333"><br/>Previous Notice</h4><br/>
        
<div style="overflow: auto; border: 1px solid black; height: 350px">
        <table style="width: 100%; margin:1px; padding: 2px; border: 1px solid black;">
            
            <tr style="background: rgb(230, 235, 255);">
                <td style="width: 8%">Notice ID</td> 
                <td style="width: 19%">Title</td> 
                <td style="width: 40%">Notice</td> 
                <td style="width: 8%">Posted By</td> 
                <td style="width: 7%">Date</td> 
                <td style="width: 8%">Time</td>              
            </tr>

  </div>

</div>
    
</div>

                <div id="d"></div>
                <div id="myModal" class="modal">

          <!-- Modal content -->
    <div class="modal-content" >
          
      <span class="close">&times;</span>
    <div  id="modelContent" class="con"></div>
    
    </div>

 </div>

<!-- HOME END -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="../../../assets/js/mobile.js"></script>

    <script>
        function validate()
        {
            //var title, body;
            var title=document.getElementById("title").value;
            var body=document.getElementById("body").value;
            if (body=="" || title=="")
                {
                    //document.getElementById("body").value="cant be empty";
                    alert("Message title or Body can not be empty");
                    //header('Location: /HireHAT/app/view/admin/admin_postNews_view.php?');
                }
        }
    </script>

</body>
</html>

<?php
}

        define("APP_ROOT", "$_SERVER[DOCUMENT_ROOT]/HireHAT");
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
        
        /*else*/ if (isset($_POST["submit"])) 
        {
            if ($_POST["submit"]=="Post") 
            {
                if ($_POST["jobdescription"]!="" && $_POST["jobTitle"]!="")
                {
                    $controller = "admin";
                    $view = "postNews";
                    $isDispatchedByFrontController = true;
                    include_once(APP_ROOT."/app/controller/admin_controller.php");
                }
            }
        }//$hasError = true;
         //if (count($_POST)==0) 
         //{
            
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
    
            $controller = "admin";
            $view = "showPreviousnotice";
            $isDispatchedByFrontController = true;
            include_once(APP_ROOT."/app/controller/admin_controller.php");
        //}
        
?>

<?php ob_end_flush(); ?>