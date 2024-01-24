<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketComment extends Model
{
    use HasFactory;

    protected $table = 'tickets_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'created_by_customer',
        'user_id',
        'ticket_id',
        'content',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function ticket() {
        return $this->belongsTo('App\Models\Ticket', 'ticket_id');
    }
}
