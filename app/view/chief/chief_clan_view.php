<?php ob_start(); ?>
<?php
session_start();
?>

<?php
if (isset($_SESSION["userId"]) && $_SESSION['status']=="Chief")
{
  if (isset($_SESSION['createdTeamDetails'])) {
     $createdTeamDetails=$_SESSION['createdTeamDetails'];

  }
?>

<!DOCTYPE html>
<html>

<head>
  <title>Welcome Chief</title>
  <link rel="stylesheet" href="../../../lib/css/componentDesign.css">
  <link rel="stylesheet" type="text/css" href="../../../lib/css/floatWindow.css">
  <link rel="stylesheet" href="../../../lib/css/Footer-with-social-icons.css">
    <link rel="stylesheet" type="text/css" href="../../../lib/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../lib/css/Loginstyle.css">
  <link rel="icon" type="png" href="images/icon.png">
    <script src="../../../lib/js/modernizr.custom.63321.js"></script>
    <style type="text/css">
        table {
        border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        .content{
            padding: 0px;
        }

        #sidebar{
            height: 72%;
        }
        body{
              overflow: hidden;
        }
    </style>
</head>

<body>
  <header>
    <div class="divFlot">   
                  <a href="#">
                    <h1 class="logo">hireHAT</h1>
                  </a>
                <nav>
                    <a class="burger-nav">Menu</a>
                    <ul> <li><a href="?chief_messages" class="hvr-underline-from-center">Messages</a></li>
                        <li><a href="?chief_security" class="hvr-underline-from-center1">Security</a></li>
                        <li><a href="?chief_profile" class="hvr-underline-from-center1">Profile</a></li>
                        <li><a href="?chief_logout" class="hvr-underline-from-center1">Logout</a></li>
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

<div id="home" style="background-color: #f1f1f1;border:none;">
<div class="divFlot" style="height:60px; margin:15px 10px 10px 10px; text-align:center; "> 
    <form >
    <span style="margin-top:20px">Search &nbsp</span>
        <input type="search" id="search"onkeyup="getSelectedData()" size="50" style="height: 35px;margin-top: 10px;background-color:#f1f1f1;border-radius:10px 10px; " />
         <input type="radio" name="ga" id="g"  value="Person" checked>Person   
        <input type="radio" name="ga" id="gr"  value="jobs">Jobs
       
    </form>

</div>
<div id="ssidebar" style="background-color:#f1f1f1;border:none" >

         <nav class="navii">
            
             <ul>
               <div ><li><a href="?chief_home" class="hvr-underline-from-center1">Home</a></li></div>
               <div ><li><a href="?chief_hire" class="hvr-underline-from-center1">Hire Staff's</a></li></div>
               <div ><li><a href="?chief_job" class="hvr-underline-from-center1">Jobs</a></li></div>              
               <div ><li><a href="?chief_clan" class="hvr-underline-from-center1">Team</a></li></div>
               <div ><li><a href="?chief_financial" class="hvr-underline-from-center1">Financial</a></li></div>
               <div ><li><a href="?chief_notice" class="hvr-underline-from-center1">Notice</a></li></div>
            </ul>
         </nav>



</div>

<!-- Main content-->
<div class="content1" style="background-color: white;border:none">
      <div   id="dis" style="width: 100%; margin:1px; padding: 2px;height: 100%;overflow:auto;">
        <h4 style="padding-left: 10px; color:#333"><br/> Team Manage</h4><br/>

               <form method="POST">
        <br>
                <button name="" value="" formaction="?chief_createTeam" style="padding: 10px 18px;">Create Team Here</button>
        </form>
     
        <h4 style="padding-left: 10px; color:#333"><br/>All Created Team</h4><br/>
        <div style="overflow-y: scroll; overflow-x: hidden;  height: 350px">
        
        
<table style="width: 100%; margin:1px; padding: 2px; border: 1px solid black;">
            
            <tr>
                <td style="width: 8%">Team ID</td> 
                <td style="width: 6%">Team Name</td>
                <td style="width: 8%">Description</td>      
                <td style="width: 8%">Created Date</td>   
                <td colspan="3" style="width: 7%">Action</td>           
            </tr>
            <?php
            if (isset($createdTeamDetails)) {
                          foreach ($createdTeamDetails as $row) {
              echo  '<tr>
                <td style="width: 8%">'.$row['TEAMID'].'</td> 
                <td style="width: 10%">'.$row['T_NAME'].'</td>
                <td style="width: 8%">'.$row['DESCRIPTION'].'</td> 
                <td style="width: 8%">'.$row['CREATED_DATE'].'</td> 
                <td style="width: 8%"> <a href="?chief_manageTeam&teamId='.$row['TEAMID'].'">Manage</a></td>      
                <td style="width: 8%"> <a href="?chief_addStaff&teamId='.$row['TEAMID'].'">Add Staff</a></td>        
                <td style="width: 8%"> <a href="?chief_editTeam&teamId='.$row['TEAMID'].'">Edit/Delete</a></td>    
            </tr>';
              }
            }

            ?>

          </table>

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

</div>



<!-- HOME END -->

<script>

        function getSelectedData(){

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
        xhttp.open("GET", "../../controller/chief_controller.php?status=chief&user="+user+"&obj="+obj+"&AjaxView=searchResult", true);
        xhttp.send();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                     document.getElementById('d').style.display="block";
                 document.getElementById("d").innerHTML = this.responseText;

                }
            }

          }
    
        }       var modal = document.getElementById('myModal');
     
        var span = document.getElementsByClassName("close")[0];


               function getDetails(cell) {
                
                    modal.style.display = "block";

                 var user = cell.innerHTML;

                
                        var xhttp = new XMLHttpRequest();
                    xhttp.open("GET", "../../controller/chief_controller.php?status=chief&user="+user+"&AjaxView=searchDetails", true);
                    xhttp.send();

                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("modelContent").innerHTML = this.responseText;
}
}
}
    function getJobDetails(cell) {
            modal.style.display = "block";

 var user =cell.innerHTML;
 

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../../controller/chief_controller.php?status=chief&user="+user+"&AjaxView=searchJobDetails", true);
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

             $isDispatchedByFrontController = true;
             include_once(APP_ROOT."/app/controller/".$controller."_controller.php");
        }
    }

    if($hasError){
        include_once(APP_ROOT."/app/error.php");
    }
        


?>

    <script src="../../../lib/js/mobile.js"></script>

<?php ob_end_flush(); ?>
