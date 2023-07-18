
var selectedRow = null;

function onFormSubmit() {
    if (validate()) {
        var formData = readFormData();
        if (selectedRow == null)
            insertNewRecord(formData);
        else
            updateRecord(formData);
        resetForm();
    }
}

function readFormData() {
    var formData = {};
    formData["book_id"] = document.getElementById("book_id").value;
    formData["bname"] = document.getElementById("bname").value;
    formData["Aname"] = document.getElementById("Aname").value;
    formData["Quantity"] = document.getElementById("Quantity").value;
    return formData;
}

function insertNewRecord(data) {
    var table = document.getElementById("booklist").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.length);
    var cell1 = newRow.insertCell(0);
    cell1.innerHTML = data.book_id;
    var cell2 = newRow.insertCell(1);
    cell2.innerHTML = data.bname;
    var cell3 = newRow.insertCell(2);
    cell3.innerHTML = data.Aname;
    var cell4 = newRow.insertCell(3);
    cell4.innerHTML = data.Quantity;
}

function resetForm() {
    document.getElementById("bookForm").reset();
    selectedRow = null;
}

function updateRecord(formData) {
    selectedRow.cells[0].innerHTML = formData.book_id;
    selectedRow.cells[1].innerHTML = formData.bname;
    selectedRow.cells[2].innerHTML = formData.Aname;
    selectedRow.cells[3].innerHTML = formData.Quantity;
}

function onDelete() {
    if (confirm('Are you sure to delete this record?')) {
        var row = selectedRow;
        document.getElementById("booklist").deleteRow(row.rowIndex);
        resetForm();
    }
}

function validate() {
    var isValid = true;
    if (document.getElementById("book_id").value === "") {
        isValid = false;
        alert("Book ID is required");
    }
    return isValid;
}

function displayData(event) {
    var row = event.target.closest("tr");
    if (row) {
        selectedRow = row;
        document.getElementById("book_id").value = row.cells[0].innerHTML;
        document.getElementById("bname").value = row.cells[1].innerHTML;
        document.getElementById("Aname").value = row.cells[2].innerHTML;
        document.getElementById("Quantity").value = row.cells[3].innerHTML;
    }
}
