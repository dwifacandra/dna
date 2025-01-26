<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\{Factories\HasFactory, Model};

class ResumeCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'url',
        'logo',
    ];
    public function experiences()
    {
        return $this->hasMany(ResumeExperience::class, 'company_id')->orderBy('start_date', 'desc');
    }
    public function getExperienceDurationAttribute()
    {
        $experiences = $this->experiences;
        if ($experiences->isEmpty()) {
            return 'No experiences available';
        }
        $startDate = $experiences->min('start_date');
        $endDate = $experiences->max(function ($experience) {
            return $experience->end_date ?? Carbon::now();
        });
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        $diff = $start->diff($end);
        $years = $diff->y;
        $months = $diff->m;
        if ($years > 0) {
            return "{$years} Years" . ($months > 0 ? " {$months} Months" : "");
        } else {
            return "{$months} Months";
        }
    }
}
