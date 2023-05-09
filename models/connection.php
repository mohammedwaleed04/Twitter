<?php 

class DatabaseConnection {
    private static $instance = null;
    private $pdo;

    private function __construct($dsn, $user, $password) {
        $this->pdo = new PDO($dsn, $user, $password);
    }

    public static function getInstance($dsn, $user, $password) {
        if (self::$instance == null) {
            self::$instance = new self($dsn, $user, $password);
        }
        return self::$instance->pdo;
    }
}

// 	$dsn = 'mysql:host=localhost; dbname=tweety';
// 	$user = 'root';
// 	$password = '';
// 	// $dsn = "postgresql://yqraxzhn:cbupy2tJvPMaHFxatGHTH5hc5gNhDIO8@rogue.db.elephantsql.com/yqraxzhn";
// 	// $user = "external_database_yqraxzhn";
// 	// $password = "external_database_cbupy2tJvPMaHFxatGHTH5hc5gNhDIO8";
// 	// $dbname = "external_database_yqraxzhn";
// 	// $db_connection = pg_connect("host=localhost dbname=yqraxzhn user=yqraxzhn password=cbupy2tJvPMaHFxatGHTH5hc5gNhDIO8");

// 	try{
// 		$pdo1 = new PDO($dsn, $user, $password);
// 		// $pdo = new PDO('pgsql:host=localhost;dbname=yqraxzhn', 'yqraxzhn', 'cbupy2tJvPMaHFxatGHTH5hc5gNhDIO8');
// 	}catch(PDOException $e){
// 		echo 'connection error!' . $e;
// 	}	



// 	try{
// 		$pdo2 = new PDO($dsn, $user, $password);
// 		// $pdo = new PDO('pgsql:host=localhost;dbname=yqraxzhn', 'yqraxzhn', 'cbupy2tJvPMaHFxatGHTH5hc5gNhDIO8');
// 	}catch(PDOException $e){
// 		echo 'connection error!' . $e;
// 	}	
// 	if ($pdo1 === $pdo2) {
// 		echo "Singleton pattern worked - only one PDO connection was created.\n";
// 	} else {
// 		echo "Singleton pattern failed - multiple PDO connections were created.\n";
// 	}
	
// 	// // Create connection
// 	// $conn = new mysqli($servername, $username, $password, $dbname);

// 	// // Check connection
// 	// if ($conn->connect_error) {
// 	// 	die("Connection failed: " . $conn->connect_error);
// 	// }

?>