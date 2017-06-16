<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * Class Cleaner
 * @package App
 */
class Cleaner extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cleaners';

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
    protected $fillable = ['first_name', 'last_name', 'quality_score', 'available_from', 'available_to'];

    protected $appends = ['full_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function cities() {

        return $this->belongsToMany('App\City');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings() {

        return $this->hasMany('App\Booking');

    }

    /**
     * @param $val
     * @return mixed
     */
    public function getAvailableFromAttribute($val) {

        return with(new DateTime($val))->format('H:i');

    }

    /**
     * @param $val
     * @return mixed
     */
    public function getAvailableToAttribute($val) {

        return with(new DateTime($val))->format('H:i');

    }

    /**
     * @param $val
     * @return mixed
     */
    public function getFullNameAttribute($val) {

        return $this->first_name. ' ' . $this->last_name;

    }
    
}
