<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param \App\Models\User  $user
     * @param \App\Models\Order $order
     * @return bool
     */
    public function own(User $user, Order $order)
    {
        return $order->user_id == $user->id;
    }
}
