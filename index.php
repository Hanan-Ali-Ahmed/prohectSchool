<?php
include './conection/conn.php';
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <style>
        @font-face {
    font-family: almarai;
    src: url(fonts/ArbFONTS-Omar-Regular-1.ttf);
    }
    body{
    font-family:almarai; 
    } 
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
     <!-- css folder --> 
     <link rel="stylesheet" href="css/index.css">
    <title>تسجيل الدخول</title>
</head>
<body>
    <!--واجهه الدخول للنظام -->
    <form class="custom-form" method="post">
            <h2 class="log ">الدخول للنظام</h2>
            <!-- حقل اختيار المديرية -->
                    <div class="">
                        <select  class=""  id="sel2" name="Dir">
                        <option hidden>اختر المديرية</option>
                            <?php selectDir() ?>
                        </select>
                    </div>
            <!-- حقل ادخال الرمز  -->
            <div class="mb-3 ">
                <input type="password" name="password" class="" placeholder="كلمة السر" style="font-family: 'Almarai', sans-serif;" required>
            </div>
           <!-- زر تسجيل الدخول  -->
              <button type="submit" name="btnSign" class="" style="font-family: 'Almarai', sans-serif;">تسجيل الدخول</button>
            <a class="admin" data-bs-toggle="modal" data-bs-target="#exampleModal"> الدخول كمسؤول</a>
            <?php
    session_start();
    if(isset($_POST["btnSign"])){
        $Dir = $_POST["Dir"];
        $pass = $_POST["password"];
        $sql = "SELECT  `Dir_name`, `User_password` FROM `tbl_users` WHERE `Dir_name` ='$Dir' AND `User_password`='$pass'";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $result=$stmt->get_result();
        function  pass($r){
                    while($row=$r->fetch_assoc()){
                            return $row ['Dir_name'];
                            }
                            }
                            if(pass($result) == ""){
                            echo "<div class='alert  alertPassword' role='alert' style='margin-top: 13px;'>"
                        . '*كلمة السر غير صحيحة ' .
                            "</div>";
                            }else{
                                $_SESSION['pass1']=$pass;
                            $_SESSION['dir1']=$Dir;
                                header ("location:user-home.php"); 
                            }  
                        }
    ?>      
    </form>
<!-- ###################         الدخول كمسؤول Modal -->
<form id="loginForm" action="adminSign.php" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      
          <label class="pl-3 pt-2"  >اسم المستخدم</label>
          <input type="text" class="form-control ml-3 col-11"  id="admin" name="admin" require >
        </div>
       <div class="form-group">
          <label class="pl-3 pt-2"  >كلمة السر </label>
          <input type="password" class="form-control ml-3 col-11"  id="adminPass" name="adminPass" require>
        </div>
      </div>
      <!-- زر تسجيل الدخول كمسؤول -->
      <div class="modal-footer">
     <button type="submit"  class="btn me-auto" id="btnsignadmin" name="btnAdmin" > تسجيل الدخول</button>
      </div> 
      <div class='alert  alertPassword' role='alert' id="alrt" hidden> </div>                               
    </div>
  </div>
</div> 
 </form>
<!-- ############## js function ################## -->
    <script src="js/vanilla-tilt.js"></script>
    <script>
        VanillaTilt.init(document.querySelectorAll(".custom-form"), {
		max: 10,
		speed: 300,
        "max-glare":1,
	});

  document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the form from submitting normally

    // Get the form values
  let  admin  = document.getElementById("admin").value,
       adminPass = document.getElementById("adminPass").value,
       alrt =  document.getElementById("alrt");

    // Perform basic client-side validation
    if (!admin || !adminPass) {
      alrt.hidden = false 
      alrt.innerHTML = "*يرجى ادخال اسم المستخدم او كلمة السر"
   
        return;
    }

    // Send a POST request to the server to handle authentication
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'adminSign.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.readyState == 4 && xhr.status === 200 && xhr.responseText ==="ok") {

          console.log(xhr.responseText)
            // Authentication successful, redirect or perform necessary actions
           
            window.location.href = 'admin-home.php'; // Redirect to a dashboard page
        } else {
            // Authentication failed
            alrt.hidden = false
            alrt.innerHTML = "اسم المستخدم او  كلمة السر غير صحيحة"  
        }
    };

    xhr.send('username=' + encodeURIComponent(admin) + '&password=' + encodeURIComponent(adminPass));
});

    </script>
<!-- javascript  folder-->
<script src="js/bootstrap.bundle.min.js" ></script>
</body>
</html>