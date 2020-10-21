<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    protected $table = 'territory';
    protected $fillable = ['provinsi','kota','kecamatan','kelurahan'];
}
