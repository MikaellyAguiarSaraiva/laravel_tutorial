<?php

namespace App\Repositories;

use App\User;

class ProdutoRepository
{
	/**
	 * Get all of the produtos for a given user.
	 *
	 * @param  User  $user
	 * @return Collection
	 */
	public function forUser(User $user)
	{
		return $user->produtos()
			->orderBy('created_at', 'asc')
			->get();
	}	
}