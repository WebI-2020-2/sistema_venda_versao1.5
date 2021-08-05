<?php

    require_once 'Config_FormaPagamento.php';

 

 class DB_FormaPagamento {
    private static $instance;

    public static function getInstance() {
        if (!isset(self::$instance)) {
            try {
               self::$instance = new PDO('pgsql:host=' . HOST_FormaPagamento . ';dbname=' . BASE_FormaPagamento, USER_FormaPagamento, PASSWORD_FormaPagamento);
               self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
           
            
        } catch (PDFException $e) {
             echo "erro gerado" . $e->getMessage();
         }
     }
        return self::$instance;
    
    }
    public static function prepare($sql) {
        return self::getInstance()->prepare($sql);
    }

     public static function lastInsertId(){
        return self::getInstance()->lastInsertId();
    }
}






?>