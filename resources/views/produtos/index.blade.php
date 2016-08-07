<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
	<div class="panel panel-default col-md-6 col-md-offset-3">
		<div class="panel-heading">
			Cadastro Produto
		</div>
	    <div class="panel-body">
	        <!-- Display Validation Errors -->
	        @include('common.errors')
	
	        <!-- New Task Form -->
	        <form action="{{ url('produto') }}" method="POST" class="form-horizontal">
	            {{ csrf_field() }}
	
	            <!-- Task Name -->
	            <div class="form-group">
	                <label for="produto-name" class="col-sm-3 control-label">Nome</label>
	
	                <div class="col-sm-6">
	                    <input type="text" name="name" id="produto-name" class="form-control">
	                </div>
	            </div>
	
	            <!-- Add Task Button -->
	            <div class="form-group">
	                <div class="col-sm-offset-3 col-sm-6">
	                    <button type="submit" class="btn btn-default">
	                        <i class="fa fa-plus"></i> Add Produto
	                    </button>
	                </div>
	            </div>
	        </form>   
	    </div>
    </div>

    <!-- TODO: Current Tasks -->
    <!-- Current Tasks -->
        @if (count($produtos) > 0)
        	<div class="panel panel-default col-md-6 col-md-offset-3">
        		<div class="panel-heading">
        			Listagem Produto
        		</div>
        		
        		<div class="panel-body">
        			<table class="table table-striped produto-table">
        				<thead>
        					<th>Produto</th>
        					<tr>&nbsp;</tr>
        				</thead>
        				
        				<tbody>
        					@foreach ($produtos as $produto) 
        						<tr>
        							<td class="table-text"> 
        								<div>{{ $produto->name }}</div>
        							</td>
        							
        							<td>
        								<!-- TODO: Delete Button -->
        								<form action="{{ url('produto/'.$produto->id) }}" method="POST">
        									{{ csrf_field() }}
        									{{ method_field('DELETE') }}
        									
        									<button type="submit" id="delete-produto-{{ $produto->id }}" class="btn btn-danger">
        										<i class="fa fa-btn fa-trash"></i> Delete
        									</button>
        								</form>
        							</td>
        						</tr>
        					@endforeach
        				</tbody>
        			</table>
        		</div>
        	</div>
        @endif
@endsection