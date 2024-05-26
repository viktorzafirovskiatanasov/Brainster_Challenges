<?php

class RegistrationSelect
{
    protected static $table = 'registrations';
    public static function getAllRegistrations($pdo = null)
    {

        $req['sql'] = 'SELECT r.id, 
                       m.name AS vehicle_model, 
                       vt.type AS vehicle_type, 
                       r.chassis_number, 
                       r.production_year, 
                       r.registration, 
                       ft.type AS fuel_type, 
                       r.registrated_till
                FROM ' . self::$table . ' AS r
                JOIN Vehicle_Models AS m ON r.model = m.id
                JOIN Vehicle_Types AS vt ON r.vehicle_type = vt.id
                JOIN Fuel_Types AS ft ON r.fuel_type = ft.id';

        return DB::select(self::$table, $req, $pdo);
    }
    public static function alterRow($model, $chassis_number, $vehicle_type, $production_year, $registration, $fuel_type, $registration_till, $pdo = null)
    {
        $model_id = VehicleModel::getModelIdByName($model);
        $vehicle_type_id = VehicleType::getVehicleTypeIdByName($vehicle_type);
        $fuel_type_id = FuelType::getFuelTypeIdByName($fuel_type);
        $req['sql'] = 'UPDATE ' . self::$table . ' SET 
        model = :model,
        chassis_number = :chassis_number,
        vehicle_type = :vehicle_type,
        production_year = :production_year,
        registration = :registration,
        fuel_type = :fuel_type,
        registrated_till = :registration_till
        WHERE chassis_number = :chassis_number';

        $req['data'] = [
            'model' => $model_id,
            'chassis_number' => $chassis_number,
            'vehicle_type' => $vehicle_type_id,
            'production_year' => $production_year,
            'registration' => $registration,
            'fuel_type' => $fuel_type_id,
            'registration_till' => $registration_till
        ];


        DB::select(self::$table, $req, $pdo);
    }
    public static function checkCassisNumber($input, $pdo = null)
    {
        $req['sql'] = 'SELECT * FROM ' . self::$table . ' WHERE chassis_number = :input';
        $req['data'] = ['input' => $input];
        return DB::select(self::$table, $req, $pdo);
    }
    public static function insertRegistration($model, $chassis_number, $vehicle_type, $production_year, $registration, $fuel_type, $registration_till)
    {
        $model_id = VehicleModel::getModelIdByName($model);
        $vehicle_type_id = VehicleType::getVehicleTypeIdByName($vehicle_type);
        $fuel_type_id = FuelType::getFuelTypeIdByName($fuel_type);
        $req['sql'] = 'INSERT INTO ' . self::$table . ' 
                      (model, chassis_number, vehicle_type, production_year, registration, fuel_type, registrated_till)
                      VALUES
                      (:model, :chassis_number, :vehicle_type, :production_year, :registration, :fuel_type, :registrated_till)';

        $req['data'] = [
            'model' => $model_id,
            'chassis_number' => $chassis_number,
            'vehicle_type' => $vehicle_type_id,
            'production_year' => $production_year,
            'registration' => $registration,
            'fuel_type' => $fuel_type_id,
            'registrated_till' => $registration_till
        ];

        return DB::select(self::$table, $req);
    }
    public static function deleteRegistration($row)
    {
        $req['sql'] = 'DELETE FROM ' . self::$table . ' WHERE chassis_number = :row';
        $req['data'] = ['row' => $row];
        return DB::select(self::$table, $req);
    }
    public static function extendRegistration($row, $date)
    {
        $extendedDate = date('Y-m-d', strtotime($date . ' +1 year'));
        $req['sql'] = 'UPDATE ' . self::$table . ' SET registrated_till = :extended WHERE chassis_number = :row';
        $req['data'] =  ['extended' => $extendedDate, 'row' => $row];
        return DB::select(self::$table, $req);
    }
    public static function adminSearch($search)
    {
        $req['sql'] = 'SELECT r.id, 
        m.name AS vehicle_model, 
        vt.type AS vehicle_type, 
        r.chassis_number, 
        r.production_year, 
        r.registration, 
        ft.type AS fuel_type, 
        r.registrated_till
        FROM ' . self::$table . ' AS r
        JOIN Vehicle_Models AS m ON r.model = m.id
        JOIN Vehicle_Types AS vt ON r.vehicle_type = vt.id
        JOIN Fuel_Types AS ft ON r.fuel_type = ft.id
        WHERE 
        LOWER(m.name) LIKE LOWER(:search)  OR
            r.registration LIKE :search OR
            r.chassis_number LIKE :search';
        
        $req['data'] =  ['search' => '%' . $search . '%'];
       return  DB::select(self::$table,$req); 
    }
    public static function userSearch($search)
{
    $req['sql'] = 'SELECT r.id, 
        m.name AS vehicle_model, 
        vt.type AS vehicle_type, 
        r.chassis_number, 
        r.production_year, 
        r.registration, 
        ft.type AS fuel_type, 
        r.registrated_till
        FROM ' . self::$table . ' AS r
        JOIN Vehicle_Models AS m ON r.model = m.id
        JOIN Vehicle_Types AS vt ON r.vehicle_type = vt.id
        JOIN Fuel_Types AS ft ON r.fuel_type = ft.id
        WHERE 
        r.registration LIKE :search';
        
    $req['data'] =  ['search' => '%' . $search . '%'];
    return DB::select(self::$table,$req); 
}
}
