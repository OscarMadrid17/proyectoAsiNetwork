<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',

        'contact_name',
        'first_contact_email',
        'second_contact_email',

        'affected_services',
        'report_type',
        'detection_datetime',
        'visit_schedule_datetime',
        'internal_customer_ticket',
        'description',
        'visit_requirement',
        'file'
    ];

    /**
     * The attributes thatshould be cast.
     *
     * @var array<string, string>
    */
    protected $casts = [
        'affected_services' => 'array',
    ];

    public function customer() {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
