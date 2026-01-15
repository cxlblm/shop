<?php

namespace App\Domain\User;

use App\Domain\User\ValuObj\UserStatus;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $auth_uuid
 */
class User extends Model
{
    protected $table = 'users';

    protected $dateFormat = 'U';

    protected $fillable = [
        'uuid',
        'name',
        'auth_uuid',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'int',
            'name' => 'string',
            'uuid' => 'string',
            'status' => UserStatus::class,
            'auth_uuid' => 'string',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
