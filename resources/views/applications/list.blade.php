@extends('layout')


@section('title')
    {{ $title }}
@endsection

@section('content')
	<div class="container">
        <h1 class="title m-b-md">
            {{ $title }}
        </h1>

        <div class="row mx-auto">
        	<a class="btn btn-primary" href="{{ $create_url }}/create">New {{ $model }}</a>
        </div>
		<table class="table table-bordered table-hover">
			<tr>
				<th scope="col">#</th>
				@foreach ($headers as $header)
				    <th scope="col">{{ $header }}</th>
				@endforeach
			</tr>
			@foreach ($data as $row)
			<tr scope="row">
				<td>{{ $loop->iteration }}</td>
				@foreach ($row as $item)
					<td>{{ $item }}</td>
				@endforeach
				<td><a class="btn btn-success" href="{{ $create_url }}/{{ reset($row) }}">Show</a></td>
				<td><a class="btn btn-primary" href="{{ $create_url }}/{{ reset($row) }}/edit">Edit</a></td>
				<td>
					<a class="btn btn-danger" data-method="delete" data-token="<?php echo csrf_token();?>" href="{{ $create_url }}/{{ reset($row) }}" data-confirm="Are you sure you want to delete this item ?">Delete</a>
				</td>
			</tr>
			@endforeach

		</table>
		
		
		
	</div>

@endsection