<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Todo_item extends Model
{
    protected $table = "todo_items";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activity_group_id', 'title','is_active','priority'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
