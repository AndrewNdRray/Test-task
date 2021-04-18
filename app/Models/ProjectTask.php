<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var array
     */
    protected $fillable = ['project_id', 'task_id'];
}
