<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RoleUser
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int $role_id
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser whereUserId($value)
 * @mixin \Eloquent
 * @mixin IdeHelperRoleUser
 */
class RoleUser extends Model
{
    use HasFactory;

    protected $table = 'role_users';

    protected $fillable = [
        'user_id',
        'role_id',
    ];
}
