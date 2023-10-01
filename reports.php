<!DOCTYPE html>
<html lang="ar" dir="rtl" >
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search and Display Data</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">
</head>
<body>

<div class="container">
    <h2>Data Search</h2>
    <form>
        <div class="form-group">
            <input type="text" id="searchInput" class="form-control" placeholder="Search...">
        </div>
        <button type="button" class="btn btn-primary" id="searchButton">Search</button>
        <button id="exportButton" class="btn btn-success" onclick="exportToExcel()">Export to Excel</button>
    </form>
    <table class="table table-striped" id="dataTable">
        <thead>
            <tr>
                <th>التسلسل</th>
                <th>اسم المؤسسة</th>
                <th>مكان المبنى</th>
                <th>الدولة</th>
                <th>المديرية</th>
                <!-- Add more table headers for each column -->
            </tr>
        </thead>
        <tbody>
            <!-- Data rows will be inserted here -->
        </tbody>
    </table>
</div>

<!-- Include Bootstrap and jQuery JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
   
  function exportToExcel() {
        const table = document.getElementById("dataTable");
        const wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
        XLSX.writeFile(wb, "exported_data.xlsx");
    }
//////////////////////////////////////////////////////////////////////

    // Function to filter and display data based on the search query
    let currentID = 1;
    function filterData(query) {
        currentID = 1;
                  
        const filteredData = data.filter((row) => {
            // Change 'Column 1' and 'Column 2' to the actual column names in your database
            return (
               
                row['Institute_FullName'].toLowerCase().includes(query.toLowerCase()) ||
                row['directorate_name'].toLowerCase().includes(query.toLowerCase()) ||
              row['Country_Name'].toLowerCase().includes(query.toLowerCase()) ||
              row['InOut_Name'].toLowerCase().includes(query.toLowerCase())
            
            );
        });

        // Clear the table body
        const dataTable = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
        dataTable.innerHTML = '';

        // Populate the table with filtered data
        filteredData.forEach((row) => {
            const newRow = dataTable.insertRow()
         
            // Add more cells for additional columns
            const cell1 = newRow.insertCell(0);
            const cell2 = newRow.insertCell(1);
            const cell3 = newRow.insertCell(2);
            const cell4 = newRow.insertCell(3);
            const cell5 = newRow.insertCell(4);
            cell1.textContent = currentID++;
            cell2.textContent = row['Institute_FullName'];
            cell3.textContent = row['InOut_Name'];
            cell4.textContent = row['Country_Name'];
            cell5.textContent = row['directorate_name'];
           
            // console.log(cell5)
            // Add more cells for additional columns
       
        });
    }

    // Event listener for the search input
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');

    searchButton.addEventListener('click', () => {
        filterData(searchInput.value);
        // currentID=" ";
        // currentID=currentID++;
    });
</script>

<?php
$conn = mysqli_connect("localhost","root","root","db_privateinstitutemanagment");

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$query ="SELECT tbl_main.Institute_FullName , tbl_directorate.directorate_name,tbl_country.Country_Name, tbl_inout.InOut_Name FROM tbl_main 
INNER JOIN tbl_country CROSS JOIN tbl_directorate CROSS JOIN tbl_inout WHERE 
tbl_main.Country_ID = tbl_country.Country_ID AND 
tbl_main.directorate_ID=tbl_directorate.directorate_ID AND 
tbl_main.InOut_ID=tbl_inout.InOut_ID 
ORDER BY tbl_main.main_ID ASC";
// $query = "SELECT `Institute_FullName`, `Country_ID`,`directorate_ID` FROM `tbl_main`"; // Replace 'example_table' with your table name
$result = $conn->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
        
    }
}
$conn->close();
?>

<script>
    // Store the data fetched from PHP in a JavaScript variable
    const data = <?php echo json_encode($data); ?>;

    console.log(data)
</script>

</body>
</html>
