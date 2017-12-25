<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingCompany extends Model
{
    protected $fillable = [
        'name', 'logo', 'contact_person', 'email', 'phone', 'marketing_doc'
    ];

    /**
     * Get the stands for the company.
     */
     public function stands()
     {
         return $this->hasMany('App\Stand');
     }

     /*
     *  Get company details
     */
     public static function getCompanybyName($name)
     {
        return BookingCompany::where('name', '=', $name)->first();
     }
}
