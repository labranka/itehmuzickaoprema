<?php 

    session_start();
    include("includes/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        
        $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admini where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($con,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_ime'];
        
        $admin_email = $row_admin['admin_email'];
        
        $admin_image = $row_admin['admin_image'];
        
        $get_products = "select * from proizvodi";
        
        $run_products = mysqli_query($con,$get_products);
        
        $count_products = mysqli_num_rows($run_products);
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Muzička oprema Admin</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="wrapper">
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper">
            <div class="container-fluid">
                
            <?php
                
                if(isset($_GET['dashboard'])){
                    
                    include("profil.php");
                    
            }   if(isset($_GET['insert_product'])){
                    
                    include("insert_product.php");
                    
            }   if(isset($_GET['view_products'])){
                    
                    include("view_products.php");
            }   if(isset($_GET['pretrazi'])){
                    
                        include("pretrazi.php");
                    
            }   if(isset($_GET['delete_product'])){
                    
                    include("delete_product.php");
                    
            }   if(isset($_GET['edit_product'])){
                    
                    include("edit_product.php");
                    
            }
    
            ?>
                
            </div>
        </div>
    </div>

<script src="js/jquery-331.min.js"></script>     
<script src="js/bootstrap-337.min.js"></script>           
</body>
</html>


<?php } ?>