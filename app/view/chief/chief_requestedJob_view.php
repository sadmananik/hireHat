<?php ob_start(); ?>
<?php
session_start();
?>

<?php
if (isset($_SESSION["userId"]) && $_SESSION['status']=="Chief")
{
  if (isset($_SESSION['jobReqDetails'])) {
     $jobReqDetails=$_SESSION['jobReqDetails'];
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


table, td, th {    
    border: 1px solid #ddd;
    height: 8%;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 0px 8px;
}

fieldset{
border: 1px solid white;
}

legend {
    font-size:  15px;
    font-weight:  bold;
    position:  relative;
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
                    <ul><li><a href="?chief_messages" class="hvr-underline-from-center">Messages</a></li>
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
<div id='dis'>
<h4 style="padding-left: 10px; color:#333"><br/>All Job Request</h4><br/>

    <div style="overflow-y: scroll; overflow-x: hidden;  height: 350px">
        
        
<table style="width: 100%; margin:1px; padding: 2px; border: 1px solid black;">
            
            <tr>
                <td style="width: 8%">Applied ID</td> 
                <td style="width: 10%">Staff AccID</td>
                <td style="width: 8%">Applied By Status</td> 
                <td style="width: 8%">Job ID</td>     
                <td style="width: 8%">Confirmation</td>   
                <td style="width: 7%">Applied Date</td>    
                <td colspan="2" style="width: 7%">Action</td>         
            </tr>
            <?php
            foreach ($jobReqDetails as $row) {
              echo  '<tr>
                <td style="width: 8%">'.$row['APPLIEDID'].'</td> 
                <td style="width: 10%">'.$row['ACCID'].'</td>
                <td style="width: 8%">'.$row['APPLIED_BY_STATUS'].'</td> 
                <td style="width: 8%">'.$row['JOBID'].'</td>     
                <td style="width: 8%">'.$row['CONFIRMATION'].'</td>   
                <td style="width: 7%">'.$row['APPLIED_DATE'].'</td>';
                if ($row['APPLIED_BY_STATUS']=="Chief") {
                  echo '<td colspan="2" style="width: 7%">Pending</td> ';
                }else{
                  echo  ' <td> <a href="?chief_acceptJob&jobId='.$row['JOBID'].'&staffId='.$row['ACCID'].'">Hire</a></td>
                <td> <a href="?chief_rejectJob&jobId='.$row['JOBID'].'&staffId='.$row['ACCID'].'">Reject</a></td>    
            </tr>';
                }
               
              }
            ?>

          </table>

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
                        

<script src="../../../lib/js/mobile.js"></script>
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
