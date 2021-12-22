<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Activity_group extends Model
{
    protected $table = "todo_items";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email','title'
    ]; 
}
