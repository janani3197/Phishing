<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Event extends Model
{
    use HasFactory, Sortable;
    protected $fillable = [
        'event_type',
        'user_id',
        'email_id',
    ];

    public $sortable = ['email_id', 'event_type', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
