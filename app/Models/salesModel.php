<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salesModel extends Model
{
    use HasFactory;
    protected $table = 'sales';
    protected $fillable = [ 'appID', 
                            'userID', 
                            'saleDate', 
                            'kioskNum', 
                            'totalSales', 
                            'comment'];
    public $timestamps = false;
    protected $primaryKey = "salesID";

}
