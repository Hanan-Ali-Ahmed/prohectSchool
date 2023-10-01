<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرئيسية</title>
    <!-- Include CSS and Bootstrap -->
    <style>
        <?php include './css/home.css'; ?>
        <?php include './css/bootstrap.rtl.min.css'; ?>
      
    </style>
</head>
<body >
<!--#################### nav bar tags  #################### -->
<div class="card-body" style="box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.349);font-weight: bold;
  overflow: hidden; border-top: 1px solid rgb(255, 255, 255, 0.5);
  border-left: 1px solid rgb(255, 255, 255, 0.5);">
    <h1 class="card-title  text-center text-white mt-3  " >برنامج أدارة المؤسسات الأهلية</h1>
    <p  id="title" class="card-text  text-center text-white mt-3 " style="font-size:30px">الصفحة الرئيسية</p>
</div>
    <div class="container">
        <div class="row align-items-center g-lg-5 py-5">
            <!-- Content Column -->
            <div class="col-md-10 mx-auto col-lg-7 order-lg-1 con">
                <!-- Card 1 -->
                <div class="card user-page mb-4" style="height: 150px">
                    <div class="content">
                        <h1><a href="op/create.php">تأسيس</a></h1>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="card user-page" style="height: 150px">
                    <div class="content">
                        <h1><a href="op/update.php">تحديث أو تجديد</a></h1>
                    </div>
                </div>
            </div>
             <!-- Image Column -->
             <div class="col-lg-5 text-center text-m-start order-lg-2 img1">
                <img src="img/logo.png" style="width: 30em;">
            </div>
        </div>
    </div><!-- #################### footer tags #################### -->
  <!-- #################### footer tags #################### -->
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3  mx-5 border-top">
    <div class="col-12 col-sm-4 text-center text-md-start text-white">
        <p style="font-size:18px;">&copy; 2023 جميع الحقوق محفوظة لدى مركز المعلومات والاتصالات</p>
    </div>
  
    <div class="col-12 col-sm-4 text-center text-md-end text-white">
        <p style="font-size:20px;">مديرية التخطيط التربوي</p>
    </div>
</footer>

    <!-- Include Bootstrap JavaScript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Include Vanilla Tilt JavaScript -->
    <script src="js/vanilla-tilt.js"></script>
    <script>
        VanillaTilt.init(document.querySelectorAll(".card"), {
            max: 25,
            speed: 400,
            glare: true,
            "max-glare": 1,
        });
    </script>
</body>
</html>
