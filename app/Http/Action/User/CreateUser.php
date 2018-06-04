<?php
/**
 * 新建用户动作
 */

namespace App\Http\Action\User;


use App\Model\User;
use Illuminate\Support\Facades\Hash;

class CreateUser
{
    /*
     * 执行
     */
    public function execute(array $data) : User
    {
        return User::create([
            'name' => '',
            'email' => '',
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }

}