<div class="box"><!-- box Begin -->
    
  <div class="box-header"><!-- box-header Begin -->
      
      <center><!-- center Begin -->
          
          <h1> Login </h1>
          
          <p class="lead"> Već imate nalog? </p>
          
          
      </center><!-- center Finish -->
      
  </div><!-- box-header Finish -->
   
  <form method="post" action="checkout.php"><!-- form Begin -->
      
      <div class="form-group"><!-- form-group Begin -->
          
          <label> Email </label>
          
          <input name="c_email" type="text" class="form-control" required>
          
      </div><!-- form-group Finish -->
      
       <div class="form-group"><!-- form-group Begin -->
          
          <label> Lozinka </label>
          
          <input name="c_pass" type="password" class="form-control" required>
          
      </div><!-- form-group Finish -->
      
      <div class="text-center"><!-- text-center Begin -->
          
          <button name="login" value="Login" class="btn btn-primary">
              
              <i class="fa fa-sign-in"></i> Login
              
          </button>
          
      </div><!-- text-center Finish -->     
      
  </form><!-- form Finish -->
   
  <center><!-- center Begin -->
      
     <a href="korisnik_registracija.php">
         
         <h3> Registruj se</h3>
         
     </a> 
      
  </center><!-- center Finish -->
    
</div><!-- box Finish -->


<?php 

if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    
    $customer_pass = $_POST['c_pass'];
    
    $select_customer = "select * from korisnici where korisnik_email='$customer_email' AND korisnik_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from sopingkartica where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_customer==0){
        
        echo "<script>alert('Pogresan mejl ili lozinka!')</script>";
        
        exit();
        
    }
    
    if($check_customer==1 AND $check_cart==0){
        
        $_SESSION['korisnik_email']=$customer_email;
        
       echo "<script>alert('Ulogovani ste!')</script>"; 
        
       echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        
    }else{
        
        $_SESSION['korisnik_email']=$customer_email;
        
       echo "<script>alert('Ulogovani ste!')</script>"; 
        
       echo "<script>window.open('checkout.php','_self')</script>";
        
    }
    
}

?>