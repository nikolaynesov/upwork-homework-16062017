<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * @package App
 */
class Customer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'phone_number'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings() {

        return $this->hasMany('App\Booking');

    }
    
}
