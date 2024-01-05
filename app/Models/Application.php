<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';
    protected $primaryKey = 'appID';
    protected $fillable = ['vendorSelect', 'dateRentFrom', 'dateRentTo', 'bizName', 'ssmNo', 'bizType', 'appStatus'];
}
