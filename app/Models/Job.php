<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';

    protected $guarded = ['id'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");

    }

    public function tag(string $name): void
    {
        $tag = Tag::firstOrCreate(['name' => $name]);

        $this->tags()->attach($tag);
    }

    public function scopeGroupByMonth(Builder $query)
    {
        $jobCounts = $query->selectRaw("strftime('%m', created_at) as month")
            ->selectRaw('count(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Initialize an array with all months set to 0
        $allMonths = array_fill(1, 12, 0);

        // Merge the job counts with the allMonths array
        foreach ($jobCounts as $month => $count) {
            $allMonths[intval($month)] = $count;
        }

        // Convert the array to an array of values (counts)
        return array_values($allMonths);
    }
}
