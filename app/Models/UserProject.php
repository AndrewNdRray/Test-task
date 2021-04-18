<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'project_id'];
}
