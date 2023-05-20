<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content','cuklim','oglhidrati','insultips','insuldev','kordev'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($note) {
            $note->user_id = Auth::id();
        });
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
