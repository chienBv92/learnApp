<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kanji extends Eloquent
{
    //
    //protected $connection = 'mongodb';
    protected $table = 'tbl_kanji';
}
