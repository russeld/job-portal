<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Job extends Model
{
    use HasFactory;

    use HasSlug;

    const PERMANENT = 1;
    const PARTTIME = 2;
    const CONTRACT = 3;
    const FREELANCE = 4;

    const JOB_TYPES = [
        [
            'label' => 'Permanent',
            'id' => self::PERMANENT
        ],
        [
            'label' => 'Part Time',
            'id' => self::PARTTIME
        ],
        [
            'label' => 'Contract',
            'id' => self::CONTRACT
        ],
        [
            'label' =>'Freelance',
            'id' => self::FREELANCE
        ]
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}
