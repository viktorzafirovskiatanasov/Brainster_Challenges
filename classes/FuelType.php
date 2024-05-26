<?php

class FuelType
{
    protected static $table = 'Fuel_Types';
    public static function getAllTypes($pdo = null){
        return DB::select(self::$table, null, $pdo);
    }
    public static function getFuelTypeIdByName($fuel_type_name)
{
    $req['sql'] = 'SELECT id FROM Fuel_Types WHERE type = :fuel_type_name';
    $req['data'] = ['fuel_type_name' => $fuel_type_name];
    
    $results = DB::select(self::$table,$req);

    if (!empty($results)) {
        return $results[0]['id'];
    }

    return null; // Fuel type name not found
}
public static function getFuelNameById($id)
{
    $req['sql'] = 'SELECT type FROM Fuel_Types WHERE id = :id';
    $req['data'] = ['id' => $id];
    
    $results = DB::select(self::$table,$req);

    if (!empty($results)) {
        return $results[0]['type'];
    }

    return null; // Fuel type name not found
}
}