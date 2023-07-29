 <!---*****************RETURN BOOKS**********************-->
    <div id="Return_Books" class="tabcontent">
        <fieldset style="width: 0px; height: 397px;">
            <legend>This Field is required:</legend>
<div class="container3">
            <form onsubmit="event.preventDefault();onReturnFormSubmit();" autocomplete="off" target="_self">
                <div class="form-row">
                    <label style="text-align: left;">Return ID</label>
                    <input type="text" name="Return_id" placeholder="Enter Return ID" style="padding: 5px;">
                </div>
                <div class="form-row">
                    <label style="text-align: left;">Book ID</label>
                    <input type="text" Name="bID" placeholder="Enter Book ID" style="padding: 5px;">
                </div>
                <div class="form-row">
                    <label style="text-align: left;">Book Name</label>
                    <input type="text" name="Bname" placeholder="Enter Book Name" style="padding: 5px;">
                </div>
                <div class="form-row">
                    <label style="text-align: left;">User ID</label>
                    <input type="text" name="u_id" placeholder="Enter User Name" style="padding: 5px;">
                </div>
                <div class="form-row">
                    <label style="text-align: left;">Issue Date</label>
                    <input type="text" name="iss_D" placeholder="Issue Date" style="padding: 5px;">
                </div>
                <div class="form-row">
                    <label style="text-align: left;">Due Date</label>
                    <input type="text" name="due_D" placeholder="Enter Due Date" style="padding: 5px;">
                </div>
                <div class="form-row">
                    <label style="text-align: left;">Return Date</label>
                    <input type="text" name="Return_D" placeholder="Enter Return Date" style="padding: 5px;">
                </div>
                <div class="form-row">
                    <div style="display: flex; justify-content: flex-end; gap: 15px;">
                        <input type="Button" name="submit" value="Return" style="padding: 10px 25px; font-weight:bold; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                        <input type="Button" name="submit" value="Clear" style="padding: 10px 20px; font-weight:bold; background-color: #337ab7; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
                    </div>
                </div>
            </form>
            </form>
        </fieldset>
        <fieldset style="width: 695px; height: 388px; margin-top: -408px; margin-left: 321px;">
            <legend></legend>
            <table id="returnBookList" style="border-collapse: collapse; width: 101%;">
                <tr style="background-color: #f2f2f2;">
                    <th style="padding: 5px; border: 2px solid black;">Return ID</th>
                    <th style="padding: 5px; border: 2px solid black;">Book ID</th>
                    <th style="padding: 5px; border: 2px solid black;">book Name</th>
                    <th style="padding: 5px; border: 2px solid black;">User ID</th>
                    <th style="padding: 5px; border: 2px solid black;">Issue Date</th>
                    <th style="padding: 5px; border: 2px solid black;">Due Date</th>
                    <th style="padding: 5px; border: 2px solid black;">Return Date</th>

                </tr>
            </table>
        </fieldset>
        <script src="connect.js"></script>
    </div>
