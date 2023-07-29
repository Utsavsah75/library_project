<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f2f2f2; */
            margin: 0;
            padding: 0;
            background: linear-gradient(270deg, rgba(255, 255, 255, 0.799), rgba(96, 100, 96, 0.6));


        }

        form {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            filter: drop-shadow(0 10px 20px black);
            /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); */
        }

        .form-row {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],
        input[type="button"] {
            padding: 10px 25px;
            font-weight: bold;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #4CAF50;
        }

        input[type="button"] {
            background-color: #337ab7;
        }
    </style>
</head>
<body>    <div id="message" style="display: none; color: green; font-weight: bold; text-align: center; margin-top:50px ;">
                 Update Book Successfully!
    </div>
    <form id="bookForm" method="POST" action="add_book_data.php" autocomplete="off">
        <div class="form-row">
            <label>Book ID*</label>
            <input type="text" id="book_id" placeholder="Enter Book ID" name="book_id" required>
        </div>
        <div class="form-row">
            <label>Book Name</label>
            <input type="text" id="bname" placeholder="Enter Book Name" name="book_name" required>
        </div>
        <div class="form-row">
            <label>Author Name</label>
            <input type="text" id="Aname" placeholder="Enter Author Name" name="book_author" required>
        </div>
        <div class="form-row">
            <label>Quantity</label>
            <input type="text" id="quantity" placeholder="Enter Quantity" name="book_quantity" required>
        </div>

        <div style="display: flex; justify-content:center;">
            <input type="submit" name="submit" value="Update">
          
        </div>
    </form>

    <a href="book_page.php" style=" color: green; font-weight: bold; margin-left: 50%; margin-bottom:400px ;"> 
    <input type="submit" name="submit" value="Back"></a>

    <script>
        // Get the form element
        const bookForm = document.getElementById('bookForm');

        // Add an event listener to the form submission
        bookForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission
            // Your code to handle form submission to the server
            // For this example, we'll just show the success message
            // Show the success message
            const message = document.getElementById('message');
            message.style.display = 'block';

            // Hide the message after a few seconds (optional)
            setTimeout(function () {
                message.style.display = 'none';
            }, 3000); // 3 seconds (adjust this as needed)
        });
    </script>
</body>
</html>
