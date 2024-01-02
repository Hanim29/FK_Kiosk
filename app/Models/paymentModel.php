<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\salesModel as Sale;
use App\Models\Application;

class paymentModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'paymentID'; // Assuming 'paymentID' is the primary key

    protected $fillable = [
        'appID',
        'salesID',
        'appNum',
        'phoneNum',
        'email',
        'payDate',
        'kioskNum',
        'totalPay',
        'payMethod',
    ];

    public $timestamps = false;

    protected $table = "payments";

    public function application()
    {
        return $this->belongsTo(Application::class, 'appID', 'appID');
    }

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'salesID', 'salesID');
    }
}
