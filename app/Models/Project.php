<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subtitle',
        'image_url',
        'project_url',
        'description',
    ];
    public static function getAllProjects()
    {
        return self::all();
    }
}
