<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $perPage = 5;

    protected $fillable = [
        'surname',
        'name',
        'patronymic',
    ];

    protected $appends = [
        'full_name'
    ];

    public function magazines()
    {
        return $this->belongsToMany(Magazine::class);
    }

    public function getFullNameAttribute()
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
    }
}
