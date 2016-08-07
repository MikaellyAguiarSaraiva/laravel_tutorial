<?php

namespace App\Http\Controllers;

//use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Produto;
use App\Repositories\ProdutoRepository;


class ProdutoController extends Controller
{
	/**
	 * The produto repository instance.
	 *
	 * @var ProdutoRepository
	 */
	protected $produtos;
	
    
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ProdutoRepository $produtos)
	{
		$this->middleware('auth');
		
		$this->produtos = $produtos;
	}
	
	/**
	 * Display a list of all of the user's produto.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
// 		$produtos = $request->user()->produtos->get();
		
		return view('produtos.index', [
				'produtos' => $this->produtos->forUser($request->user()),
		]);
	}
	
	public function show($id) {
		return view('produto.index', [
				'produto' => $this->produtos->find($id),
		]);
	}
	
	/**
	 * Create a new produto.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
				'name' => 'required|max:255',
		]);
	
		// Create The Produto...
		
		$request->user()->produtos()->create([
				'name' => $request->name,
		]);
		
		return redirect('/produtos');
	}
	
	/**
	 * Destroy the given task.
	 *
	 * @param  Request  $request
	 * @param  Produto  $produto
	 * @return Response
	 */
	public function destroy(Request $request, Produto $produto) {
		
		$this->authorize('destroy', $produto);
		
		$produto->delete();
		
		return redirect('/produtos');
	}
}
