<?php ob_start(); ?>
<?php
session_start();
?>

<?php
if (isset($_SESSION["userId"]) && $_SESSION['status']=="Staff")
{


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
                   
                    <ul>
                    <li><a href="?staff_messages" class="hvr-underline-from-center">Messages</a></li>
                        <li><a href="?staff_changePassword" class="hvr-underline-from-center1">Security</a></li>
                        <li><a href="?staff_profile" class="hvr-underline-from-center1">Profile</a></li>
                        <li><a href="?staff_logout" class="hvr-underline-from-center1">Logout</a></li>
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
            
             <ul>
               <div ><li><a href="?staff_home" class="hvr-underline-from-center1">Home</a></li></div>
               <div ><li><a href="?staff_clan" class="hvr-underline-from-center1">Team</a></li></div>
               <div ><li><a href="?staff_notice" class="hvr-underline-from-center1">Notice</a></li></div>
               <div ><li><a href="?staff_bidRequest" class="hvr-underline-from-center1">Requests</a></li></div>
               <div ><li><a href="?staff_payment" class="hvr-underline-from-center1">Payment</a></li></div>
               <div ><li><a href="?staff_job" class="hvr-underline-from-center1">Jobs</a></li></div>
            </ul>
         </nav>



</div>

<!-- Main content-->

<div class="content1"  style="background-color: white;border:none">
    <div   id="dis" style="width: 100%; margin:1px; padding: 2px;height: 100%;overflow:scroll ;height: 250px;">
            <h4 style="float: none; padding-left: 10px; color:#333">Notice</h4><br/>

<?php

$result=$_SESSION['notice'];
if ($result=="false") {
  echo '<h4 style="float: none; text-align:center;padding-left: 8px; color:#333">No Notice To Display</h4><br/>';
}else{
foreach($result as $key => $value){

  $noticeTitle=$result[$key]['TITLE'];
  $noticeFrom=$result[$key]['FROM_ACCID'];
  $noticeDate=$result[$key]['DATE'];
  $noticeTime=$result[$key]['TIME'];
  $noticeDetails=$result[$key]['NOTICE'];
echo "<div class='divFlot' style='width:900px;height:130px;margin:0 auto;background-color:#f1f1f1 '>
  <div  style='width:895px;height:30px;margin:0 auto;margin-top: 5px;text-align: left;padding-left:5px '>NoticeId: $key</div>
  <div style='width:895px;height:50px;margin:0 auto;margin-top: 5px;text-align: left;padding-left:5px'><span>Title:$noticeTitle</span><span style='margin-left:20px'> From:$noticeFrom</span><br><br><span>Date:$noticeDate</span><span style='margin-left:20px'> Time:$noticeTime</span></div>
  <div class='divFlot' style='width:895px;height:30px;margin:0 auto;margin-top: 5px;text-align: left;padding-right:5px;text-align:right;padding:5px '><a   class='aButton' style='margin-left:10px' onclick='getNoticeDetail()' >Details..</a>
  <span style='display:none;' id='detail'>$noticeDetails</span></div>
</div><br>";


}
}
?>

    </div>

    <div   id="dis" style="width: 100%; margin:1px; padding: 2px;height: 100%;overflow:scroll ;height: 250px;">
            <h4 style="float: none; padding-left: 10px; color:#333">All Team Notice</h4><br/>

<?php

$teamNotice=$_SESSION['teamNotice'];
if ($teamNotice=="false") {
  echo '<h4 style="float: none; text-align:center;padding-left: 8px; color:#333">No Team Notice To Display</h4><br/>';
}else{
foreach($teamNotice as $key => $value){

  $noticeTitle=$teamNotice[$key]['TITLE'];
  $noticeFrom=$teamNotice[$key]['FROM_ACCID'];
  $noticeDate=$teamNotice[$key]['DATE'];
  $noticeTime=$teamNotice[$key]['TIME'];
  $noticeDetails=$teamNotice[$key]['NOTICE'];
echo "<div class='divFlot' style='width:900px;height:130px;margin:0 auto;background-color:#f1f1f1 '>
  <div  style='width:895px;height:30px;margin:0 auto;margin-top: 5px;text-align: left;padding-left:5px '>NoticeId: $key</div>
  <div style='width:895px;height:50px;margin:0 auto;margin-top: 5px;text-align: left;padding-left:5px'><span>Title:$noticeTitle</span><span style='margin-left:20px'> From:$noticeFrom</span><br><br><span>Date:$noticeDate</span><span style='margin-left:20px'> Time:$noticeTime</span></div>
  <div class='divFlot' style='width:895px;height:30px;margin:0 auto;margin-top: 5px;text-align: left;padding-right:5px;text-align:right;padding:5px '>
  <span style='display:none;' id='detail'>$noticeDetails</span></div>
</div><br>";


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
        xhttp.open("GET", "../../controller/staff_controller.php?status=staff&user="+user+"&obj="+obj+"&AjaxView=searchResult", true);
        xhttp.send();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
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
        xhttp.open("GET", "../../controller/staff_controller.php?status=staff&user="+user+"&AjaxView=searchDetails", true);
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


        function getJobDetails(cell,applied) {
            modal.style.display = "block";

 var user =cell.innerHTML;
 

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../../controller/staff_controller.php?status=staff&user="+user+"&applied=0&AjaxView=searchJobDetails", true);
        xhttp.send();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("modelContent").innerHTML = this.responseText;
}
}
}

  function getJobDetailsHome(cell,applied) {
            modal.style.display = "block";

 var user =cell;
 

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "../../controller/staff_controller.php?status=staff&user="+user+"&applied="+applied+"&AjaxView=searchJobDetails", true);
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

            function getNoticeDetail()
            {
               var v=document.getElementById("detail").innerHTML
               modal.style.display = "block";
               document.getElementById("modelContent").innerHTML = v;
            }


    </script>




</body>
</html>



<?php
}

 define("APP_ROOT", "$_SERVER[DOCUMENT_ROOT]/HireHAT");
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
