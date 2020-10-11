<div class="panel panel-default sidebar-menu"><!-- Deo za kategorije proizvoda -->
    <div class="panel-heading">
        <h3 class="panel-title">Naši proizvodi</h3>
    </div>
    
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">           
        
            <?php  getPCats();  ?> <!--Uzima iz baze kategorije proizvoda-->           
       
        </ul>
    </div>
    
</div>


<div class="panel panel-default sidebar-menu"><!-- Deo za kategorije -->
    <div class="panel-heading">
        <h3 class="panel-title">Kategorije</h3>
    </div>
    
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">      
      
        <?php getCats(); ?> <!--Uzima iz baze kategorije-->           
       
        </ul>
    </div>   

</div>