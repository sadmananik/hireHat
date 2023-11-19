<?php ob_start(); ?>
<?php
session_start();
?>

<?php
if (isset($_SESSION["userId"]) && $_SESSION['status']=="Chief")
{
//echo "<h1> Welcome Home Admin </h1>";
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
         
    <div style="width: 100%; margin:1px; padding-top: 20px; padding-bottom:10px;  border: 1px solid black; height: auto; ">

        <form method="POST">
            <fieldset>
            <legend >Job Details:</legend>
            <br>
             <table>
             <tr>
                <td align="left">Job Title:
                     <div style="margin-top: -19px; text-align: center;" >  
                      <?php
                      if (isset($_POST['jobTitle'])) {

                           echo '<input style="text-align: center;" type="text" placeholder="t  i  t  l  e" value="'.$_POST['jobTitle'].'"  name="jobTitle">';
                      }else if (isset($_SESSION['jobTitle'])) {
                         echo '<input style="text-align: center;" type="text" placeholder="t  i  t  l  e" value="'.$_SESSION['jobTitle'].'"  name="jobTitle">';
                      }
                      else
                       {
                         echo '<input style="text-align: center;" type="text" placeholder="t  i  t  l  e" value=""  name="jobTitle">';
                        }
                     ?>
                      </div>
                </td>
                <td align="left">Description :
                     <div style="margin-top: -19px; text-align: center;" > 
                      <?php
                      if (isset($_POST['jobDetails'])) {
                            echo '<textarea name="jobDetails" rows="4" cols="20" placeholder="Write in brief about your job post">'.$_POST['jobDetails'].'</textarea>';
                      }else if (isset($_SESSION['jobDetails'])) {
                         echo '<textarea name="jobDetails" rows="4" cols="20" placeholder="Write in brief about your job post">'.$_SESSION['jobDetails'].'</textarea>';;
                      }else
                       {
                         echo '<textarea name="jobDetails" rows="4" cols="20" placeholder="Write in brief about your job post"></textarea>';
                        }
                     ?>           
                    </div>
                </td>
            </tr>

            <tr>
                <td align="left">Department :
                     <div style="margin-top: -19px; text-align: center;" > 
                      <?php
                      if (isset($_POST['dept'])) {

                            echo '<input style="text-align: center;" name="dept" type="text" placeholder="" value="'.$_POST['dept'].'" >';
                      }else if (isset($_SESSION['dept'])) {
                         echo '<input style="text-align: center;" name="dept" type="text" placeholder="" value="'.$_SESSION['dept'].'" >';
                      }else
                       {
                         echo '<input style="text-align: center;" name="dept" type="text" placeholder="" value="" >';
                      }
                     ?>    
                      </div>
                </td>
                <td align="left">Job Type :
                     <div style="margin-top: -19px; text-align: center;" > 
                        <select name="Jobtype" style="padding: 3px 38px;">
                          <?php 
                          if(isset($_POST['Jobtype'])){ 
                          ?>
                            <option value="Freelancer"  <?php  echo (isset($_POST['Jobtype']) && $_POST['Jobtype']=="Freelancer")?'selected':'' ?> >Freelancer</option>
                            <option value="Part-Time"  <?php echo (isset($_POST['Jobtype']) && $_POST['Jobtype']=="Part-Time")?'selected':'' ?> >Part-time</option>
                            <option value="Full-Time"  <?php echo (isset($_POST['Jobtype']) && $_POST['Jobtype']=="Full-Time")?'selected':'' ?> >Full-time</option>
                          <?php
                          }
                          else if (isset($_SESSION['Jobtype'])) {
                           ?>
                           <option value="Freelancer"  <?php  echo ($_SESSION['Jobtype']=="Freelancer")?'selected':'' ?> >Freelancer</option>
                            <option value="Part-Time"  <?php echo ($_SESSION['Jobtype']=="Part-Time")?'selected':'' ?> >Part-time</option>
                            <option value="Full-Time"  <?php echo ($_SESSION['Jobtype']=="Full-Time")?'selected':'' ?> >Full-time</option>
                            <?php } else{?>
                            <option value="Freelancer"  <?php  echo (isset($_POST['Jobtype']) && $_POST['Jobtype']=="Freelancer")?'selected':'' ?> >Freelancer</option>
                            <option value="Part-Time"  <?php echo (isset($_POST['Jobtype']) && $_POST['Jobtype']=="Part-Time")?'selected':'' ?> >Part-time</option>
                            <option value="Full-Time"  <?php echo (isset($_POST['Jobtype']) && $_POST['Jobtype']=="Full-Time")?'selected':'' ?> >Full-time</option>
                            <?php } ?>
                        </select>
                    </div>
                </td>
            </tr>

            <tr>
                <td align="left">Designation :
                     <div style="margin-top: -19px; text-align: center;" > 
                      <?php
                      if (isset($_POST['designation'])) {

                            echo ' <input style="text-align: center;" type="text" name="designation" value="'.$_POST['designation'].'" placeholder="e.g: managers/others"> ';
                      }else if (isset($_SESSION['designation'])) {
                         echo ' <input style="text-align: center;" type="text" name="designation" value="'.$_SESSION['designation'].'" placeholder="e.g: managers/others"> ';
                      }
                      else
                       {
                         echo ' <input style="text-align: center;" type="text" name="designation" value="" placeholder="e.g: managers/others"> ';
                        }
                     ?>
                    
                      </div>
                </td>
                <td align="left">Job Location :
                     <div style="margin-top: -19px; text-align: center;" > 
                        
                                              <?php
                      if (isset($_POST['jobLocation'])) {
                            echo '<input style="text-align: center;" type="text" name="jobLocation" placeholder="" value="'.$_POST['jobLocation'].'" >';
                           }else if (isset($_SESSION['jobLocation'])) {
                         echo '<input style="text-align: center;" type="text" name="jobLocation" placeholder="" value="'.$_SESSION['jobLocation'].'" >';
                      }
                      else
                       {
                         echo '<input style="text-align: center;" type="text" name="jobLocation" placeholder="" value="" >';
                        }
                     ?> 
                    </div>
                </td>
            </tr>

            <tr>
                <td align="left">Salary Type :
                     <div style="margin-top: -19px; text-align: center;" > 
                        <select name="Saltype" style="padding: 3px 35px;">
                          <?php if (isset($_SESSION['salaryType'])) { ?>
                           <option value="Daily" <?php echo ($_SESSION['salaryType']=="Daily")?'selected':'' ?> >Daily</option>
                            <option value="Weekly" <?php echo ($_SESSION['salaryType']=="Weekly")?'selected':'' ?> >Weekly</option>
                            <option value="Monthly" <?php echo ($_SESSION['salaryType']=="Monthly")?'selected':'' ?> >Monthly</option>
                            <option value="Delivery" <?php echo ($_SESSION['salaryType']=="Delivery")?'selected':'' ?> >On Delivery</option>
                          
                          <?php
                          } else{
                          ?>
                            <option value="Daily" <?php echo (isset($_POST['Saltype']) && $_POST['Saltype']=="Daily")?'selected':'' ?> >Daily</option>
                            <option value="Weekly" <?php echo (isset($_POST['Saltype']) && $_POST['Saltype']=="Weekly")?'selected':'' ?> >Weekly</option>
                            <option value="Monthly" <?php echo (isset($_POST['Saltype']) && $_POST['Saltype']=="Monthly")?'selected':'' ?> >Monthly</option>
                            <option value="Delivery" <?php echo (isset($_POST['Saltype']) && $_POST['Saltype']=="Delivery")?'selected':'' ?> >On Delivery</option>
                            <?php } ?>
                        </select>
                      </div>
                </td>
                <td align="left">Salary :
                     <div style="margin-top: -19px; text-align: center;" > 
                        
                     <?php
                      if (isset($_POST['salary'])) {

                            echo '<input  style="text-align: center;" type="text" name="salary" placeholder="" value="'.$_POST['salary'].'" > ';
                      }else if (isset($_SESSION['salary'])) {
                         echo '<input  style="text-align: center;" type="text" name="salary" placeholder="" value="'.$_SESSION['salary'].'" > ';
                      }
                      else
                       {
                         echo '<input  style="text-align: center;" type="text" name="salary" placeholder="" value="" > ';
                        }
                     ?> 
                    </div>
                </td>
            </tr>

            <tr>
                <td align="left">Vacancy :
                     <div style="margin-top: -19px; text-align: center;" > 
                        
                      <?php
                      if (isset($_POST['vacancy'])) {

                            echo '<input style="text-align: center;" type="text" name="vacancy" placeholder="No of Employee For Hire" value="'.$_POST['vacancy'].'" > ';
                      }else if (isset($_SESSION['vacancy'])) {
                          echo '<input style="text-align: center;" type="text" name="vacancy" placeholder="No of Employee For Hire" value="'.$_SESSION['vacancy'].'" > ';
                      }
                      else
                       {
                         echo '<input style="text-align: center;" type="text" name="vacancy" placeholder="No of Employee For Hire" value="" > ';
                        }
                     ?> 
                      </div>
                </td>
                <td align="left">Last Date For Apply :
                     <div style="margin-top: -19px; text-align: center;" > 
                        
                      <?php
                      if (isset($_POST['lastDate'])) {

                            echo '<input  style="text-align: center;  padding: 0px 7px;" name="lastDate" type="date" placeholder="" value="'.$_POST['lastDate'].'" > ';
                      }else if (isset($_SESSION['lastDate'])) {
                           echo '<input  style="text-align: center;  padding: 0px 7px;" name="lastDate" type="date" placeholder="" value="'.$_SESSION['lastDate'].'" > ';
                      }
                      else
                       {
                         echo '<input  style="text-align: center;  padding: 0px 7px;" name="lastDate" type="date" placeholder="" value="" > ';
                        }
                     ?> 
                    </div>
                </td>
            </tr>

        </table>
            </fieldset>
            <br>

            <fieldset>
            <legend >Employee Requirement:</legend>
            <br>
             <table>

            <tr>
                <td align="left">Education :
                     <div style="margin-top: -19px; text-align: center;" > 
                        
                       <?php
                      if (isset($_POST['education'])) {

                            echo '<input style="text-align: center;" type="text" name="education" placeholder="e.g: Bsc.in CSE, BBA" value="'.$_POST['education'].'" >';
                      }else if (isset($_SESSION['education'])) {
                            echo '<input style="text-align: center;" type="text" name="education" placeholder="e.g: Bsc.in CSE, BBA" value="'.$_SESSION['education'].'" >';
                      }
                      else
                       {
                         echo '<input style="text-align: center;" type="text" name="education" placeholder="e.g: Bsc.in CSE, BBA" value="" > ';
                        }
                     ?> 
                      </div>
                </td>
                <td align="left">Experience :
                     <div style="margin-top: -19px; text-align: center;" > 
                         
                      <?php
                      if (isset($_POST['experience'])) {

                            echo '<input style="text-align: center;" type="text" name="experience" value="'.$_POST['education'].'" placeholder="e.g: 5 years experience">';
                      }else if (isset($_SESSION['experience'])) {
                            echo '<input style="text-align: center;" type="text" name="experience" value="'.$_SESSION['education'].'" placeholder="e.g: 5 years experience">';
                      }
                      else
                       {
                         echo '<input style="text-align: center;" type="text" name="experience" value="" placeholder="e.g: 5 years experience">';
                        }
                     ?> 
                    </div>
                </td>
            </tr>

            <tr>
                <td style="width: 50%" align="left">Gender :
                     <div style="margin-top: -19px; text-align: center;" > 
                      <?php if (isset($_SESSION['gender'])) { ?>
                        <input type="radio" name="gender"  value="Male" <?php echo ($_SESSION['gender'] == "Male")?'checked':'' ?> >Male
                        <input type="radio" name="gender"  value="Female" <?php echo ($_SESSION['gender'] == "Female")?'checked':'' ?> >Female
                        <input type="radio" name="gender"  value="Both" <?php  echo ($_SESSION['gender'] == "Both")?'checked':'' ?>  >Both
                      <?php 
                     }else{ 
                      ?>
                        <input type="radio" name="gender"  value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == "Male")?'checked':'' ?> >Male
                        <input type="radio" name="gender"  value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == "Female")?'checked':'' ?> >Female
                        <input type="radio" name="gender"  value="Both" <?php  echo (isset($_POST['gender']) && $_POST['gender'] == "Both")?'checked':'' ?>  >Both
                        <?php } ?>
                      </div>
                </td>
                <td align="left">Age :
                     <div style="margin-top: -19px; text-align: center;" > 
                        
                      <?php
                      if (isset($_POST['age'])) {

                            echo '<input style="padding: 0px 48px" type="number" name="age" min="18" max="100" placeholder=">=18" value="'.$_POST['age'].'" >';
                      }else if (isset($_SESSION['age'])) {
                            echo '<input style="padding: 0px 48px" type="number" name="age" min="18" max="100" placeholder=">=18" value="'.$_SESSION['age'].'" >';
                      }
                      else
                       {
                         echo '<input style="padding: 0px 48px" type="number" name="age" min="18" max="100" placeholder=">=18" >';
                        }
                     ?> 
                    </div>
                </td>
            </tr>

            <tr>
               <?php 
            if (isset($_SESSION['jobID'])) {
              echo '<td> <button name="postThisJob" formaction="?chief_saveJobEdit" style="padding: 8px 15px;">Save Edit</button> </td>';
              echo '<td> <button name="postThisJob" formaction="?chief_deleteJob&jobID='.$_SESSION['jobID'].'" style="padding: 8px 15px;">Delete Post</button> </td>';
            }else{
             ?>
             <tr>
              <td colspan="2">
                <button name="postThisJob" formaction="?chief_publishJob" style="padding: 8px 15px;">Post This Job</button>
              </td>
             </tr>
            <?php 
              }
             ?>
            </tr>

        </table>
            </fieldset>

            <br>
           
        </form>

    </div>

