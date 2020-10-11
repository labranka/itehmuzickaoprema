<?php 

$db = mysqli_connect("localhost","root","","muzickaoprema");

// begin getRealIpUser functions ///

function getRealIpUser(){
    
    switch(true){
            
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
    
}

/// Dodavanje u soping karticu ///

function add_cart(){
    
    global $db;
    
    if(isset($_GET['add_cart'])){
        
        $ip_add = getRealIpUser();      
        $p_id = $_GET['add_cart'];        
        $product_qty = $_POST['product_qty'];       
        $check_product = "select * from sopingkartica where ip_add='$ip_add' AND p_id='$p_id'";      
        $run_check = mysqli_query($db,$check_product);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('Vec ste dodali ovaj proizvod u korpu.')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "insert into sopingkartica (p_id,ip_add,kolicina) values ('$p_id','$ip_add','$product_qty')";
            
            $run_query = mysqli_query($db,$query);
            
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            
        }
        
    }
    
}

///kraj dodavanja u  korpu ///



//Funkcija 1 za proizvode
function getPro(){ 
    global $db;
    
    $get_products = "select * from proizvodi order by 1 DESC LIMIT 0,8";   
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){   
        $pro_id = $row_products['proizvod_id'];    
        $pro_title = $row_products['proizvod_naziv'];   
        $pro_price = $row_products['proizvod_cena'];   
        $pro_img1 = $row_products['product_img1'];
        
        echo "
        
        <div class='col-md-4 col-sm-6 single'>  
            <div class='product'>       
                <a href='details.php?pro_id=$pro_id'>           
                       <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                </a>
                
                <div class='text'>               
                    <h3>           
                        <a href='details.php?pro_id=$pro_id'>
                            $pro_title
                        </a>                   
                    </h3>
                    
                    <p class='price'>                   
                        $ $pro_price                   
                    </p>
                    
                    <p class='button'>                  
                          <a class='btn btn-default' href='details.php?pro_id=$pro_id'>
                            Vidi detalje
                        </a>
                    
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                            <i class='fa fa-shopping-cart'></i> Dodaj u korpu
                        </a>
                    
                    </p>               
                </div>           
            </div>       
        </div>       
        ";       
    }   
}
//Kraj funkcije 1


//Funkcija 2 za kategorije prizvoda
function getPCats(){

    global $db;
    
    $get_p_cats = "select * from proizvod_kategorije";   
    $run_p_cats = mysqli_query($db,$get_p_cats);

    while($row_p_cats = mysqli_fetch_array($run_p_cats)){
        $p_cat_id = $row_p_cats['p_cat_id'];
        $p_cat_title = $row_p_cats['p_cat_title'];

        echo "
            <li>

                <a href='proizvodi.php?p_cat=$p_cat_id'> $p_cat_title </a>
 
            </li>
        ";

    }

}
//Kraj funkcije 2

//Funkcija 3 za kategorije
function getCats(){

    global $db;
    
    $get_cats = "select * from kategorije";   
    $run_cats = mysqli_query($db,$get_cats);

    while($row_cats = mysqli_fetch_array($run_cats)){
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];

        echo "
            <li>

                <a href='proizvodi.php?cat=$cat_id'> $cat_title </a>
 
            </li>
        ";

    }

}
//Kraj funkcije 3

/// Funkcija za kategorije proizvoda ///

