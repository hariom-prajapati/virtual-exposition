<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * Relation with Stand
     */
     public function stands()
     {
         return $this->hasMany('App\Stand');
     }

    /**
     * Get upcoming events
     */
    public static function getUpcomingEvents()
    {
        return static::where('start_date', '>', now())->get();
    }

    /**
     * Get current events
     */
    public static function getCurrentEvents()
    {
        return static::where([
                            ['start_date', '<', now()],
                            ['end_date', '>', now()],
                        ])->get();
    }

    /**
     * Get Past events
     */
    public static function getPastEvents()
    {
        return static::where('end_date', '<', now())->get();
    }
}
