<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	// images, name, price, quantity, description, category).a
	protected $table="product";
	protected $filable=['image','name','price','quantity','description','category'];

	public function getImageAttribute($value)
	{
		if ($value) {
			return asset('/'.$value);
		}
	}
}
