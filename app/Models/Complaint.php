<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    const TYPE_KIOSK_APPLICATION = "Kiosk Application";
    const TYPE_KIOSK_PAYMENT = "Kiosk Payment";
    const TYPE_REPORT = "Kiosk Report";
    const TYPE_PERSONAL_ACCOUNT = "Personal Account";
    const TYPE_OTHERS = "Others";

    const STATUS_PENDING = "Pending";
    const STATUS_ATTEND= "Attend";
    const STATUS_DONE= "Done";

    protected $fillable = [
        'user_id',
        'admin_id',
        'title',
        'kiosk_number',
        'maintainance_type',
        'description',
        'image_path',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

