<div class="panel panel-default sidebar-menu"><!--  panel panel-default sidebar-menu Begin  -->
    
    <div class="panel-heading"><!--  panel-heading  Begin  -->
        
        <?php 
        
        $customer_session = $_SESSION['korisnik_email'];
        
        $get_customer = "select * from korisnici where korisnik_email='$customer_session'";
        
        $run_customer = mysqli_query($con,$get_customer);
        
        $row_customer = mysqli_fetch_array($run_customer);
        
        $customer_image = $row_customer['customer_image'];
        
        $customer_name = $row_customer['korisnik_ime'];
        
        if(!isset($_SESSION['korisnik_email'])){
            
        }else{
            
            echo "
            
                <center>
                
                    <img src='customer_images/$customer_image' class='img-responsive' >
                
                </center>
                
                <br/>
                
                <h3 class='panel-title' align='center'>
                
                    Ime: $customer_name
                
                </h3>
            
            ";
            
        }
        
        ?>
        
    </div><!--  panel-heading Finish  -->
    
    <div class="panel-body"><!--  panel-body Begin  -->
        
        <ul class="nav-pills nav-stacked nav"><!--  nav-pills nav-stacked nav Begin  -->
            
            
            
            <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">
                
                <a href="my_account.php?edit_account">
                    
                    <i class="fa fa-pencil"></i> Izmeni nalog
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">
                
                <a href="my_account.php?change_pass">
                    
                    <i class="fa fa-user"></i> Promeni lozinku
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">
                
                <a href="my_account.php?delete_account">
                    
                    <i class="fa fa-trash-o"></i> Izbriši nalog
                    
                </a>
                
            </li>
            
        </ul><!--  nav-pills nav-stacked nav Begin  -->
        
    </div><!--  panel-body Finish  -->
    
</div><!--  panel panel-default sidebar-menu Finish  -->