let page1 = document.getElementById("page1"),
    page2 = document.getElementById("page2"),
    page3 = document.getElementById("page3"),
    title = document.getElementById("title"),
    stat = document.querySelectorAll('.status'),
    varAlrt = document.getElementById('alrt'),
   //تعريف واستدعاءاسماء الحقول لواجهة التأسيس
    p1InstituteType = document.getElementById("p1InstituteType"),                //حقل نوع المؤسسة
    p1InstituteNO = document.getElementById("p1InstituteNO"),                   // حقل ترميز المؤسسة   
    p1InstituteFullName = document.getElementById("p1InstituteFullName"),       //حقل اسم المؤسسة
    p1ikhtisas =  document.getElementById("p1ikhtisas"),                       //حقل اختصاص المعهد
    p1InstituteLevel = document.getElementById("p1InstituteLevel"),            //حقل مستوى التعليم
    p1gender = document.getElementById("p1gender"),                            //حقل جنس المؤسسة
    p1InOut_ID =  document.getElementById("p1InOut_ID"),                       //حقلم مكان المبنى
    p1country = document.getElementById("p1country"),                          //حقل الدولة
    p1directorate = document.getElementById("p1directorate"),                  //حقل المديريات
    p1establishing_date = document.getElementById("p1establishing_date"),      //حقل تاريخ التأسيس
   // P1next_renewal_date =  document.getElementById("P1next_renewal_date"),   //حقل تاريخ اخر تجديد
   p1type_duplication=  document.getElementById("p1type_duplication"),        //حقل نوع الازدواج
    P1type_property = document.getElementById("P1type_property"),                    //حقل نوع العقار
    P1maturity_period =  document.getElementById("P1maturity_period"),                       //حقل فترة الأستحقاق
    p1addres = document.getElementById("p1addres"),                            //حقل عنوان المؤسسة
    P1gender_property = document.getElementById("P1gender_property"),    //حقل جنس العقار
    p1SchoolState =  document.getElementById("p1SchoolState"),                 //حقل حالة الدوام
    p1closing_date =  document.getElementById("p1closing_date"),               //حقل تاريخ الغلق
    p1establishing_number =  document.getElementById("p1establishing_number"),  //حقل رقم اجازة المؤسسة
    p1type_closure =  document.getElementById("p1type_closure"),            //حقل نوع الغلق
    p1Notee =  document.getElementById("p1Notee"),                                //حقل الملاحظات

    arr = []; //تعرف المصفوفة(متغير)

    function insRequest() {

        for(var st of stat){
        if (st.value == "" ){
        arr.push(st.value); 
        }
        }
    
        if(arr.length == 0){
        console.log("مكتمل");
        // empty();
        alrt();
        }else{
        console.log("غير مكتمل");
    
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){  
            // document.getElementById('result').innerHTML = xhr.responseText;    
            console.log(xhr.responseText);
                
              }
              }
             
        xhr.open('post', '../functions.php',true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(
        'p1InstituteType=' + p1InstituteType.value +   //نوع المؤسسة
        '&p1InstituteNO=' + p1InstituteNO.value +      //ترميز المؤسسة
         '&FullName=' + p1InstituteFullName.value +    //اسم المؤسسة
         '&p1ikhtisas=' +  p1ikhtisas.value +        //اختصاص المعهد
         '&p1InstituteLevel=' + p1InstituteLevel.value +//مستوى التعليم
        '& p1gender=' +  p1gender.value +          //جنس المؤسسة
        '&p1InOut_ID=' + p1InOut_ID.value +     //مكان المبنى
        '&p1country=' + p1country.value +           //الدولة
        '&p1directorate=' + p1directorate.value +         //المديريات
        '&p1establishing_date=' + p1establishing_date.value +  //تاريخ التأسيس
        // // '&P1next_renewal_date=' + next_renewal_date.value +    //تاريخ اخر تجديد
        '&p1type_duplication=' + p1type_duplication.value + //نوع الازدواج
        '&P1type_property=' + P1type_property.value +   //نوع العقار
        '&P1maturity_period=' + P1maturity_period.value  +     //فترة الاستحقاق
        '&p1addres=' +  p1addres.value +         //عنوان المؤسسة
        '&P1gender_property=' +  P1gender_property.value + //جنس العقار
        '&p1SchoolState=' + p1SchoolState.value +    //حالة الدوام
        '&p1closing_date=' + p1closing_date.value +     //تاريخ الغلق
        '&p1establishing_number=' + p1establishing_number.value +  //اجازة المؤسسة
        '&p1type_closure=' + p1type_closure.value +   //نوع الغلق
         '&p1Notee=' + p1Notee.value   //الملاحظات
         

        );

        // empty();
        alrt();  
        }
    
        console.log(arr);
        arr = [];
    
        setTimeout(function() {
        varAlrt.hidden = true ;
        
        }, 4000);
    
    }

// function empty(){
//     var inputs = document.getElementsByClassName('status');
//     for (var i = 0; i < inputs.length; i++) {
//     inputs[i].value = '';
//     }

