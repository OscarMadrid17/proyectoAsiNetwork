<?php

namespace App\Models;

use App\AppConstants;
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

        'affected_service_id',
        'affected_service_name',

        'report_type',
        'detection_date',
        'detection_time',
        'visit_schedule_datetime',
        'internal_customer_ticket',
        'description',
        'visit_requirement',
        'file',
        'status',
        'user_id',
        'customer_id'
    ];

    protected $appends = [
        'reportTypeText'
    ];

    public function getReportTypeTextAttribute() {
        return AppConstants::REPORT_TYPES[$this->report_type];
    }

    public function customer() {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function comments() {
        return $this->hasMany('App\Models\TicketComment', 'ticket_id');
    }
}
