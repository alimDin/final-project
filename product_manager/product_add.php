
    <head>
            <?php include '../view/header.php'; ?>

  <link rel="stylesheet" href="/~ad432/week11/jquery/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
     <script>
    $( function() {
    $( "#datepicker" ).datepicker();
    } );
 

    </script>
    
    </head>
    
    <header>
          <?php include '../view/navigation.php' ; ?>
    </header>


    <style>


    .container {
    padding: 80px;
    align-content: center;
    }
    </style>

 
<main>

<section class="features-main container-fluid section-bordered">
  <div class="container">
    <h3>Add A Task</h3>

  


    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_product">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>
        
        <label>Date:</label>
        <input type="text" id="datepicker" name="dateID"/>
        <br>

        <label>Time:</label>
        <input type="text" value="8:00pm" name="timeID"/>
        <br>
      
        <label>Item:</label>
        <input type="text"  name="item" />
        <br>

        <label>Description:</label>
        <input type="text" name="message" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Task" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_products">View Product List</a>
    </p> 
    </div>
  </section>

</main>
<?php include '../view/footer.php'; ?>