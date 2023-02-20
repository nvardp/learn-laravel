
<?php

use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'            => (int) $user->id,
            'name'          => (string) $user->name,
            'email'         => (string) $user->email,
            'address'       => (string) $user->address,
        ];
    }
}


// use

// $user = User::find(1);
// return (new UserTransformer)->transform($user);