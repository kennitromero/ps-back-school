<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static Generation create(mixed[] $columns)
 */
class Generation extends Model
{
    use HasFactory;

    protected $fillable = [
        'year'
    ];
}
