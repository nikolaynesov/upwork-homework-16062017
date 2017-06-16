<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @package App
 */
class City extends Model
{

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function cleaners() {

        return $this->belongsToMany('App\Cleaner');

    }

}
