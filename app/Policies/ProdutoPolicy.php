<?php

namespace App\Policies;

use App\User;
use App\Produto;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProdutoPolicy
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
     * Determine if the given user can delete the given produto.
     *
     * @param  User  $user
     * @param  Produto  $produto
     * @return bool
     */
    public function destroy(User $user,	Produto $produto) {
    	return $user->id === $produto->user_id;
    }
}
