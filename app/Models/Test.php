<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = ['level_id', 'questions'];

    protected $casts = [
        'questions' => 'array',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}