<?php

        $GLOBALS['phpValidation'] ="false";

        if (isset($_POST['postThisJob'])) {

        $jobTitle=trim($_POST['jobTitle']," ");
        $jobDetails=trim($_POST['jobDetails']," ");
        $salary=trim($_POST['salary']," ");
        $lastDate=trim($_POST['lastDate']," ");
        $age=trim($_POST['age']," ");
        if (isset($_POST['gender'])) {
          $gender=trim($_POST['gender']," ");
        }
        $vacancy=trim($_POST['vacancy']," ");

        if ($jobTitle==""){  
         echo '<span id="validationError">Job Title Can not be empty</span>';
        }else if ($jobDetails=="") {
            echo '<span id="validationError">Job Description Can not be empty</span>';
        }else if ($vacancy=="") {
            echo '<span id="validationError">Please mention vacancy</span>';
        }else if (!preg_match("/^[0-9.,]*$/",$vacancy)) {
            echo '<span id="validationError">Vacancy Can not have Character</span>';
        }else if ($salary=="") {
            echo '<span id="validationError">Please mention salary</span>';
        }else if (!preg_match("/^[0-9.,]*$/",$salary)) {
            echo '<span id="validationError">Salary Can not have Character</span>';
        }else if (!preg_match("/^[0-9.,]*$/",$age) || $age<18) {
            echo '<span id="validationError">Age Can not have Character and <18</span>';
        }else if ($lastDate<date("Y-m-d")) {
            echo '<span id="validationError">Last date can not be past</span>';
        }else{
                $GLOBALS['phpValidation'] ="true";
        }
      

        }
?>
</div>
</div>

 
          <div id="d"></div>
                <div id="myModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content" >
          
            <span class="close">&times;</span>
    <div  id="modelContent" class="con"></div>
    
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
