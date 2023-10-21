<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    /**fillable
    /* allows attributes to be manipulated from the outside*/
    protected $fillable = ['club_name', 'club_delegate'];
}
