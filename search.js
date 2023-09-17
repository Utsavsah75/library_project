const searchfun = () => {
  let filter = document.getElementById("input").value.toUpperCase();
  let table = document.getElementById("table");
  let tr = table.getElementsByTagName("tr");
  let notFoundMessage = document.getElementById("notFoundMessage"); // Get the 'notFoundMessage' element
  let found = false; // Initialize 'found' to false

  for (var i = 1; i < tr.length; i++) {
    let td = tr[i].getElementsByTagName("td")[1];

    if (td) {
      let textValue = td.textContent || td.innerText;

      if (textValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        found = true; // Set 'found' to true when data is found
      } else {
        tr[i].style.display = "none";
      }
    }
  }

  // Show/hide "Data not found" message based on the 'found' flag
  if (found) {
    notFoundMessage.style.display = "none"; // Hide the message if data is found
  } else {
    notFoundMessage.style.display = "block"; // Show the message if data is not found
  }
};
