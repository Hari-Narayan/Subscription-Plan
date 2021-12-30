<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'plans';

    protected $fillable = [
        'title',
        'min_package',
        'weekly_price',
        'monthly_price',
    ];
}
