
<?php
include './conection/conn.php'; 
//دالة لأختيار المديريات من قاعدة البيانات لواجهة الدخول
function  selectDir(){
    include './conection/conn.php'; 
    $sql = "SELECT * FROM `tbl_users`";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->get_result();
    while($row=$result->fetch_assoc()){
        echo "<option>" . $row['Dir_name'] . "</option>";  
    }
}

//دالة جلب الدول من قاعدة البيانات
function  selectcountry(){
    include '../conection/conn.php'; 
    $sql = "SELECT * FROM `tbl_country`";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->get_result();
   
    while($row=$result->fetch_assoc()){
         echo "<option value='{$row['Country_ID']}'>" . $row['Country_Name'] . "</option>";

    }
   
}
//دالة جلب المديريات من قاعدة البيانات
function  select_directorate_name(){
    include '../conection/conn.php'; 
    $sql = "SELECT * FROM `tbl_directorate`";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->get_result();
    while($row=$result->fetch_assoc()){
         echo "<option value='{$row['directorate_ID']}'>" . $row['directorate_name'] . "</option>";  
    }
   
}
//دالة جلب اختصاص المعهد من قاعدة البيانات
function  select_Ikhtisas_name(){
    include '../conection/conn.php'; 
    $sql = "SELECT * FROM `tbl_ikhtisas`";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->get_result();
   
    while($row=$result->fetch_assoc()){
         echo "<option value='{$row['Ikhtisas_ID']}'>" . $row['Ikhtisas_name'] . "</option>";  
    }
}

//دالة جلب مستوى التعليم من قاعدة البيانات
function  select_InstituteLevel(){
    include '../conection/conn.php'; 
    $sql = "SELECT * FROM `tbl_institutelevel`";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->get_result();
   
    while($row=$result->fetch_assoc()){
        echo "<option value='{$row['InstituteLevel_ID']}'>" . $row['InstituteLevel_name'] . "</option>";   
    }
    }

// دالة لأدخال البيانات في قاعدة البيانات لواجهة التأسيس في حالة الضغط على زر الحفظ
if(isset($_POST["FullName"])){
    include '../conection/conn.php';
    $p1InstituteType = $_POST["p1InstituteType"];  //نوع المؤسسة
    $p1InstituteNO = $_POST["p1InstituteNO"];   //ترميز المؤسسة
    $p1InstituteFullName = $_POST["FullName"];  //اسم المؤسسة
    $p1ikhtisas = $_POST["p1ikhtisas"];     //اختصاص المعهد
    $p1InstituteLevel = $_POST["p1InstituteLevel"]; //مستوى التعليم
    $p1gender = $_POST["p1gender"];                 //جنس المؤسسة
    $p1InOut_ID = $_POST["p1InOut_ID"];             //مكان المبنى
    $p1country = $_POST["p1country"];               //الدولة
     $p1directorate = $_POST["p1directorate"];       //المديريات
    $p1establishing_date = $_POST["p1establishing_date"]; //تاريخ التأسيس
    // $P1next_renewal_date = $_POST["P1next_renewal_date"];  //تاريخ اخر تجديد
   $p1type_duplication = $_POST["p1type_duplication"];         //نوع الازدواج 
    $P1type_property = $_POST["P1type_property"];         //نوع العقار
    $P1maturity_period = $_POST["P1maturity_period"];     //فترة الاستحقاق       
    $p1addres = $_POST["p1addres"];          //عنوان المؤسسة
    $P1gender_property = $_POST["P1gender_property"];  //جنس العقار
    $p1SchoolState= $_POST["p1SchoolState"];      //حالة الدوام
    $p1closing_date = $_POST["p1closing_date"];     //تاريخ الغلق
    $p1establishing_number = $_POST["p1establishing_number"]; //اجازة المؤسسة
    $p1type_closure = $_POST["p1type_closure"];  //نوع الغلق
    $p1Notee = $_POST["p1Notee"];                //الملاحظات
    // $newDate = date('m-d-y',strtotime(' + 1 year' , strtotime($p1establishing_date)));
   
    //كود لعملية ادخال البيانات في قاعدة البيانات
   
    $sql = "INSERT INTO `tbl_main`(`InstituteType_ID`, `Institute_NO`, `Institute_FullName`,`Ikhtisas_ID`,`InstituteLevel_ID`,`Gender_ID`,`InOut_ID`,`Country_ID`,`directorate_ID`,`establishing_date`,`type_duplication`,`type_property_ID`,`maturity_period`,`addrs`,`gender_property_ID`,`SchoolState_ID`,`closing_date`,`establishing_number`,`type_closure_ID`,`Notee`,`Doc_Type_ID`) VALUES 
                                 ('$p1InstituteType','$p1InstituteNO','$p1InstituteFullName','$p1ikhtisas','$p1InstituteLevel','$p1gender','$p1InOut_ID','$p1country','$p1directorate','$p1establishing_date','$p1type_duplication','$P1type_property',$P1maturity_period,'$p1addres' ,'$P1gender_property', '$p1SchoolState','$p1closing_date','$p1establishing_number','$p1type_closure','$p1Notee',1)";
   
//    $sql = "INSERT INTO `tbl_main`( `InstituteType_ID`, `Institute_NO`, `Institute_FullName`,`Ikhtisas_ID`,`InstituteLevel_ID`,`Gender_ID`,
//                                     `InOut_ID`,`Country_ID`,`directorate_ID`,`establishing_date`,`type_duplication`,`Doc_Type_ID`) VALUES

//                                    ('$p1InstituteType','$p1InstituteNO','$p1InstituteFullName','$p1ikhtisas','$p1InstituteLevel','$p1gender',
//                                    '$p1InOut_ID','$p1country','$p1directorate','$p1establishing_date','$p1type_duplication',1)";
    //كود لتنفيذ في قاعدة البيانات
    mysqli_query($conn,$sql);
    //للطباعة فقط ولمعرفة هل الحقل موجودة بياناته عند الادخال
    echo "done";
    // echo "p1establishing_date :" . $p1establishing_date;
    // echo "<script>document.getElementById('inputZipp').value =$newDate';</script>";
    echo  $_POST["p1InstituteType"], $_POST["p1InstituteNO"],$_POST["FullName"],
    $_POST["p1ikhtisas"],$_POST["p1InstituteLevel"];
    // $_POST["p1InstituteLevel"],$_POST["p1establishing_date"], $_POST["p1addres"],
    // $_POST["p1SchoolState"], $_POST["p1closing_date"],$_POST["p1Notee"];
    
     }