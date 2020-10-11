<?php 

$customer_session = $_SESSION['korisnik_email'];

$get_customer = "select * from korisnici where korisnik_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['korisnik_id'];

$customer_name = $row_customer['korisnik_ime'];

$customer_email = $row_customer['korisnik_email'];

$customer_country = $row_customer['korisnik_drzava'];

$customer_city = $row_customer['korisnik_grad'];

$customer_contact = $row_customer['korisnik_kontakt'];

$customer_address = $row_customer['korisnik_adresa'];

$customer_image = $row_customer['customer_image'];

?>

<h1 align="center"> Izmeni nalog </h1>

<form action="" method="post" enctype="multipart/form-data"><!-- form Begin -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Ime: </label>
        
        <input type="text" name="c_name" class="form-control" value="<?php echo $customer_name; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Email: </label>
        
        <input type="text" name="c_email" class="form-control" value="<?php echo $customer_email; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Država: </label>
        
        <input type="text" name="c_country" class="form-control" value="<?php echo $customer_country; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Grad: </label>
        
        <input type="text" name="c_city" class="form-control" value="<?php echo $customer_city; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Kontakt: </label>
        
        <input type="text" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Adresa: </label>
        
        <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Profilna fotografija: </label>
        
        <input type="file" name="c_image" class="form-control form-height-custom">
        
        <img class="img-responsive" src="customer_images/<?php echo $customer_image; ?>" alt="Costumer Image">
        
    </div><!-- form-group Finish -->
    
    <div class="text-center"><!-- text-center Begin -->
        
        <button name="update" class="btn btn-primary"><!-- btn btn-primary Begin -->
            
            <i class="fa fa-user-md"></i> Izmeni
            
        </button><!-- btn btn-primary inish -->
        
    </div><!-- text-center Finish -->
    
</form><!-- form Finish -->

<?php 

if(isset($_POST['update'])){
    
    $update_id = $customer_id;
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_country = $_POST['c_country'];
    
    $c_city = $_POST['c_city'];
    
    $c_address = $_POST['c_address'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    move_uploaded_file ($c_image_tmp,"customer_images/$c_image");
    
    $update_customer = "update korisnici set korisnik_ime='$c_name',korisnik_email='$c_email',korisnik_drzava='$c_country',korisnik_grad='$c_city',korisnik_adresa='$c_address',korisnik_kontakt='$c_contact',customer_image='$c_image' where korisnik_id='$update_id' ";
    
    $run_customer = mysqli_query($con,$update_customer);
    
    if($run_customer){
        
        echo "<script>alert('Izmenili ste vaš nalog, ulogujte se ponovo.')</script>";
        
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    
}

?>