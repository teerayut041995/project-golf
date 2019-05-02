<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        if ($user->profile_picture != '') {
            $profile_picture = url('images/user' , $user->profile_picture);
        } else {
            $profile_picture = url('images/default/no-image-user.png');
        }
        return [
            'id' => (int)$user->id,
            'name' => (string)$user->name,
            'username' => (string)$user->username,
            'phone' => (string)$user->phone,
            'email' => (string)$user->email,
            'profile_picture' => (string)$profile_picture,
            'verified' => (string)$user->verified,
            'verified' => (string)$user->verified,
            'created_at' => (string)$user->created_at,
            'updated_at' => (string)$user->updated_at,
        ];
    }
}
