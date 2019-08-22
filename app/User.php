<?php

namespace Toolchain;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatar() {
        return $this->original['avatar'];
    }

    public function getFullName() {
        return $this->original['name'];
    }

    public function getEmail() {
        return $this->original['email'];
    }

    public function hasPermission($perm) {
        $whitelist = $this->getWhitelist();

        if ($perm === 'view') {
            return in_array($this->getEmail(), $whitelist->view);
        }

        if ($perm === 'manage') {
            return in_array($this->getEmail(), $whitelist->manage);
        }
    }

    protected function getWhitelist() {
        $file = 'whitelist.json';
        if (!Storage::disk('local')->exists($file)) {
            Storage::disk('local')->put($file, json_encode([
                "manage" => ["your@email-address.com"],
                "view" => ["your@email-address.com"]
            ]));
        }

        return json_decode(Storage::disk('local')->get($file), false);
    }
}
