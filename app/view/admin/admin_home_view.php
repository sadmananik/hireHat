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
               <div><li><a href="?admin_editFAQ" class="hvr-underline-from-center">Edit FAQ</a></li></div>
               
               <div ><li><a href="?admin_loginRecord" class="hvr-underline-from-center1">Login Record</a></li></div>

               <div ><li><a href="?admin_postNews" class="hvr-underline-from-center1">Post News</a></li></div>
            </ul>
         </nav>



</div>

<div class="content1"  style="background-color: white;border:none">
    <div   id="dis" style="width: 100%; margin:1px; padding: 2px;height: 100%;overflow:auto;">
            <h4 style="float: none; padding-left: 10px; color:#333">Home</h4><br/>

           <?php echo "<div class='divFlot' style='width:900px;height:130px;margin:0 auto;background-color:#f1f1f1 '>
  <div  style='width:895px;height:30px;margin:0 auto;margin-top: 5px;text-align: left;padding-left:5px '>Logged in as : Admin</div>
  <div style='width:895px;height:50px;margin:0 auto;margin-top: 5px;text-align: left;padding-left:5px'>Account info 
   <br/><span style='margin-left:20px'> ID : ".$_SESSION['userId']."</span>
  <span style='margin-left:20px'><br/>Name : ".$_SESSION['fullName']."</span> <span style='margin-left:20px'> <br> Date : ".date("Y-m-d")."</span>
  <span style='margin-left:20px'> Time : ".date("h:i:sa")."</span><br>
  </div><br>
  <div class='divFlot' style='width:895px;height:30px;margin:0 auto;margin-top: 5px;text-align: left;padding:5px '>
</div>

";?>

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
    
</div>

<!-- HOME END -->



   
   <script>
    
    

        function getSelectedData2(){
          var user = document.getElementById('search').value;
          if(user=="")
          {
            document.getElementById('dis').style.display="block";
            document.getElementById('d').style.display="none";
          }
          else{
                document.getElementById('dis').style.display="none";
        
        if(document.getElementById('gr').checked){
        var obj=document.getElementById('gr').value;

      }else{

        obj=document.getElementById('g').value;
      }
        
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../../controller/admin_controller.php?status=admin&user="+user+"&obj="+obj+"&AjaxView=searchResult", true);
        xhttp.send();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                   document.getElementById('d').style.display="block";
                 document.getElementById("d").innerHTML = this.responseText;

                }
            }

          }
    
        }
     var modal = document.getElementById('myModal');
     
     var span = document.getElementsByClassName("close")[0];

        function getDetails(cell) {
        
            modal.style.display = "block";

 var user = cell.innerHTML;
 

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../../controller/admin_controller.php?status=admin&user="+user+"&AjaxView=searchDetails", true);
        xhttp.send();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("modelContent").innerHTML = this.responseText;
}
}
}

               
                span.onclick = function() {
                    modal.style.display = "none";
        }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }


        function getJobDetails(cell) {
            modal.style.display = "block";

 var user =cell.innerHTML;
 

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../../controller/admin_controller.php?status=admin&user="+user+"&applied=0&AjaxView=searchJobDetails", true);
        xhttp.send();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("modelContent").innerHTML = this.responseText;
}
}
}
  
               
                span.onclick = function() {
                    modal.style.display = "none";
        }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }


    </script>


</body>
</html>



<?php
}

   define("APP_ROOT", "$_SERVER[DOCUMENT_ROOT]/HireHAT");
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
