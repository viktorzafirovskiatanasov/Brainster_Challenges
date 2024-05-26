<?php

class VehicleModel
{
    protected static $table = 'Vehicle_Models';
    public static function getAllModels($pdo = null){
        return DB::select(self::$table, null, $pdo);
    }
    public static function getModelIdByName($model_name)
{
    $req['sql'] = 'SELECT id FROM Vehicle_Models WHERE name = :model_name';
    $req['data'] = ['model_name' => $model_name];
    
    $results = DB::select(self::$table,$req);

    if (!empty($results)) {
        return $results[0]['id'];
    }

    return null; 
}
public static function getModelNameById($id)
{
    $req['sql'] = 'SELECT name FROM Vehicle_Models WHERE id = :id';
    $req['data'] = ['id' => $id];
    
    $results = DB::select(self::$table,$req);

    if (!empty($results)) {
        return $results[0]['name'];
    }

    return null; 
}
public static function addModel($model){
    $req['sql'] = 'INSERT INTO ' . self::$table . ' (name) VALUES (:model)';
    $req['data'] = ['model' => $model];
    DB::select(self::$table , $req);
}
}