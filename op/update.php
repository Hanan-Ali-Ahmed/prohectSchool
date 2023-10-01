<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/update.css">
  <link rel="stylesheet" href="../css/bootstrap.rtl.min.css">
  <link rel="stylesheet" href="./webfonts/">
  <link rel="stylesheet" href="../css/all.css">
  <title>تحديث او تجديد</title>

  <style>
        <?php include '../css/update.css'; ?>
      
    </style>
</head>
<body>
<!--#################### nav bar tags  #################### -->
<div class="card-body" style="box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.349);font-weight: bold;
  overflow: hidden; border-top: 1px solid rgb(255, 255, 255, 0.5);
  border-left: 1px solid rgb(255, 255, 255, 0.5);">
    <h1 class="card-title  text-center text-white mt-3  " >برنامج أدارة المدارس الأهلية</h1>
    <p  id="title" class="card-text  text-center text-white mt-3 " style="font-size:30px;">  تحديث أو تجديد </p>
</div>
<!-- ####################### search ########################## -->
<!-- <div class="continer">  -->
<div class="input-group w-50 m-auto mt-5 ">
  <input class="   mx-3 " type="search"  id="example-search-input" placeholder="ابحث">         
  <span class="input-group-append">
      <button class="btn btn-outline-secondary ms-n3" type="button">
          <i class="fa fa-search"></i>
      </button>
  </span>
</div>
<br><br>
<!-- /////////////////////the table -->
<table class="tbl" style="margin-bottom:30px">
  <thead >
    <tr>
      <th scope="col" >المديرية</th>
      <th scope="col">اسم المؤسسة</th>
      <th scope="col">حالة البيانات</th>
      <th scope="col" style="width: 59px;">تعديل</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row">1</td>
      <td>Mark</td>
      <td>مكتمل</td>
      <td><a href="../reports.html"><i class="fas fa-pen"></i></a></td>
    </tr>
    <tr>
      <td scope="row">2</td>
      <td>Jacob</td>
      <td>غير مكتمل</td>
      <td><a><i class="fas fa-pen"></i></a></td>
    </tr>
    <tr>
      <td scope="row">3</td>
      <td>@twitter</td>
      <td>مكتمل</td>
      <td><a><i class="fas fa-pen"></i></a></td>
    </tr>
    <tr>
      <td scope="row">3</td>
      <td>@twitter</td>
      <td>مكتمل</td>
      <td><a><i class="fas fa-pen"></i></a></td>
    </tr>
  </tbody>
</table>
 <!-- #################### footer tags #################### -->
 <footer class="d-flex flex-wrap justify-content-between align-items-center py-3  mx-5 border-top" style="position:fixed;bottom:0;right:0;left:0">
    <div class="col-12 col-sm-4 text-center text-md-start text-white" >
        <p style="font-size:18px;">&copy; 2023 جميع الحقوق محفوظة لدى مركز المعلومات والاتصالات</p>
    </div>
    <div class="col-12 col-sm-4 text-center mb-3 mb-md-0">
        <img src="../img/logo.png" class="img-fluid mx-auto" width="70" height="70" alt="Logo">
    </div>
    <div class="col-12 col-sm-4 text-center text-md-end text-white">
        <p style="font-size:20px;">مديرية التخطيط التربوي</p>
    </div>
</footer>
<!-- javascript link -->
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>