// }

function alrt(){
    varAlrt.hidden = false ;
}

// دالة فترة الاستحقاق
function updatematurity_period(input){
    var newDate = new Date(input.value);
    console.log(newDate);
    newDate.setFullYear(newDate.getFullYear() + 1);
    var day = ("0" + newDate.getDate()).slice(-2);
    var month = ("0" + (newDate.getMonth() + 1)).slice(-2);
    var nextYearDate =newDate.getFullYear()+ "-"+ (month)+ "-"+(day);
    console.log(nextYearDate);
    document.getElementById('P1maturity_period').value = nextYearDate;
//    var formattedDate = newDate.setFullYear(newDate.getFullYear()+1);    
}

function countryfilterIN_OUT(){   //دالة لعمل فلتر على دول داخل وخارج العراق
    if(p1InOut_ID.value == 1 ){ //  في حاله داخل العراق عرض العراق مع المديريات
        p1country.value = 1
        p1country.disabled = true
        p1directorate.disabled = false
       
        for (let i = 21; i <= 36; i++) {
            
                const optionValue = i.toString();
                for (let j = 0; j < p1directorate.options.length; j++) {
                    if (p1directorate.options[j].value === optionValue) { 
                        p1directorate.options[j].style.display = 'none'; // Hide the option directorate other country
                    }
                }
          
        }

        for (let i = 1; i <= 20; i++) {
            
            const optionValue = i.toString();
            for (let j = 0; j < p1directorate.options.length; j++) {
                if (p1directorate.options[j].value === optionValue) {
                    p1directorate.options[j].style.display = 'block'; // show the option directorate in iraq
                }
            }
      
    }
        p1directorate.value = "" // تفريغ حقل المديرية
    }

    if(p1InOut_ID.value == 2) // في حالة خارج العراق يتم اظهار باقي الدول مع مديرياتها
    {
        p1country.disabled = false
        p1directorate.disabled = false

        for (let i = 0; i < p1country.options.length; i++) {
            if (p1country.options[i].value === '1') {
                p1country.options[i].style.display = 'none'; // Hide the option of country
            }
        
        }

        for (let i = 21; i <= 36; i++) {
           
                const optionValue = i.toString();
                for (let j = 0; j < p1directorate.options.length; j++) {
                    if (p1directorate.options[j].value === optionValue) {
                        p1directorate.options[j].style.display = 'block'; // Show the option directorate in other country
                    }
                }  
        }
        for (let i = 1; i <= 20; i++) {
          
                const optionValue = i.toString();
                for (let j = 0; j < p1directorate.options.length; j++) {
                    if (p1directorate.options[j].value === optionValue) {
                        p1directorate.options[j].style.display = 'none'; // hide the option directorate in iraq
                    }
                }          
        }  
        p1country.value = ""
        p1directorate.value = ""
    }
  
}
// دالة لغلق حقل اختصاص المعهد في حالة كان نوع المؤوسسةغير المعهد
function InstituteType(instute){
// console.log (instute)
if(instute == 3){
    p1ikhtisas.disabled = false
    p1ikhtisas.value = ""
    p1ikhtisas.options[0].disabled = true
    p1InstituteLevel.disabled = true
    p1gender.disabled = false
    p1gender.value=""

    
    p1InstituteLevel.value = 1
    p1type_duplication.disabled=false
    p1type_duplication.value=""
   
}if(instute == 2){
    p1ikhtisas.disabled = true
    p1ikhtisas.value = 1

    p1InstituteLevel.disabled = false
    p1InstituteLevel.value = ""
    p1InstituteLevel.options[0].disabled = true
    p1gender.disabled = false
    p1gender.value=""
    p1type_duplication.disabled=false
    p1type_duplication.value=""

    
    
}
if(instute == 1){
    p1InstituteLevel.disabled = true
    p1InstituteLevel.value = 1

    p1ikhtisas.disabled = true
    p1ikhtisas.value = 1
    p1gender.disabled = true
    p1gender.value="4"
    p1type_duplication.disabled=true
    p1type_duplication.value="لايوجد"


    }
}


 //دالة لعمل تاريخ ونوع الغلق مفعل في حالة اختيار حالة الدوام مغلقة
function SchoolState(state){
// console.log (state)
if(state==2){
    p1closing_date.value = ""
    p1type_closure.value= ""
    p1closing_date.disabled=false
    p1type_closure.disabled=false  
    p1closing_date.setAttribute("type", "date");
}else{
    p1closing_date.disabled=true
    p1type_closure.disabled=true
    p1type_closure.value=3 
// Change the type to text
p1closing_date.setAttribute("type", "text");
p1closing_date.value = "لا يوجد تأريخ"
}
}
// function to generate the code p1InstituteNO(ترميز المؤسسه)
function updateRandomNumber() {
    var randomNumber = Math.floor(10000000 + Math.random() * 90000000);
    document.getElementById('p1InstituteNO').value = randomNumber;
    console.log(randomNumber);
  }
  window.onload = function(){
    updateRandomNumber();
}