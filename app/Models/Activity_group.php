<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 

class Activity_group extends Model
{
    protected $table = "activity_groups";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email','title'
    ]; 

    public function todo_item()
    {
        return $this->hasMany('App\Models\Todo_item');
    }
}
