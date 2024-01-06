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
        'title',
        'kiosk_number',
        'maintainance_type',
        'description',
        'image_path',
        'status',
    ];
}
