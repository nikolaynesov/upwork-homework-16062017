<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * Class Booking
 * @package App
 */
class Booking extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bookings';

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
    protected $fillable = ['date', 'customer_id', 'cleaner_id', 'start_at', 'end_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cleaner() {

        return $this->belongsTo('App\Cleaner');

    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer() {

        return $this->belongsTo('App\Customer');

    }

    /**
     * @param $val
     * @return mixed
     */
    public function getStartAtAttribute($val) {

        return with(new DateTime($val))->format('H:i');

    }

    /**
     * @param $val
     * @return mixed
     */
    public function getEndAtAttribute($val) {

        return with(new DateTime($val))->format('H:i');

    }

    
}
