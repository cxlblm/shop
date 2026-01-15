<?php

namespace App\Domain\Auth;

use App\Domain\Auth\ValueObj\AuthStatus;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $uuid
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 * @property AuthAccount[] $LoginAccounts
 */
class Auth extends Model
{
    protected $table = 'auths';

    protected $dateFormat = 'U';

    protected $fillable = [
        'uuid',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'int',
            'uuid' => 'string',
            'status' => AuthStatus::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * @return HasMany<AuthAccount>
     */
    public function authAccounts(): HasMany
    {
        return $this->hasMany(AuthAccount::class, 'auth_id', 'id');
    }
}
