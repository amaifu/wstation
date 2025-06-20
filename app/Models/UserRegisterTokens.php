<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRegisterTokens extends Model
{
    protected $table = 'user_register_tokens';

    protected $guarded = 'created_at';

    protected function casts(): array
    {
        return [
            'crated_at' => 'datetime',
        ];
    }
}
