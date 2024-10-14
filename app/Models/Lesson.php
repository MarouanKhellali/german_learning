<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['level_id', 'title', 'content'];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
