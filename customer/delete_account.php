<center><!-- center Begin -->
    
    <h1> Da li zaista želite da obrišete nalog? </h1>
    
    <form action="" method="post"><!-- form Begin -->
        
       <input type="submit" name="Da" value="Da" class="btn btn-danger"> 
        
       <input type="submit" name="Ne" value="Ne" class="btn btn-primary"> 
        
    </form><!-- form Finish -->
    
</center><!-- center Finish -->


<?php 

$c_email = $_SESSION['korisnik_email'];

if(isset($_POST['Da'])){
    
    $delete_customer = "delete from korisnici where korisnik_email='$c_email'";
    
    $run_delete_customer = mysqli_query($con,$delete_customer);
    
    if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('Uspešno ste obrisali nalog. Dovidjenja!')</script>";
        
        echo "<script>window.open('../index.php','_self')</script>";
        
    }
    
}

if(isset($_POST['Ne'])){
    
    echo "<script>window.open('my_account.php','_self')</script>";
    
}

?>