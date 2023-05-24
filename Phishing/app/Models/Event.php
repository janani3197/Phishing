<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;

class Event extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;

    protected $fillable = [
        'email_id',
        'event_type',
        'user_id'
    ];

    public $sortable = ['email_id', 'event_type', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
