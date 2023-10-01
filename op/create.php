<?php 
include '../conection/conn.php';
include '../functions.php';
?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.rtl.min.css">
  <link rel="stylesheet" href="./webfonts/">
  <link rel="stylesheet" href="../css/all.css">
  <title>تأسيس</title>
  <!-- css style -->
  <style>
    <?php include '../css/create.css';
    ?>
  </style>
</head>
<body >
<!--#################### nav bar tags  #################### -->
<div class="card-body" style="box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.349);font-weight: bold;
  overflow: hidden; border-top: 1px solid rgb(255, 255, 255, 0.5);
  border-left: 1px solid rgb(255, 255, 255, 0.5);">
    <h1 class="card-title  text-center text-white mt-3  " >برنامج أدارة المدارس الأهلية</h1>
    <p  id="title" class="card-text  text-center text-white mt-3 " style="font-size:30px;">  تأسيس </p>
</div>
<div class="container-fluid text-white mt-5 p-4 create"  style="width: 90%;" id="page1">
    <div  id="box" class="row g-3 px-3 ">
<center>
<h4>المعلومات الاساسية</h4>
</center>
<!-- ####################  ترميزالمؤسسة  #################### -->  
<div class="col-md-4 col-sm-6">
          <label for="inputZip" class="form-label">ترميز المؤسسة </label>
          <input type="text" name="p1InstituteNO"  class="form-control status" id="p1InstituteNO" readonly>
        </div>
<!-- ####################  نوع المؤسسة  #################### -->  
<div class="col-md-4 col-sm-6">
          <label for="inputState" class="form-label " >نوع المؤسسة</label>
          <select id="p1InstituteType" class="form-select status" onchange="InstituteType(this.value)" required > 
            <option hidden></option>
            <option value="1">روضة</option>
            <option value="3">معهد</option>
            <option value="2">مدرسة</option>
          </select>
        </div>
<!-- #################### اسم المؤسسة  #################### -->
      <div class="col-md-4 col-sm-6">
        <label for="inputEmail4" class="form-label ">اسم المؤسسة</label>
            <input type="text" name="p1InstituteFullName"  class="form-control  status" id="p1InstituteFullName" required>
        </div>
<!-- #################### اختصاص المؤسسة  #################### -->
<div class="col-md-4 col-sm-6">
        <label for="inputPassword4" class="form-label">اختصاص المعهد</label>
        <select id="p1ikhtisas" class="form-select status" disabled >
          <?php
            select_Ikhtisas_name();
          ?>
        </select>
      </div>
<!-- #################### مستوى التعليم   #################### -->
<div class="col-md-4 col-sm-6">
        <label for="inputState" class="form-label"> مستوى التعليم </label>
        <select id="p1InstituteLevel" class="form-select status" disabled>
          <?php
          select_InstituteLevel();
          ?>
        </select>
      </div>
<!-- #################### جنس المؤسسة  #################### -->
      <div class="col-md-4 col-sm-6">
        <label for="inputState" class="form-label"> جنس المؤسسة</label>
        <select id="p1gender" class="form-select status" onchange="InstituteType(this.value)"disabled>
          <option value="4" hidden>لايوجد</option>
       <option value="1">مختلط</option>
          <option value="2">بنين</option>
          <option value="3">بنات</option>
          
        </select>
      </div>
<!-- #################### مكان المبنى   #################### -->
      <div class="col-md-4 col-sm-6">
        <label for="inputState" class="form-label"> مكان المبنى</label>
        <select id="p1InOut_ID" onchange="countryfilterIN_OUT()" class="form-select status">
          <option hidden></option>
          <option value="1">داخل العراق</option>
          <option value="2">خارج العراق </option>
        </select>
      </div>
<!-- ################### الدولة  #################### -->
      <div class="col-md-4 col-sm-6">
        <label for="inputState" class="form-label"> الدولة </label>
        <select id="p1country"  class="form-select status" disabled required>
          <option hidden></option>
          <?php 
          selectcountry();
          ?>
        </select>
      </div>
