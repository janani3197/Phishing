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
        'email',
        'mailing_id',
    ];

    public $sortable = ['email', 'event_type', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function mailing()
    {
        return $this->belongsTo(Mailing::class);
    }
}
