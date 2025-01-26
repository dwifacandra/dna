<?php

namespace App\Models;

use Carbon\Carbon;
use App\Core\Enums\{JobType, LocationType};
use Illuminate\Database\Eloquent\{Factories\HasFactory, Model};

class ResumeExperience extends Model
{
    use HasFactory;
    protected $appends = ['location'];
    protected $fillable = [
        'company_id',
        'user_id',
        'job_title',
        'description',
        'country',
        'province',
        'regency',
        'job_type',
        'location_type',
        'start_date',
        'end_date',
    ];
    protected $casts = [
        'job_type' => JobType::class,
        'location_type' => LocationType::class,
    ];
    public function company()
    {
        return $this->belongsTo(ResumeCompany::class, 'company_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getLocationAttribute()
    {
        return "{$this->regency}, {$this->province}, {$this->country}";
    }
    public function getExperienceDurationAttribute()
    {
        $start = Carbon::parse($this->start_date);
        $end = $this->end_date ? Carbon::parse($this->end_date) : Carbon::now();
        $diff = $start->diff($end);
        $formattedDate = $start->format('M Y') . ' - ' . ($this->end_date ? $end->format('M Y') : 'Present');
        $years = $diff->y;
        $months = $diff->m;
        if ($years > 0) {
            return [
                'range' => $formattedDate,
                'duration' => "{$years} Years " . ($months > 0 ? "{$months} Months" : ""),
            ];
        } else {
            return [
                'range' => $formattedDate,
                'duration' => "{$months} Months",
            ];
        }
    }
}
