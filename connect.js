$(document).ready(function() {
    // Handle form submission using AJAX
    $("#submitBtn").click(function() {
        var formData = $("#bookForm").serialize();
        $.ajax({
            type: "POST",
            url: "admin_bookserver.php",
            data: formData + "&add_book=1",
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    // Book added successfully, display alert message
                    alert(response.message);
                    // You can update the table or take other actions as needed
                } else {
                    // Failed to add the book, display alert message
                    alert(response.message);
                }
            },
            error: function() {
                alert("An error occurred while processing the request.");
            }
        });
    });
});

