<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>


<div class="row"><!-- Pregled proizvoda -->
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                
                <i class="fa fa-dashboard"></i> Pregled proizvoda
                
            </li>
        </ol>
    </div>
</div><!-- Kraj Pregled proizvoda -->

<div class="row">
    <div class="col-lg-12">
    
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">

               
                   <i class="fa fa-tags"></i>  Pogledaj proizvode

                   

                   
                
               </h3>
            </div>

            
            
            <div class="panel-body">
                <div class="table-responsive">

                    <table class="table table-striped table-bordered table-hover">
                        
                        <thead>
                            <tr><!-- Kolone -->
                                <th> Proizvod id: </th>
                                <th> Naziv Proizvoda: </th>
                                <th> Fotografija: </th>
                                <th> Cena: </th>
                                <th> Kljucne reci: </th>
                                <th> Datum proizvoda: </th>
                                <th> Obrisi proizvod: </th>
                            </tr><!--kolone kraj-->
                        </thead>
                        
                        <tbody>
                            
                            <?php 
          
                                $i=0;
                            
                                $get_pro = "select * from proizvodi";
                                
                                $run_pro = mysqli_query($con,$get_pro);
          
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $pro_id = $row_pro['proizvod_id'];
                                    
                                    $pro_title = $row_pro['proizvod_naziv'];
                                    
                                    $pro_img1 = $row_pro['product_img1'];
                                    
                                    $pro_price = $row_pro['proizvod_cena'];
                                    
                                    $pro_keywords = $row_pro['product_keywords'];
                                    
                                    $pro_date = $row_pro['datum'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $pro_title; ?> </td>
                                <td> <img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60"></td>
                                <td>  <?php echo $pro_price; ?>din. </td>
                               
                                <td> <?php echo $pro_keywords; ?> </td>
                                <td> <?php echo $pro_date ?> </td>
                                <td> 
                                     
                                     <a href="index.php?delete_product=<?php echo $pro_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Obriši
                                    
                                     </a> 
                                     
                                </td>
                            </tr>
                            
                            <?php } ?>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php } ?>