function getpcatpro(){
    
    global $db;
    
    if(isset($_GET['p_cat'])){
        
        $p_cat_id = $_GET['p_cat'];
        
        $get_p_cat ="select * from proizvod_kategorije where p_cat_id='$p_cat_id'";
        
        $run_p_cat = mysqli_query($db,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['p_cat_title'];
        
        $p_cat_desc = $row_p_cat['p_cat_desc'];
        
        $get_products ="select * from proizvodi where p_cat_id='$p_cat_id'";
        
        $run_products = mysqli_query($db,$get_products);
        
        $count = mysqli_num_rows($run_products);
        
        if($count==0){
            
            echo "
            
                <div class='box'>
                
                    <h1> Nema proizvoda za ovu kategoriju </h1>
                
                </div>
            
            ";
            
        }else{
            
            echo "
            
                <div class='box'>
                
                    <h1> $p_cat_title </h1>
                    
                    <p> $p_cat_desc </p>
                
                </div>
            
            ";
            
        }
        
        while($row_products=mysqli_fetch_array($run_products)){
            
            $pro_id = $row_products['proizvod_id'];
        
            $pro_title = $row_products['proizvod_naziv'];

            $pro_price = $row_products['proizvod_cena'];

            $pro_img1 = $row_products['product_img1'];
            
            echo "
            
                <div class='col-md-4 col-sm-6 center-responsive'>
        
            <div class='product'>
            
                <a href='details.php?pro_id=$pro_id'>
                
                    <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                
                </a>
                
                <div class='text'>
                
                    <h3>
            
                        <a href='details.php?pro_id=$pro_id'>

                            $pro_title

                        </a>
                    
                    </h3>
                    
                    <p class='price'>
                    
                        $ $pro_price
                    
                    </p>
                    
                    <p class='button'>
                    
                        <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                            Vidi detalje

                        </a>
                    
                        <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                            <i class='fa fa-shopping-cart'></i> Dodaj u korpu
                        </a>
                    
                    </p>
                
                </div>
            
            </div>
        
        </div>
            
            ";
            
        }
        
    }
    
}

/// Kraj za kategorije proizvoda///

/// Funkcija za kategorije ///

function getcatpro(){
    
    global $db;
    
    if(isset($_GET['cat'])){
        
        $cat_id = $_GET['cat'];
        
        $get_cat = "select * from kategorije where cat_id='$cat_id'";
        
        $run_cat = mysqli_query($db,$get_cat);
        
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_title = $row_cat['cat_title'];
        
        $cat_desc = $row_cat['cat_desc'];
        
        $get_cat = "select * from proizvodi where cat_id='$cat_id' LIMIT 0,6";
        
        $run_products = mysqli_query($db,$get_cat);
        
        $count = mysqli_num_rows($run_products);
        
        if($count==0){
            
            
            echo "
            
                <div class='box'>
                
                    <h1> Nema proizvoda za ovu kategoriju </h1>
                
                </div>
            
            ";
            
        }else{
            
            echo "
            
                <div class='box'>
                
                    <h1> $cat_title </h1>
                    
                    <p> $cat_desc </p>
                
                </div>
            
            ";
            
        }
        
        while($row_products=mysqli_fetch_array($run_products)){
            
            $pro_id = $row_products['proizvod_id'];
            
            $pro_title = $row_products['proizvod_naziv'];
            
            $pro_price = $row_products['proizvod_cena'];
            
            $pro_desc = $row_products['proizvod_opis'];
            
            $pro_img1 = $row_products['product_img1'];
            
            echo "
            
                <div class='col-md-4 col-sm-6 center-responsive'>
                                    
                    <div class='product'>
                                        
                        <a href='details.php?pro_id=$pro_id'>
                                            
                            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                            
                        </a>
                                            
                        <div class='text'>
                                            
                            <h3>
                                                
                                <a href='details.php?pro_id=$pro_id'> $pro_title </a>
                                                
                            </h3>
                                            
                        <p class='price'>

                            $$pro_price

                        </p>

                            <p class='buttons'>

                                <a class='btn btn-default' href='details.php?pro_id=$pro_id'>

                                Vidi detalje

                                </a>

                                <a class='btn btn-primary' href='details.php?pro_id=$pro_id'>

                                <i class='fa fa-shopping-cart'></i> Dodaj u korpu

                                </a>

                            </p>
                                            
                        </div>
                                        
                    </div>
                                    
                </div>
            
            ";
            
        }
        
    }
    
}

/// Kraj za kategorije ///

/// Brojac proizvoda ///

function items(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $get_items = "select * from sopingkartica where ip_add='$ip_add'";
    
    $run_items = mysqli_query($db,$get_items);
    
    $count_items = mysqli_num_rows($run_items);
    
    echo $count_items;
    
}

/// kraj brojaca proizvoda ///

/// Racunanje ukupne cene ///

function total_price(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $total = 0;
    
    $select_cart = "select * from sopingkartica where ip_add='$ip_add'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        
        $pro_id = $record['p_id'];
        
        $pro_qty = $record['kolicina'];
        
        $get_price = "select * from proizvodi where proizvod_id='$pro_id'";
        
        $run_price = mysqli_query($db,$get_price);
        
        while($row_price=mysqli_fetch_array($run_price)){
            
            $sub_total = $row_price['proizvod_cena']*$pro_qty;
            
            $total += $sub_total;
            
        }
        
    }
    
    echo  $total." din.";
    
}

/// finish total_price functions ///


?>