<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'lat' => 'double',
        'lng' => 'double',
    ];

    protected $appends = [
        'color',
        'merged_count',
        'readable_type',
        'translated_status',
        'child_emails',
    ];

    /**
     * Scope a query to only include merged and single problems.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeNotMerged($query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->whereNull('parent_id');
    }

    public function scopeActive($query)
    {
        return $query->notMerged()->where('status', '!=', 'in-review')->where('status', '!=', 'closed');
    }

    /**
     * Accessors & Mutators
     */

    public function getColorAttribute()
    {
        // If it is not merged get color, else marker color is orange.
        return $this->merged_count === 0 ? get_problem_color($this->type) : 'blue';
    }

    public function getNameAttribute()
    {
        // Do not return name if display_name is false.
        return $this->display_name || auth()->user() ? data_get($this->attributes, 'name') : null;
    }

    public function getMergedCountAttribute() {
        return $this->where('parent_id', $this->id)->count();
    }

    public function getImageUrlAttribute() {
        return data_get($this->attributes, 'image_url') ? asset('storage/images/'.data_get($this->attributes, 'image_url')) : null;
    }

    public function getReadableTypeAttribute()
    {
        return get_problem_type(data_get($this->attributes, 'type'));
    }

    public function getTranslatedStatusAttribute()
    {
        return get_translated_problem_status(data_get($this->attributes, 'status'));
    }

    public function getChildEmailsAttribute()
    {
        return $this->where('parent_id', $this->id)->get(['email'])->pluck('email');
    }

}
