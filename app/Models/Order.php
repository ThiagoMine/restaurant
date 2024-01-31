<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "done",
        "in_kitchen",
        "purchase_id"
    ];

    public function purchase() {
        $this->belongsTo(Purchase::class);
    }

    public function productList() {
        $this->hasMany(ProductList::class, "order_id", "id");
    }
}
