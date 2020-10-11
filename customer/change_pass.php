<h1 align="center"> Promeni lozinku </h1>


<form action="" method="post"><!-- Forma za promenu loyinke -->
    
    <div class="form-group">
        
        <label> Stara lozinka: </label>
        
        <input type="text" name="old_pass" class="form-control" required>
        
    </div>
    
    <div class="form-group">
        
        <label> Nova lozinka: </label>
        
        <input type="password" name="new_pass" class="form-control" required>
        
    </div>
    
    <div class="form-group">
        
        <label> Potvrdi lozinku: </label>
        
        <input type="password" name="new_pass_again" class="form-control" required>
        
    </div>
    
    <div class="text-center">
        
        <button type="submit" name="submit" class="btn btn-primary">
            
            <i class="fa fa-user-md"></i> Izmeni
            
        </button>
        
    </div>
    
</form><!--Kraj Forma za promenu loyinke -->


<?php 

if(isset($_POST['submit'])){
    
    $c_email = $_SESSION['korisnik_email'];
    
    $c_old_pass = $_POST['old_pass'];
    
    $c_new_pass = $_POST['new_pass'];
    
    $c_new_pass_again = $_POST['new_pass_again'];
    
    $sel_c_old_pass = "select * from korisnici where korisnik_pass='$c_old_pass'";
    
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    
    if($check_c_old_pass==0){
        
        echo "<script>alert('Neispravna stara lozinka')</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('Ne poklapaju se lozinke')</script>";
        
        exit();
        
    }
    
    $update_c_pass = "update korisnici set korisnik_pass='$c_new_pass' where korisnik_email='$c_email'";
    
    $run_c_pass = mysqli_query($con,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('Promenili ste lozinku')</script>";
        
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    
}

?>