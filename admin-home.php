<?php
include '../conection/conn.php';



?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرئيسية</title>
    <!-- css and bootstrap  folder -->
<style>
    <?php 
    include './css/home.css';
    include './css/bootstrap.rtl.min.css';
    ?> 
</style>
</head>
<body style="background-image: url(./img/new-Background3.jpg);">
<!--#################### nav bar tags  #################### -->
<div class="card-body" style="box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.349);font-weight: bold;
  overflow: hidden; border-top: 1px solid rgb(255, 255, 255, 0.5);
  border-left: 1px solid rgb(255, 255, 255, 0.5);">
    <h1 class="card-title  text-center text-white mt-3  " >برنامج أدارة المؤسسات الأهلية</h1>
    <p  id="title" class="card-text  text-center text-white mt-3 " style="font-size:30px;">الصفحة الرئيسية</p>
</div>
    <div class="container">
    <div class="row align-items-center g-lg-7 py-5">
    <div class="col-md-10 col-lg-5 con">
    <!-- #####card###### -->
        <div class="card">
            <div class="content">
                <h1><a href="op/create.php">تأسيس</a></h1>
            </div>
        </div>
    <!-- #####card###### -->
        <div class="card">
            <div class="content">
                <h1><a href="op/update.php">تحديث أو تجديد</a></h1>
            </div>
        </div>
    <!-- #####card###### -->
        <div class="card">
            <div class="content">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <h1><a href="./reports.php"> تقارير </h1>
              </button>
            </div>
        </div>
      <!-- #####card###### -->
      <div class="card">
            <div class="content">
                <h1><a href="">الاعدادات</a></h1>
            </div>
        </div>
        </div>
        <div class="col-lg-5 text-center text-m-start">
        <img src="img/logo.png" style="width:30em; ">
    </div> 
    </div> 
    </div>   

    
<!-- javascript  folder-->
<script src="js/bootstrap.bundle.min.js">
</script>
<!-- javascript  fanction-->
    <script src="js/vanilla-tilt.js"></script>
    <script>
        VanillaTilt.init(document.querySelectorAll(".card"), {
		max: 25,
		speed: 400,
        glare:true,
        "max-glare":1,
	});
    </script>
</body>
</html>