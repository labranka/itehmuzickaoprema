<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
   
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle begin -->
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button>
        
        <a href="index.php?dashboard" class="navbar-brand">Admin</a>
        
    </div>
    
    <ul class="nav navbar-right top-nav">
        
        <li class="dropdown">
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                
                <i class="fa fa-user"></i> <?php echo $admin_name;  ?> <b class="caret"></b>
                
            </a>
            
            <ul class="dropdown-menu">
                <li>
                    
                </li>
                
                <li>
                    <a href="index.php?view_products">
                        
                        <i class="fa fa-fw fa-envelope"></i> Proizvodi
                        
                        <span class="badge"><?php echo $count_products; ?></span>
                        
                    </a>
                </li>
                
                <li class="divider"></li>
                
                <li>
                    <a href="logout.php">
                        
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                        
                    </a>
                </li>
                
            </ul>
            
        </li>
        
    </ul>
    
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                        
                        <i class="fa fa-fw fa-dashboard"></i> Profil
                        
                </a>
                
            </li>
            
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                        
                        <i class="fa fa-fw fa-tag"></i> Proizvodi
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a>
                
                <ul id="products" class="collapse"><!-- Padajuci meni za Proizvodi-->
                    <li>
                        <a href="index.php?insert_product"> Ubaci proizvod</a>
                    </li>
                    <li>
                        <a href="index.php?view_products"> Pregledaj proizvode </a>
                    </li>
                    <li>
                        <a href="index.php?pretrazi"> Pretraži proizvode </a>
                    </li>
                </ul><!-- Kraj Padajuci meni za Proizvodi -->
                
            </li>
            
            
            
        </ul>
    </div>
    
</nav>


<?php } ?>