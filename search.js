function searchfun() {
    var filter, myTable, tr, td, i, txtValue;
    filter = document.getElementById("input").value.toUpperCase();
    myTable = document.getElementById("dataTables-example");
    tr = myTable.getElementsByTagName("tr");

    var noDataFound = true; // Flag to check if any data is found

    // Start from the second row (index 1) and iterate until the second last row
    for (i = 1; i < tr.length - 0; i++) {
        var found = false; // Flag to check if the filter is found in any of the columns
        // Columns to search: 1 (Student Name), 2 (Book Name), 3 (ISBN), 4 (Issue Date), 5 (Due Date)
        for (var j = 1; j <= 5; j++) {
            td = tr[i].getElementsByTagName("td")[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    noDataFound = false;
                    break; // Break if found in any column
                }
            }
        }

        if (found) {
            tr[i].style.display = ""; // Show the row if found
        } else {
            tr[i].style.display = "none"; // Hide the row if not found
        }
    }

    // Display "No data found" message if no matching records are found
    var noDataMessage = document.getElementById("noDataMessage");
    if (noDataMessage) {
        noDataMessage.style.display = noDataFound ? "block" : "none";
    }
}

// -----------------------------------------------

       // Record per page
       let total_record_tr = document.querySelectorAll('#dataTables-example tr');
       let total_record_per_page = 10;
       let current_page = 1;
       let total_record = total_record_tr.length;
       let total_page = Math.ceil(total_record / total_record_per_page);
       
       DisplayRecord(current_page);
       
       function DisplayRecord(page_number) {
           let start_index = (page_number - 1) * total_record_per_page;
           let end_index = start_index + (total_record_per_page - 0);
           let statement = '';
           for (let i = start_index; i <= end_index; i++) {
               if (i < total_record) {
                   statement += `<tr>${total_record_tr[i].innerHTML}</tr>`;
               }
           }
           document.getElementById('dataTables-example').innerHTML = statement;
       }
       
       function changeRecordPerPage() {
           let record_per_page = document.getElementById("recordPerPage").value;
           if (record_per_page === "All") {
               total_record_per_page = Number.MAX_SAFE_INTEGER; // Set to a very large number
           } else {
               total_record_per_page = parseInt(record_per_page);
           }
           total_page = Math.ceil(total_record / total_record_per_page);
           DisplayRecord(current_page);
       }

   
