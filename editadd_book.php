<div id="Add_Books" class="tabcontent">
            <fieldset style="width: 0px; height: 397px;">
                <legend>This Field is required:</legend>
                <form id="bookForm" method="POST" action="add_book_data.php" autocomplete="off">
                    <div class="form-row">
                        <label>Book ID*</label>
                        <input type="text" id="book_id" placeholder="Enter Book ID" style="padding: 5px;" name="book_id" required>
                    </div>
                    <div class="form-row">
                        <label>Book Name</label>
                        <input type="text" id="bname" placeholder="Enter Book Name" style="padding: 5px;" name="book_name" required>
                    </div>
                    <div class="form-row">
                        <label>Author Name</label>
                        <input type="text" id="Aname" placeholder="Enter Author Name" style="padding: 5px;" name="book_author" required>
                    </div>
                    <div class="form-row">
                        <label>Quantity</label>
                        <input type="text" id="quantity" placeholder="Enter Quantity" style="padding: 5px;" name="book_quantity" required>
                    </div>

                    <div style="display: flex; justify-content: flex-end; gap: 15px;">
                        <input type="submit" name="submit" value="Save" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        <input type="button" name="clear" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                    </div>
                </form>
            </fieldset>