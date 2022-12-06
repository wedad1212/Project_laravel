<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=['cart_id','book_id','user_id'];
    protected $table = 'carts';
	protected $primaryKey = 'cart_id';

}
