<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'tbl_course';
    protected $primaryKey = 'id';
    //protected $fillable = [''];
    protected  $hidden = ['created_by_user', 'updated_by_user', 'created_at', '	updated_at'];

}
