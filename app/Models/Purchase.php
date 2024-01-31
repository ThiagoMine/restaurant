<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "contact_name",
        "command_number",
        "has_delivery",
        "for_trip",
        "status",
        "start",
        "delivery_address",
        "payment",
        "end"
    ];

    public function orders() {
        $this->hasMany(Order::class, "purchase_id", "id");
    }
}