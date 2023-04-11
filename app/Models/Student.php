<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $document
 * @property string $names
 * @property string $last_names
 * @method static Builder select(string[] $fields)
 * @method static Student findOrFail(int $userId)
 * @method static Builder where(string $column, string $operator, mixed $value)
 * @method static Student create(array $data)
 */
class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'document',
        'names',
        'last_names',
    ];

}
