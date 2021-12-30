<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use Mehradsadeghi\FilterQueryString\FilterQueryString;

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

    public function activity_group()
    {
        return $this->belongsTo('App\Models\Activity_group');
    }
}