<!-- #################### المديرية #################### -->
      <div class="col-md-4 col-sm-6">
        <label for="inputState" class="form-label"> المديرية</label>
        <select id="p1directorate"  class="form-select status" disabled required>
          <option hidden></option>
          <?php select_directorate_name() ?>
        </select>
      </div>
<!-- ####################  تاريخ التاسيس#################### -->
      <div class="col-md-4 col-sm-6">
        <label for="inputZip" class="form-label">تاريخ التأسيس</label>
        <input type="date" class="form-control status" id="p1establishing_date">
      </div>
<!-- #################### تاريخ اخر تجديد   #################### -->
      <div class="col-md-4 col-sm-6">
        <label for="inputZip" class="form-label">تاريخ اخر تجديد</label>
        <input type="date" class="form-control status" id="P1next_renewal_date" onchange="updatematurity_period(this)">
      </div>
<!-- #################### نوع الازدواج#################### -->
      <div class="col-md-4 col-sm-6">
        <label for="inputZip" class="form-label">نوع الازدواج</label>
        <input type="text" class="form-control status" id="p1type_duplication">
      </div>
<!-- ####################  نوع العقار #################### -->
      <div class="col-md-4 col-sm-6">
        <label for="inputState" class="form-label"> نوع العقار</label>
        <select id="P1type_property" class="form-select status">
          <option hidden></option>
          <option VALUE="1">أيجار </option>
          <option VALUE="2">ملك صرف </option>
          <option VALUE="3">مساطحة </option>
          <option VALUE="4">أجازة أستثمار </option>
        </select>
      </div>
<!-- ####################  فترة الاستحقاق#################### -->
      <div class="col-md-4 col-sm-6">
        <label for="inputZipp" class="form-label">فترة الاستحقاق</label>
        <input type="text" class="form-control" id="P1maturity_period">
      </div>
<!-- #################### عنوان المؤسسة  #################### -->
      <div class="col-md-4 col-sm-6  ">
        <label for="inputZip" class="form-label">عنوان المؤسسة </label>
        <input type="text" class="form-control status" id="p1addres">
      </div>
<!-- #################### جنس العقار  #################### -->
      <div class="col-md-4 col-sm-6">
        <label for="inputState" class="form-label"> جنس العقار </label>
        <select id="P1gender_property" class="form-select status">
          <option hidden></option>
          <option VALUE="1">ملك صرف </option>
          <option VALUE="2">زراعي </option>
          <option VALUE="3"> تجاري</option>
          <option VALUE="4"> عقارات دولة</option>
        </select>
      </div>
<!-- ####################  حالة الدوام   #################### -->
      <div class="col-md-4 col-sm-6">
        <label for="inputState" class="form-label">حالة الدوام</label>
        <select id="p1SchoolState" class="form-select status" onchange="SchoolState(this.value)">
          <option hidden></option>
          <option value="1">مستمرة </option>
          <option value="2">مغلقة </option>
        </select>
      </div>
<!-- #################### تاريخ الغلق   #################### -->
      <div class="col-md-4 col-sm-6" style="display:block">
        <label for="inputZip" class="form-label">تاريخ الغلق</label>
        <input type="date" class="form-control status" id="p1closing_date" disabled>
      </div>
<!-- ####################  رقم  الاجازة اختياري  #################### -->
      <div class="col-md-6 col-sm-6">
        <label for="inputZip" class="form-label">رقم اجازة المؤسسة</label>
        <input type="text" class="form-control" id="p1establishing_number" placeholder="(أختياري)">
      </div>
<!-- #################### نوع الغلق   #################### -->
<div class="col-md-6 col-sm-6">
        <label for="inputState" class="form-label">نوع الغلق </label>
        <select id="p1type_closure" class="form-select status" disabled>
          <option hidden></option>
          <option VALUE="1">لجنة تحقيقيه</option>
          <option VALUE="2">طلب من المؤسسين</option>
          <option VALUE="3" hidden>لا يوجد نوع الغلق</option>
        </select>
      </div>
     <!-- ####################  اسم المدير  ####################   -->
        <div class="col-md-4 col-sm-6">
            <label for="inputZip" class="form-label">اسم المدير </label>
            <input type="text" class="form-control" id="inputZipmang">
        </div>
