<?php

namespace App\Domain\Auth;

use App\Domain\Auth\ValueObj\AuthAccountStatus;
use App\Domain\Auth\ValueObj\AuthAccountType;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string $account_id
 * @property string $password
 * @property AuthAccountType $type
 * @property AuthAccountStatus $status
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 *
 * @property Auth $auth
 */
class AuthAccount extends Model
{
    protected $table = 'auth_accounts';

    protected $dateFormat = 'U';

    protected $fillable = [
        'auth_id',
        'account_id',
        'password',
        'type',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'int',
            'auth_id' => 'int',
            'password' => 'hashed',
            'type' => AuthAccountType::class,
            'status' => AuthAccountStatus::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * @return BelongsTo<Auth>
     */
    public function auth(): BelongsTo
    {
        return $this->belongsTo(Auth::class, 'auth_id');
    }
}
