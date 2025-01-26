<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'scope',
        'type',
        'parent_id'
    ];

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id');
    }

    public function skills()
    {
        return $this->hasMany(ResumeSkill::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getIsParentAttribute()
    {
        return is_null($this->parent_id) ? 'Category' : 'Subcategory';
    }
}
