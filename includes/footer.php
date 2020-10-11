<div id="footer"><!-- #footer Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row"><!-- row Begin -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
               
               <h4>Stranice</h4>
                
                <ul><!-- ul Begin -->
                    <li><a href="cart.php">Šoping kartica</a></li>
                    <li><a href="proizvodi.php">Proizvodi</a></li>
                    <li><a href="customer/my_account.php">Moj nalog</a></li>
                </ul><!-- ul Finish -->
                
                <hr>
                
                <h4>Za korisnike</h4>
                
                <ul><!-- ul Begin -->
                    
                    <?php

                               if(!isset($_SESSION['korisnik_email'])){

                                   echo "<a href='checkout.php'>Login</a>";

                               }else{

                                   echo "<a href='customer/my_account.php?my_orders'>Moj nalog</a>";

                               }

                    ?>

                    <li><a href="korisnik_registracija.php">Registracija</a></li>
                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="com-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Naši proizvodi</h4>
                
                <ul><!-- ul Begin -->
                    
                    <?php
                        $get_p_cats = "select * from proizvod_kategorije";
                    
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            
                            echo "
                            
                                <li>
                                
                                    <a href='proizvodi.php?p_cat=$p_cat_id'>
                                    
                                        $p_cat_title
                                    
                                    </a>
                                
                                </li>
                            
                            ";
                            
                        }
                    ?>

                </ul><!-- ul Finish -->
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->
                
                <h4>Pronadji nas</h4>
                
                <p><!-- p Start -->
                    
                    <strong>Iteh Muzička oprema</strong>
                    <br/>Jove Ilića br.1
                    <br/>11000 Beograd
                    <br/>065-97-30-239
                    <br/>itehmuzickaoprema@gmail.com
                    <br/><strong>Tijana Vukomanović /2015</strong>
                    <br/><strong>Branka Lakićević 153/2015</strong>
                    
                </p><!-- p Finish -->
                
                
                
                <hr class="hidden-md hidden-lg">
                
            </div><!-- col-sm-6 col-md-3 Finish -->
            
            <div class="col-sm-6 col-md-3">
            
                <hr>
                
                <h4>Budi u toku</h4>
                
                <p class="social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>
                </p>
                
            </div>
        </div><!-- row Finish -->
    </div><!-- container Finish -->
</div><!-- #footer Finish -->
