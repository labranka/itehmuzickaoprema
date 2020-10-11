<?php
    class Proizvodi{
        // DB stuff
        private $conn;
        private $table= 'proizvodi';

        //Proizvodi properties
        public $proizvod_id;
        public $p_cat_id;
        public $cat_id;
        public $datum;
        public $proizvod_naziv;
        public $product_img1;
        public $product_img2;
        public $product_img3;
        public $proizvod_cena;
        public $product_keywords;
        public $proizvod_opis;
        public $category_name;

        //Konstruktor with db
        public function __construct($db){
            $this->conn = $db;
        }

        //Get Proizvodi
        public function read(){
            //Create query
            $query = 'SELECT 
                c.p_cat_title as category_name,
                p.proizvod_id,
                p.p_cat_id,
                p.cat_id,
                p.datum,
                p.proizvod_naziv,
                p.product_img1,
                p.product_img2,
                p.product_img3,
                p.proizvod_cena,
                p.product_keywords,
                p.proizvod_opis
            FROM 
                ' . $this->table . ' p
                LEFT JOIN
                    proizvod_kategorije c ON p.p_cat_id = c.p_cat_id
                ORDER BY
                    p.proizvod_id DESC';
        
        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Excute query
        $stmt->execute();

        return $stmt;
        }
    }
    