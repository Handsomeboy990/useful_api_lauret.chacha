<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Module
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Module extends Model
{
    use HasFactory;

	protected $table = 'modules';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

	protected $fillable = [
		'name',
		'description'
	];
}
