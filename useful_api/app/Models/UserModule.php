<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\User;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserModule
 *
 * @property int $id
 * @property int $user_id
 * @property int $module_id
 * @property bool $active
 *
 * @property Module $module
 * @property User $user
 *
 * @package App\Models
 */
class UserModule extends Model
{
	protected $table = 'user_modules';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'module_id' => 'int',
		'active' => 'bool'
	];

	protected $fillable = [
		'user_id',
		'module_id',
		'active'
	];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function module(): HasMany {
        return $this->hasMany(Module::class, 'module_id');
    }
}
