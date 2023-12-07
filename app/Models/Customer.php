<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'access_token',
        'customer_code'
    ];

    public function tickets() {
        return $this->hasMany('App\Models\Ticket', 'customer_id')->orderBy('created_at', 'DESC');
    }
}
