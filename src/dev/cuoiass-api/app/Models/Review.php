<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 04 Dec 2018 03:17:32 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Review
 *
 * @property int $review_id
 * @property string $review_title
 * @property int $review_response_vendor_id
 * @property string $review_response_content
 * @property string $review_content
 * @property \Carbon\Carbon $review_date
 * @property float $review_rate
 * @property string $review_imgs
 * @property int $prd_id
 * @property int $booked_id
 * @property int $customer_id
 * @property string $created_by
 * @property \Carbon\Carbon $created_at
 * @property string $updated_by
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Customer $customer
 * @property \App\Models\Booking $booking
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class Review extends Eloquent
{
	protected $primaryKey = 'review_id';

	protected $casts = [
		'review_response_vendor_id' => 'int',
		'review_rate' => 'float',
		'prd_id' => 'int',
		'booked_id' => 'int',
		'customer_id' => 'int',
        'review_date' => 'date:d-m-Y'
	];

	protected $dates = [
		'review_date'
	];

	protected $fillable = [
		'review_title',
		'review_response_vendor_id',
		'review_response_content',
		'review_content',
		'review_date',
		'review_rate',
		'review_imgs',
		'prd_id',
		'booked_id',
		'customer_id',
		'created_by',
		'updated_by'
	];

	public function customer()
	{
		return $this->belongsTo(\App\Models\Customer::class, 'customer_id','customer_id');
	}

    public function vendor()
    {
        return $this->belongsTo(\App\Models\Vendor::class, 'review_response_vendor_id','vendor_id');
    }

	public function booking()
	{
		return $this->belongsTo(\App\Models\Booking::class, 'booked_id','booked_id');
	}

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class, 'prd_id','prd_id');
	}
}
