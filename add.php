<!-- standard HTML file-->
<html>
    <head>
        <!-- 
            META TAGS & TITLE SECTION
            Sets character encoding and page title
        -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Add List</title>
        <!-- 
            EXTERNAL STYLESHEETS
            Bootstrap CSS for responsive design and styling
            Custom CSS file for additional styling
        -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!-- 
            MAIN CONTAINER
            Bootstrap container with top margin for spacing
        -->
        <div class="container mt-5">
            <h1>Add Grocery List</h1>
            <!-- 
                GROCERY ITEM FORM
                Form submits to add.php via POST method (sends data to a server to create or update resources)
            -->
            <form action="add.php" method="POST">
                <!-- ITEM NAME INPUT -->
                <div class="form-group">
                    <label>Item name</label>
                    <input type="text" class="form-control" placeholder="Item name" name="iname"/>
                </div>
                
                <!-- ITEM QUANTITY INPUT -->
                <div class="form-group">
                    <label>Item quantity</label>
                    <input type="text" class="form-control" placeholder="Item quantity"  name="iqty"/>
                </div>
                
                <!-- ITEM STATUS DROPDOWN -->
                <div class="form-group">
                    <label>Item status</label>
                    <select class="form-control" name="istatus">
                        <option value="0" >PENDING</option>
                        <option value="1">BOUGHT</option>
                        <option value="2">NOT AVAILABLE</option>
                    </select>
                </div>
                
                <!-- DATE INPUT -->
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" placeholder="Date" name="idate">
                </div>

                <!-- SUBMIT BUTTON -->
                <div class="form-group">
                    <input type="submit" value="Add" class="btn btn-danger" name="btn">
                </div>
            </form>
        </div>
		
        <?php
        // Check if form submit button was clicked
           if(isset($_POST["btn"]))
           {
            // Include database connection file
	           include("connect.php");
            // Retrieve form data
               $item_name=$_POST['iname'];
               $item_qty=$_POST['iqty'];
               $item_status=$_POST['istatus'];
               $date=$_POST['idate'];
    
            // SQL INSERT QUERY
               $q="insert into grocerytb(Item_name,Item_Quantity,Item_status,Date)values('$item_name',$item_qty,'$item_status','$date')";

            // Execute query and redirect to index.php on success
               mysqli_query($con,$q);
               header("location:index.php");

	 
            }
			// if(!mysqli_query($con,$q))
            // {
	             // echo "Value Not Inserted";
             // }
             // else
             // {
               	// echo "Value Inserted";
             // }
         ?>
		
    </body> 
</html>
