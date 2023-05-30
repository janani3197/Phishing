<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailing extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function storeEvent(string $type)
    {
        $this->events()->create([
            'event_type' => $type,
            'email' => $this->user->email
        ]);
    }
}
