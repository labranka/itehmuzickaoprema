<?php
    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once'../../models/proizvodi.php';

    //Instant DB && connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate blog proizvodi object
    $proizvodi = new Proizvodi($db);

    //Blog proizvodi query
    $result = $proizvodi->read();
    //Get now count
    $num = $result->rowCount();

    //Check if any proizvodi
    if($num > 0){
        // array
        $proizvodi_arr=array();
        $proizvodi_arr = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $proizvodi_item = array(
               'proizvod_id' => $proizvod_id,
                'proizvod_naziv' => $proizvod_naziv,
                'proizvod_opis' => html_entity_decode($proizvod_opis),
                'p_cat_id'=> $p_cat_id,
                'category_name'=> $category_name,
                'product_keywords' => $product_keywords,
                'proizvod_cena' => $proizvod_cena,
                'product_img1' => $product_img1,
                'product_img2' => $product_img2,
                'product_img3' => $product_img3,
            

            );

            //Push to "data"
            array_push($proizvodi_arr, $proizvodi_item);
        }

        //Turn to json and output
       echo json_encode($proizvodi_arr);

    }else{//Nema proizvoda
        echo json_encode(
            array('message'=> 'Nema proizvoda.')
        );

    }

