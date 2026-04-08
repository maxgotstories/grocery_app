<?php
//DISPLAY GROCERY LIST WITH FILTER

    //Include database connection
    include("connect.php");

    //Filter condition for date filtering
    if (isset($_POST['btn']))
    {
      $date=$_POST['idate']; //Get selected date from form
      
      //Query: Get all items for specific date
      $q="select * from grocerytb where Date='$date'";
      $query=mysqli_query($con,$q);
    } 
	else 
	{
      //(Default) Show all grocery items 
      $q= "select * from grocerytb";
      $query=mysqli_query($con,$q);
    }
?>

<html>
    <head>
        <!-- 
            META TAG & STYLESHEETS SECTION (Bootstrap for responsive cards and layout)
        -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container mt-5">
            <!-- top (header row with title | filter form) -->
            <div class="row">
            <!-- LEFT COLUMN: Title and Add Item Link -->
                <div class="col-lg-8">
                    <h1>View Grocery List</h1>
                    <a href="add.php">Add Item</a>
                </div>

                <!-- RIGHT COLUMN: Date Filter Form -->
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Date Filtering Form-->
                            <form method="post" action="">
                              <input type="date" class="form-control" name="idate">
                        </div>
                          <div class="col-lg-4" method="post">
                            <input type="submit" class="btn btn-danger float-right" name="btn" value="filter">
                        </div>
                            </form>
                    </div>
                </div>
            </div>
           
            <!-- Grocery Cards/Item display section (w.t.h of Bootstrap) -->
            <div class="row mt-4">
                
             <?php
                  //Loop through queery results (to display grocery items)
                  while ($qq=mysqli_fetch_array($query)) 
                  {
             ?>

                <!-- Individual grocery item card -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                          <!-- Item Name (Card Title) -->
                          <h5 class="card-title"><?php echo $qq['Item_name']; ?></h5>
                          
                          <!-- Item Quantity (Card Subtitle) -->
                          <h6 class="card-subtitle mb-2 text-muted"><?php echo $qq['Item_Quantity']; ?></h6>
                          
                          <!-- Color-coded dynamic status display
                                0 = PENDING (blue), 1 = BOUGHT (green), 2 = NOT AVAILABLE (red)
                          -->
                          <?php
                          if($qq['Item_status'] == 0) {
                          ?>
                            <p class="text-info">PENDING</p>
                          <?php
                          } else if($qq['Item_status'] == 1) {
                          ?>
                            <p class="text-success">BOUGHT</p>
                          <?php } else { ?> 
                            <p class="text-danger">NOT AVAILABLE</p>
                          <?php } ?>

                          <!-- Action Links -->
                          <!-- Delete link passes item ID to delete.php -->
                          <a href="delete.php?id=<?php echo $qq['Id']; ?>" class="card-link">Delete</a>
    					            
                          <!-- Update link passes item ID to update.php -->
                          <a href="update.php?id=<?php echo $qq['Id']; ?>" class="card-link">Update</a>
                        </div>

                      </div><br>
                </div>
                <?php
                  

                  } //End of while loop
                ?>
                
            </div>
        </div>
    </body>
</html>
