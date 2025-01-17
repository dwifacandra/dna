<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResumeSkillCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function skills()
    {
        return $this->hasMany(ResumeSkill::class);
    }
}