<!-- ####################  التحصيل الدراسي للمدير #################### -->
<div class="col-md-4 col-sm-6">
    <label for="inputState" class="form-label">  التحصيل الدراسي للمدير</label>
    <select id="inputState" class="form-select">
        <option hidden="" selected="">اختر</option>
        <option>دبلوم</option>
        <option>بكلوريوس</option>
        <option>ماجستير</option>
        <option>دكتورا</option>
    </select>
</div>
<!-- ####################  رقم هاتف المؤسسة #################### -->
<div class="col-md-4 col-sm-12">
  <label for="inputPassword4" class="form-label">رقم هاتف المؤسسة</label>
  <input type="number" class="form-control" id="inputPassword4">
    </div>
<!-- #################### الملاحظات    #################### -->
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">الملاحظات</label>
        <textarea class="form-control" id="p1Notee" rows="3" placeholder="(أختياري)"></textarea>
      </div>
    </div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby=" ######" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">  
        <h1 class="modal-title fs-5" id="exampleModalLabel">حفظ</h1>
        <button type="button" class="btn-close" name="btnsave"  data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        هل انت متاكد من حفظ هذه الاستمارة ؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn btn-primary" onclick="insRequest()" data-bs-toggle="modal" data-bs-target="#exampleModal" id="liveAlertBtn" name="btnSave" >حفظ</button>
      </div>
    </div>
  </div>
</div>
<!-- box end -->
<!-- #################### page2 #################### -->
<div class="container-fluid text-white mt-5 create"  id="page2"  >
    <div id="box" class="row g-3 px-3 p-4" style="width: 90%">
<center>
<h4>معلومات المؤسسين </h4>
</center>
<!-- #################### اسماء المؤسسين#################### -->
<div class="col-md-12 col-sm-12">
<label for="inputEmail4" class="form-label ">اسماء المؤسسين</label>
<input type="text" class="form-control" id="inputEmail4">
</div>
<!-- #################### وضع المؤسس   #################### -->
<div class="col-md-12 col-sm-12">
<label for="inputState" class="form-label">وضع المؤسس</label>
<select id="inputState" class="form-select">
    <option hidden="" selected="">اختر</option>
    <option>سابق</option>
    <option>حالي</option>
</select>
</div>
<!-- #################### التحصيل الدراسي  #################### -->
<div class="col-md-12 col-sm-12">
<label for="inputState" class="form-label">  التحصيل الدراسي</label>
<select id="inputState" class="form-select">
    <option hidden="" selected="">اختر</option>
    <option>دبلوم</option>
    <option>بكلوريوس</option>
    <option>ماجستير</option>
    <option>دكتورا</option>
</select>
</div>
<!-- #################### رقم هاتف المؤسس #################### -->
<div class="col-md-12 col-sm-6">
<label for="inputEmail4" class="form-label ">رقم هاتف المؤسس</label>
<div class="shadow-lg ">
<input type="text" class="form-control" id="inputEmail4">
</div>
</div>
<div class="col-12 mb-3 icons">
<!-- <i class="fas fa-plus"></i> -->
      </div>
</div>
</div>
<!-- ####################  page3 #################### -->
<div class="container-fluid text-white mt-5  create "  id="page3">
    <div id="box" class="row g-3 px-3 p-4" style="width: 90%;">
<center>
<h4>معلومات الكادر التدريسي</h4>
</center>
<!-- ####################  اسماء الكادر التدريسي #################### -->
      <div class="col-md-6 col-sm-6">
        <label for="inputZip" class="form-label">اسماء الكادر التدريسي</label>
        <input type="text" class="form-control">
      </div>
