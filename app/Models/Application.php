<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    use HasFactory;
    protected $primaryKey = 'appID';    
    protected $table = 'applications';
    public $timestamps = false;
    protected $fillable = ['vendorSelect', 'dateRentFrom', 'dateRentTo', 'bizName', 'ssmNo', 'bizType', 'appStatus'];

}
