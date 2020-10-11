<?php 

session_start();
include("includes/db.php");
include("functions/functions.php");

?>

<?php

    if(isset($_GET['pro_id'])){      
        $product_id = $_GET['pro_id'];
        $get_product = "select * from proizvodi where proizvod_id='$product_id'";
        
        $run_product = mysqli_query($con,$get_product);       
        $row_product = mysqli_fetch_array($run_product);

        $p_cat_id = $row_product['p_cat_id'];       
        $pro_title = $row_product['proizvod_naziv'];        
        $pro_price = $row_product['proizvod_cena'];       
        $pro_desc = $row_product['proizvod_opis'];       
        $pro_img1 = $row_product['product_img1'];       
        $pro_img2 = $row_product['product_img2'];       
        $pro_img3 = $row_product['product_img3'];       
        $get_p_cat = "select * from proizvod_kategorije where p_cat_id='$p_cat_id'";       
        $run_p_cat = mysqli_query($con,$get_p_cat);      
        $row_p_cat = mysqli_fetch_array($run_p_cat);     
        $p_cat_title = $row_p_cat['p_cat_title'];
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Muzička oprema</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   
   <div id="top">   
       <div class="container">     
           <div class="col-md-6 offer">
               
           <a href="#" class="btn btn-success btn-sm">             
                   <?php 
                   
                   if(!isset($_SESSION['korisnik_email'])){                
                       echo " ";                    
                   }else{           
                       echo " " . $_SESSION['korisnik_email'] . "";                      
                   }
                   
                   ?>
                   
             </a>
               <a href="checkout.php"><?php items(); ?> Proizvoda na kartici | Ukupno: <?php total_price(); ?></a>       
           </div>
           
           <div class="col-md-6">      
               <ul class="menu"><!-- navigacija -->
                   
                   <li>
                       <a href="korisnik_registracija.php">Registracija</a>
                   </li>
                   <li>
                       <a href="customer/my_account.php">Moj nalog</a>
                   </li>
                   <li>
                       <a href="cart.php">Šoping kartica</a>
                   </li>
                   <li>
                       <a href="checkout.php">
                           
                           <?php 
                           
                           if(!isset($_SESSION['korisnik_email'])){                      
                                echo "<a href='checkout.php'> Login </a>";
                               }else{
                                echo " <a href='logout.php'> Log Out </a> ";
                               }
                           
                           ?>
                        
                       </a>
                   </li>           
               </ul>          
           </div>        
       </div>    
   </div>
   
   <div id="navbar" class="navbar navbar-default">
       
       <div class="container">          
           <div class="navbar-header">              
               <a href="index.php" class="navbar-brand home">                  
                   <img src="images/ecom-store-logo.png" alt="Logo" class="hidden-xs">
                   <img src="images/ecom-store-logo-mobile.png" alt="Logo" class="visible-xs">
                   
               </a>
               
               
               
           </div>
           
           <div class="navbar-collapse collapse" id="navigation">             
               <div class="padding-nav">                 
                   <ul class="nav navbar-nav left">
                       
                       <li class="<?php if($active=='Home') echo "active";?>">
                           <a href="index.php">Home</a>
                       </li>
                       <li class="<?php if($active=='Proizvodi') echo "active";?>">
                           <a href="proizvodi.php">Proizvodi</a>
                       </li>
                       <li class="<?php if($active=='nalog') echo "active";?>">
                          
                           <?php

                               if(!isset($_SESSION['korisnik_email'])){
                                   echo "<a href='checkout.php'>Moj nalog</a>";
                               }else{

                                   echo "<a href='customer/my_account.php?my_orders'>Moj nalog</a>";

                               }

                           ?>

                       </li>
                       <li class="<?php if($active=='kartica')echo"active";?>">
                           <a href="cart.php">Šoping kartica</a>
                       </li>
                       
                   </ul>
                   
               </div>
               
               <a href="cart.php" class="btn navbar-btn btn-primary right">
                   
                   <i class="fa fa-shopping-cart"></i>                  
                   <span><?php items(); ?> Proizvoda na kartici</span>
                   
               </a>           
           </div>
           
       </div>
       
   </div><!-- Kraj navigacije-->


   

