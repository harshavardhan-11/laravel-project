<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    protected $attributes = [
        'is_active' => 1,
        'remarks' => ""
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'remarks' => 'string'
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_listing_id');
    }
}
