<!DOCTYPE html>
<html lang="en">
    <head>
          <?php include '../view/header.php' ; ?>
    </head>
 
    <header>
          <?php include '../view/navigation.php' ; ?>
    </header>

<style>


.button {
    background-color: transparent; /* Green */
    border: none;
    color: white;
    padding: 8px 1px;
    
    align-content: center; 
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;

}
.button5:hover {
    background-color: #DAA520;
    color: white;
}
table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}
.container {
    padding: 80px;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
}
tr:hover {background-color:#DAA520;}


p {
 text-align: center;
line-height: 100px;

}


</style>

<body>
<main>
<section class="features-main container-fluid section-bordered">

<aside>
        <!-- Complete or Uncomplete Task List-->
        <h2>Alim Din</h2>
        
        
        <?php foreach ($categories as $category) : ?>
            <tr>
            <a href="?category_id=<?php echo $category['categoryID']; ?>">
                <td><?php echo $category['categoryName']; ?></td>
            </a>
            </tr>
        <?php endforeach; ?>
        
       
    </aside>

    <section>
          
        <h2><?php echo $category_name; ?><button class="button button5"><a href="?action=show_add_form">(+)Add A New Task</a></button></h2>
        <table>
            <tr>
                <th>Due Date</th>
                <th>Due Time</th>
                <th>Item</th>
                <th>Description</th>
                <th>Actions</th>
                
            </tr>
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['dateID']; ?></td>
                <td><?php echo $product['timeID']; ?></td>
                <td><?php echo $product['productName']; ?></td>
                <td><?php echo $product['message']; ?> </td>

                    <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_product">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['productID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['categoryID']; ?>">
                    <input type="submit" value="UPDATE">
                    

                    <form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_product">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['productID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['categoryID']; ?>">
                    <input type="submit" value="Delete">
                      

                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <br>
        <br>
        
      

        
      <!-- <p class="last_paragraph"><a href="?action=list_categories">List Categories</a></p>     
    </section> -->


 

    
</main>
</body>

<?php include '../view/footer.php'; ?>


</html>