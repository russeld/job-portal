<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Job extends Model
{
    use HasFactory, HasSlug;

    const PERMANENT = 1;
    const PARTTIME = 2;
    const CONTRACT = 3;
    const FREELANCE = 4;

    const PUBLISHED = 1;
    const DRAFT = 2;
    const EXPIRED = 99;


    const TYPES = [
        ['label' => 'Permanent', 'id' => self::PERMANENT],
        ['label' => 'Part Time', 'id' => self::PARTTIME],
        ['label' => 'Contract', 'id' => self::CONTRACT],
        ['label' =>'Freelance', 'id' => self::FREELANCE]
    ];

    const DURATIONS = [
        ['label' => '7 days', 'value' => 7],
        ['label' => '9 days', 'value' => 9],
        ['label' => '30 days', 'value' => 30],
        ['label' =>'90 days', 'value' => 90]
    ];

    const STATUS = [
        ['label' => 'Published', 'value' => self::PUBLISHED],
        ['label' => 'Draft', 'value' => self::DRAFT],
        ['label' => 'Expired', 'value' => self::EXPIRED],
    ];


    protected $fillable = [
        'title',
        'description',
        'start_date',
        'duration',
        'min_salary',
        'max_salary',
        'opening',
        'type',
        'industry_id',
        'status'
    ];

    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'created_at' => 'date:M d, Y',
    ];

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
