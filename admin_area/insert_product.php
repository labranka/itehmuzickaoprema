<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Ubaci proizvode </title>
</head>
<body>


    
<div class="row">
    
    <div class="col-lg-12">
        
        <ol class="breadcrumb">
            
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Ubaci Proizvode
                
            </li>
            
        </ol>
        
    </div>
    
</div>
       
<div class="row">
    
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            
           <div class="panel-heading">
               
               <h3 class="panel-title">
                   
                   <i class="fa fa-money fa-fw"></i> Ubaci Proizvod 
                   
               </h3>
               
           </div> 
           
           <div class="panel-body">
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Ime proizvoda </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="proizvod_naziv" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Kategorija proizvoda </label> 
                      
                      <div class="col-md-6">
                          
                          <select name="product_cat" class="form-control">
                              
                              <option> Izaberi kategoriju proizvoda </option>
                              
                              <?php 
                              
                              $get_p_cats = "select * from proizvod_kategorije";
                              $run_p_cats = mysqli_query($con,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['p_cat_id'];
                                  $p_cat_title = $row_p_cats['p_cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Kategorija </label> 
                      
                      <div class="col-md-6">
                          
                          <select name="cat" class="form-control">
                              
                              <option> Izaberi kategoriju </option>
                              
                              <?php 
                              
                              $get_cat = "select * from kategorije";
                              $run_cat = mysqli_query($con,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Fotografija proizvoda 1 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_img1" type="file" class="form-control">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Fotografija proizvoda 2 </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_img2" type="file" class="form-control">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Fotografija proizvoda 3</label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Cena proizvoda </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="proizvod_cena" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Kljucne reci proizvoda </label> 
                      
                      <div class="col-md-6">
                          
                          <input name="product_keywords" type="text" class="form-control" required>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"> Opis proizvoda </label> 
                      
                      <div class="col-md-6">
                          
                          <textarea name="proizvod_opis" cols="19" rows="6" class="form-control"></textarea>
                          
                      </div>
                       
                   </div>
                   
                   <div class="form-group">
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6">
                          
                          <input name="submit" value="Ubaci proizvod" type="submit" class="btn btn-primary form-control">
                          
                      </div>+
                       
                   </div>
                   
               </form>
               
           </div>
            
        </div>
        
    </div>
    
</div>
        
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script> 
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['submit'])){
    
    $proizvod_naziv = $_POST['proizvod_naziv'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $proizvod_cena = $_POST['proizvod_cena'];
    $product_keywords = $_POST['product_keywords'];
    $proizvod_opis = $_POST['proizvod_opis'];
    
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$product_img1");
    move_uploaded_file($temp_name2,"product_images/$product_img2");
    move_uploaded_file($temp_name3,"product_images/$product_img3");
    
    $insert_product = "insert into proizvodi (p_cat_id,cat_id,datum,proizvod_naziv,product_img1,product_img2,product_img3,proizvod_cena,product_keywords,proizvod_opis) values ('$product_cat','$cat',NOW(),'$proizvod_naziv','$product_img1','$product_img2','$product_img3','$proizvod_cena','$product_keywords','$proizvod_opis')";
    
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        
        echo "<script>alert('Proizvod je uspesno dodat')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
        
    }
    
}

?>


<?php } ?>