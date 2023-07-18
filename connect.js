  // Global variables
  let selectedRow = null;
  let data = [];

  // Event handler for the Save button
  const onFormSubmit = (event) => {
      event.preventDefault();
      if (validate()) {
          const formData = readFormData();
          if (selectedRow === null) {
              insertNewRecord(formData);
          } else {
              updateRecord(formData);
          }
          resetForm();
          displayData();
      }
  };

  // Read form data and return an object
  function readFormData() {
      const formData = {};
      formData["book_id"] = document.getElementById("book_id").value;
      formData["bname"] = document.getElementById("bname").value;
      formData["Aname"] = document.getElementById("Aname").value;
      formData["quantity"] = document.getElementById("quantity").value;
      return formData;
  }

  // Insert a new record to the table
  function insertNewRecord(formData) {
      const table = document.getElementById("booklist").getElementsByTagName("tbody")[0];
      const newRow = table.insertRow();
      const cell1 = newRow.insertCell();
      const cell2 = newRow.insertCell();
      const cell3 = newRow.insertCell();
      const cell4 = newRow.insertCell();
      cell1.innerHTML = formData.book_id;
      cell2.innerHTML = formData.bname;
      cell3.innerHTML = formData.Aname;
      cell4.innerHTML = formData.quantity;
      // Save the data in the array
      data.push(formData);
  }

  // Reset the form fields
  function resetForm() {
      document.getElementById("book_id").value = "";
      document.getElementById("bname").value = "";
      document.getElementById("Aname").value = "";
      document.getElementById("quantity").value = "";
      selectedRow = null;
  }

  // Update an existing record in the table
  function updateRecord(formData) {
      if (selectedRow !== null) {
          const table = document.getElementById("booklist").getElementsByTagName("tbody")[0];
          const cells = selectedRow.cells;
          cells[0].innerHTML = formData.book_id;
          cells[1].innerHTML = formData.bname;
          cells[2].innerHTML = formData.Aname;
          cells[3].innerHTML = formData.quantity;
          // Update the data in the array
          const index = selectedRow.rowIndex - 1;
          data[index] = formData;
      }
  }

  // Delete a record from the table
  function onDelete(event) {
      event.stopPropagation();
      if (selectedRow !== null) {
          const table = document.getElementById("booklist").getElementsByTagName("tbody")[0];
          table.deleteRow(selectedRow.rowIndex);
          resetForm();
          // Remove the data from the array
          const index = selectedRow.rowIndex - 1;
          data.splice(index, 1);
      }
  }

  // Validate the form fields
  function validate() {
      const bookId = document.getElementById("book_id").value;
      if (bookId === "") {
          alert("Book ID is required");
          return false;
      }
      return true;
  }

  // Event handler for clicking on a row
  function selectRow(event) {
      let target = event.target;
      while (target.nodeName !== "TR") {
          target = target.parentNode;
      }
      if (selectedRow !== null) {
          selectedRow.classList.remove("selected");
      }
      selectedRow = target;
      selectedRow.classList.add("selected");
      populateForm(selectedRow);
  }

  // Populate the form fields with data from a selected row
  function populateForm(row) {
      const cells = row.cells;
      document.getElementById("book_id").value = cells[0].innerHTML;
      document.getElementById("bname").value = cells[1].innerHTML;
      document.getElementById("Aname").value = cells[2].innerHTML;
      document.getElementById("quantity").value = cells[3].innerHTML;
  }

  // Display the data in the table
  function displayData() {
      const table = document.getElementById("booklist").getElementsByTagName("tbody")[0];
      table.innerHTML = "";

      data.forEach((record) => {
          const newRow = table.insertRow();
          const cell1 = newRow.insertCell();
          const cell2 = newRow.insertCell();
          const cell3 = newRow.insertCell();
          const cell4 = newRow.insertCell();
          cell1.innerHTML = record.book_id;
          cell2.innerHTML = record.bname;
          cell3.innerHTML = record.Aname;
          cell4.innerHTML = record.quantity;
      });
  }