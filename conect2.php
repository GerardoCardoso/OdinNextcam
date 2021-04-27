<?PHP
class Database extends PDO{
    public function __construct() {
        try{        //parent::__construct('mysql:host=localhost;dbname=dareyesm_db','dareyesm_root','root2015');
            parent::__construct('mysql:host=localhost;dbname=u762310939_nextcam','u762310939_gerardo','PaP3L1T05');
            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            echo $ex . '&lt;br>';
            die('Error al conectar a la base de datos.');
        }       
    }   
}

?>