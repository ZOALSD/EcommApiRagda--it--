<?php

namespace App\Broadcasting;

use App\Model\SellerOrder;
use App\User;

class UserChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\User  $user
     * @return array|bool
     */
    public function join(User $user, SellerOrder $seller)
    {
        return $user->id === $seller->seller_id;
    }
}
