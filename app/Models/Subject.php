<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static Builder select(string[] $columns)
 */
class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

}
