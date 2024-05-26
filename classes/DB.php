<?php

class DB
{
    protected static $instance = null;

    protected const  DB_HOST =  'localhost';
    protected const  DB_NAME =  'challenge';
    protected const  DB_USER =  'root';
    protected const  DB_PASSWORD = '';

    private function __construct()
    {
        try {
            self::$instance = new PDO('mysql:host=' . self::DB_HOST, self::DB_USER, self::DB_PASSWORD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
            if (self::$instance->exec("CREATE DATABASE IF NOT EXISTS " . self::DB_NAME)) {
            self::$instance->exec("USE " . self::DB_NAME);
            $this->createTables();}
            else self::$instance->exec("USE " . self::DB_NAME);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function createTables()
    {
        self::$instance->exec("CREATE TABLE IF NOT EXISTS Admins (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(32) NOT NULL,
            email VARCHAR(32) NOT NULL,
            password VARCHAR(256) NOT NULL
        )");
    
        self::$instance->exec("INSERT INTO Admins (username, email, password) VALUES
        ('admin1', 'admin1@example.com', '" . password_hash("admin123", PASSWORD_DEFAULT) . "'),
        ('admin2', 'admin2@example.com', '" . password_hash("mySecurePass", PASSWORD_DEFAULT) . "'),
        ('admin3', 'admin3@example.com', '" . password_hash("p@ssw0rd", PASSWORD_DEFAULT) . "'),
        ('admin4', 'admin4@example.com', '" . password_hash("StrongPass456", PASSWORD_DEFAULT) . "'),
        ('admin5', 'admin5@example.com', '" . password_hash("secretP@55", PASSWORD_DEFAULT) . "')");
    
     
    
        // Create the Vehicle_Models table
        self::$instance->exec("CREATE TABLE IF NOT EXISTS Vehicle_Models (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(64) NOT NULL
        )");
        
        // Insert vehicle types into the Vehicle_Models table
        
    
        // Create the Fuel_Types table
        self::$instance->exec("CREATE TABLE IF NOT EXISTS Fuel_Types (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            type VARCHAR(32) NOT NULL
        )");
    
        // Insert fuel types into the Fuel_Types table
        self::$instance->exec("INSERT INTO Fuel_Types (type) VALUES
            ('gasoline'),
            ('diesel'),
            ('electric')");
        
        // Create the Vehicle_Types table
        self::$instance->exec("CREATE TABLE IF NOT EXISTS Vehicle_Types (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            type VARCHAR(64) NOT NULL
        )");
    
        // Insert vehicle types into the Vehicle_Types table
        self::$instance->exec("INSERT INTO Vehicle_Types (type) VALUES
            ('sedan'),
            ('coupe'),
            ('hatchback'),
            ('SUV'),
            ('minivan')");
    
        // Create the Registrations table
        self::$instance->exec("CREATE TABLE IF NOT EXISTS Registrations (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            model INT UNSIGNED NOT NULL,
            chassis_number VARCHAR(32) NOT NULL,
            vehicle_type INT UNSIGNED NOT NULL,
            production_year INT NOT NULL,
            registration VARCHAR(64) NOT NULL,
            fuel_type INT UNSIGNED NOT NULL,
            registrated_till DATE NOT NULL,
            FOREIGN KEY (model) REFERENCES Vehicle_Models(id),
            FOREIGN KEY (vehicle_type) REFERENCES Vehicle_Types(id),
            FOREIGN KEY (fuel_type) REFERENCES Fuel_Types(id)
        )");
    }
    
    public static function connect()
    {
        if (is_null(self::$instance)) {
            new self();
        }
        return self::$instance;
    }
    public static function select($table, $req = null, $pdo = null)
    {

        if (is_null($pdo)) {
            $pdo = self::connect();
        }

        $data = [];
        $sql = "SELECT * FROM {$table}";
    
        if (!is_null($req)) {
            if (isset($req['sql'])) {
                $sql = $req['sql'];
            }
    
            if (isset($req['data'])) {
                $data = $req['data'];
            }
        }

        $stmt = $pdo->prepare($sql);

        $stmt->execute($data);

        return $stmt->fetchAll();
    }
}
