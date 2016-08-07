<?php

namespace App\Repositories;

use App\User;
use App\Produto;

class ProdutoRepository
{
	
	protected $produto;
	
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
	
	public function find($id) {
		return $this->produto->find($id);
	}
}