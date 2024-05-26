<?php

class Admin {
    protected static $table = 'admins';

    public static function getAdmin($input, $pdo = null){
        $req['sql'] = 'SELECT * FROM ' . self::$table . ' WHERE username = :input OR email = :input LIMIT 1';
        $req['data'] = ['input' => $input];
        return DB::select(self::$table, $req, $pdo);
    }
}