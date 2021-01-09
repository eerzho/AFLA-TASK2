<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    protected $perPage = 5;

    protected $fillable = [
        'name',
        'description',
        'img_path'
    ];

    protected $appends = [
        'img_url'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function getImgUrlAttribute()
    {
        return $this->img_path ? \Storage::disk('public')->url($this->img_path) : null;
    }
}
