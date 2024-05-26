<?php

class VehicleType
{
    protected static $table = 'Vehicle_Types';
    public static function getAllTypes($pdo = null){
        return DB::select(self::$table, null, $pdo);
    }
    public static function getVehicleTypeIdByName($vehicle_type_name)
{
    
    
    $req['sql'] = 'SELECT id FROM Vehicle_Types WHERE type = :vehicle_type_name';
    $req['data'] = ['vehicle_type_name' => $vehicle_type_name];
   
    $results = DB::select(self::$table,$req);

    if (!empty($results)) {
        return $results[0]['id'];
    }

    return null; // Vehicle type name not found
}
public static function getVehicleTypeNameById($id)
{
    $req['sql'] = 'SELECT type FROM Vehicle_Types WHERE id = :id';
    $req['data'] = ['id' => $id];
    
    $results = DB::select(self::$table,$req);

    if (!empty($results)) {
        return $results[0]['type'];
    }

    return null; 
}

}