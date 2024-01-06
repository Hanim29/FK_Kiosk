<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $primaryKey = 'appID';    

    protected $fillable = [
        'appID',
        "appStatus",
        // Add other columns here as per your migration
    ];

    protected $table = 'applications';
    public $timestamps = false;
}
