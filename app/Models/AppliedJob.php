<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppliedJob extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'job_listing_id',
        'user_id',
        'remarks',
        'is_active',
    ];
}
