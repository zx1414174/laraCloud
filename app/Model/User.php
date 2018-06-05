<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone',
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
     * passpost 寻找唯一用户方法
     * @param $username
     * @return User|\Illuminate\Database\Eloquent\Model|null|object
     * @author:pyh
     * @time:2018/6/5
     */
    public function findForPassport($username)
    {
        Log::error($username);
        return $this->where('phone',$username)->first();
    }
}
