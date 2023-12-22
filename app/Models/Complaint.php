<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'name',
        'phone_number',
        'date_of_complaint',
        'kiosk_number',
        'maintainance_type',
        'complaint_description',
        'image',
        'complaint_status',
    ];
}
