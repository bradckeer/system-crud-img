<?php

use PhpMyAdmin\SqlParser\Components\Limit;
use const ParagonIE\ConstantTime\false;


class ConexionDB extends mysqli
{
    public function __construct()
    {
        parent::__construct(
            DB_HOST, 
            DB_USER, 
            DB_PASS, 
            DB_NAME, 
            DB_PORT, 
            DB_SOCKET
        );
        $this->connect_errno ? die('Error: '.$this->connect_errno.' en la conexión a la base de datos '.$this->connect_errno) : null;
        $this->set_charset('utf8');
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    }
   
}
/*
$db = new ConexionDB();
$sql = $db->query('SELECT * FROM conexiondb WHERE id = 1 LIMIT 1');

if ($sql->num_rows > 0) {

    while ($res = $sql->fetch_assoc()){
        
        print_r($res);

    }  
    
}
//cerrar sentencia
$sql->close();
/* cerrar conexión
$db->close();
*/