<!-- ####################  التحصيل الدراسي للمدرس #################### -->
<div class="col-md-6 col-sm-6">
    <label for="inputState" class="form-label"> التحصيل الدراسي  </label>
    <select id="inputState" class="form-select">
        <option hidden="" selected="">اختر</option>
        <option>دبلوم</option>
        <option>بكلوريوس</option>
        <option>ماجستير</option>
        <option>دكتورا</option>
    </select>
</div>
<!-- #################### الاختصاص #################### -->
      <div class="col-md-6 col-sm-6">
        <label for="inputZip" class="form-label">الاختصاص </label>
        <input type="text" class="form-control" id="inputZip">
      </div>
<!-- ####################  فترة التعاقد#################### -->
      <div class="col-md-6 col-sm-6">
        <label for="inputZip" class="form-label">فترة التعاقد</label>
        <input type="text" class="form-control" id="inputZip">
      </div>
<!-- ####################  الراتب الشهري للمدرس#################### -->
      <div class="col-md-12 col-sm-12">
        <label for="inputZip" class="form-label">الراتب الشهري للمدرس</label>
        <input type="text" class="form-control" id="inputZip">
      </div>
  </div>
</div>
<!-- ####################  page4 #################### -->
<div class="container-fluid text-white mt-5 create"  id="page4"  >
    <div id="box" class="row g-3 px-3 p-4" style="width: 90%">
<center>
<h4>معلومات  إحصائية</h4>
</center>
<!-- ####################  اعداد الكادر التدريسي  #################### -->  
<div class="col-md-6 col-sm-6">
        <label for="inputZip" class="form-label">  اعداد الكادر التدريسي</label>
        <input type="text" class="form-control" id="inputZip">
      </div>
<!-- ####################  اعداد الطلاب   #################### -->
<div class="col-md-6 col-sm-6">
<label for="inputState" class="form-label">اعداد الطلاب</label>
<input type="text" class="form-control" id="inputEmail4">
</div>
<!-- ####################  نسب النجاح  #################### -->
<div class="col-md-6 col-sm-6">
<label for="inputState" class="form-label">نسب النجاح</label>
<input type="text" class="form-control" id="inputEmail4">
</div>
<!-- ####################  العام الدراسي#################### -->
<div class="col-md-6 col-sm-6">
<label for="inputState" class="form-label">العام الدراسي</label>
<input type="text" class="form-control" id="inputEmail4">
</div>
</div>
</div>
<!--####### ازرار التنقل ###### -->
<div class="container-fluid  text-white mt-5  create "  id="page3">
  <div id="butts" class="row g-3 px-3 p-4 " style="width: 90%;">
    <button type="re" class="btn btn-primary before w-100" tabindex="-1" role="button" aria-disabled="true" style="width: 70px;">السابق</button>
    <button type="re" class="btn btn-primary before w-100" tabindex="-1" role="button" aria-disabled="true" style="width: 70px;">افراغ الحقوق</button>
    <button class="btn btn-primary before w-100" tabindex="-1" role="button" aria-disabled="true" data-bs-toggle="modal" data-bs-target="#exampleModal">حفظ</button>
  </div>
</div>
<div class="col-12 col-md-6">
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" id="alrt" hidden>
        <strong>تم الحفظ</strong>
    </div>
</div>
<!-- #################### footer tags #################### -->
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3  mx-5 border-top">
    <div class="col-12 col-sm-4 text-center text-md-start text-white">
        <p style="font-size:18px;">&copy; 2023 جميع الحقوق محفوظة لدى مركز المعلومات والاتصالات</p>
    </div>
    <div class="col-12 col-sm-4 text-center mb-3 mb-md-0">
        <img src="../img/logo.png" class="img-fluid mx-auto" width="70" height="70" alt="Logo">
    </div>
    <div class="col-12 col-sm-4 text-center text-md-end text-white">
        <p style="font-size:20px;">مديرية التخطيط التربوي</p>
    </div>
</footer>
</div>
<!-- javascript link -->
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script>
    <?php include '../js/script.js'; ?>
  </script>
</body>
</html>