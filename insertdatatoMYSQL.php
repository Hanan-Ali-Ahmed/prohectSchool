<!DOCTYPE html>
<html>
<head>
    <title>HTML Table to MySQL</title>
</head>
<body>
<input type="text" id="inputName">
<input type="text" id="inputName2">
    <button onclick="addName()">Add Name</button>
    <table id="data-table" border="1">
    
     <!-- Your HTML table here -->
    <tbody id="namesBody">
       
       
    </tbody>
    </table>
    <button id="insert-button">Insert Data</button>
    <div id="result"></div>

    <script>
var data = [];
function addName() {
  var inputName = document.getElementById("inputName").value,
      inputName2 = document.getElementById("inputName2").value ;
  
  if (data.includes(inputName)) {
    alert("هذا الاسم موجود بالفعل!");
  } else {
    data.push(inputName ,inputName2);
    updateTable();
    // alert("تمت إضافة الاسم بنجاح!");
  }
  
  // إعادة تعيين قيمة الحقل بعد إضافة الاسم
  document.getElementById("inputName").value = "";
  document.getElementById("inputName2").value = "";
}

// function addPlus() {
//   document.getElementById("inputName").value += "+";
// }

function updateTable() {
  var namesTable = document.getElementById("namesBody");
  namesTable.innerHTML = "";
  
//   for (var i = 0; i < data.length; i++) {
    var newRow = namesTable.insertRow();
    var nameCell = newRow.insertCell(0);
    nameCell.innerHTML =  document.getElementById("inputName").value
//   }

//   for (var i = 0; i < data.length; i++) {
        
    var nameCell2 = newRow.insertCell(1);
    nameCell2.innerHTML =  document.getElementById("inputName2").value
//   }/
}







//////////////////////////////////////////////////////////////////////
document.getElementById('insert-button').addEventListener('click', function () {
    var table = document.getElementById('data-table');
    var rows = table.getElementsByTagName('tr');
    

    // Loop through the table rows to collect data
    for (var i = 0; i < rows.length; i++) { // Start from 1 to skip header row
        var cells = rows[i].getElementsByTagName('td');
        var name = cells[0].innerHTML;
        var age = cells[1].innerHTML;
         console.log(name,age)

        data.push({ name: name, age: age });
    }

    // Send data to the server using XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'insert.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var resultDiv = document.getElementById('result');
            resultDiv.innerHTML = xhr.responseText;
        }
    };

    xhr.send(JSON.stringify(data));
});


    </script>
</body>
</html>
