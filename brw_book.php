
    <!---*****************BORROW BOOK**********************-->
    <div id="Borrow_Books" class="tabcontent">
        <fieldset style="width:0px; height: 397px;">
            <legend>This Field is required:</legend>
            <form onsubmit="event.preventDefault();onFormSubmit();" autocomplete="off">

                <div class="form-row">
                    <label>Borrow ID*</label>
                    <input type="text" name="Borrow_id" placeholder="Enter Borrow ID" style="padding: 5px;">
                </div>
                <div class="form-row">
                    <label>Book ID</label>
                    <input type="text" name="bID" placeholder="Enter Book ID" style="padding: 5px;">
                </div>
                <div class="form-row">
                    <label>Book Name</label>
                    <input type="text" name="Bname" placeholder="Enter Book Name" style="padding: 5px;">
                </div>
                <div class="form-row">
                    <label>User ID</label>
                    <input type="text" name="u_id" placeholder="Enter User ID" style="padding: 5px;">
                </div>
                <div class="form-row">
                    <label>Issue Date</label>
                    <input type="text" name="iss_D" placeholder="Enter Issue Date" style="padding: 5px;">
                </div>
                <div class="form-row">
                    <label>Due Date</label>
                    <input type="date" name="due_D" placeholder="Enter Due Date" style="padding: 5px;">
                </div>
                <div style="display: flex; justify-content: flex-end; gap: 15px;">
                    <input type="button" name="submit" value="Borrow" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                    <input type="button" name="clear" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                </div>
            </form>
        </fieldset>
        <fieldset style=" width:-395px; height: 388px;   margin-top:-408px;margin-left: 321px;">
            <legend></legend>
            <table id="booklist3" style="border-collapse: collapse; width:705px; height: 0px;   margin: top 0px; margin-left: -11px;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th style="padding: 5px; border: 2px solid black;">Borrow ID</th>
                        <th style="padding: 5px; border: 2px solid black;">Book ID</th>
                        <th style="padding: 5px; border: 2px solid black;">Book Name</th>
                        <th style="padding: 5px; border: 2px solid black;">User ID</th>
                        <th style="padding: 5px; border: 2px solid black;">Issue Date</th>
                        <th style="padding: 5px; border: 2px solid black;">Due Date</th>
                    </tr>
                </thead>
                <tbody id="ListBody" onclick="selectRow(event)" style="background-color: #4CAF50; color: #fff; padding: 5px; border: 1px solid black;">
                </tbody>
            </table>
        </fieldset>
        <script src="connect.js"></script>

    </div>
