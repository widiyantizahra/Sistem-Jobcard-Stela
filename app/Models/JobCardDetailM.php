<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCardDetailM extends Model
{
    use HasFactory;

    protected $table = 'jobcard_detail';

    protected $fillable = [
        'qty',
        'jobcard_id',
        'description',
        'unit_bop',
        'total_bop',
        'unit_sp',
        'total_sp',
        'unit_bp',
        'total_bp',
        'supplier',
        'remarks',
    ];
}
