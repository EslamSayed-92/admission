@extends('layout')


@section('title')
    {{ trans( trim($create_url,'/').".title" ) }}
@endsection

@section('content')
	<div class="container">
        <h1 class="title m-b-md">
            {{ trans( trim($create_url,'/').".title" ) }}
        </h1>
        <div class="row mx-auto">
        	<a class="btn btn-primary" href="{{ $create_url }}/create">{{ trans( trim($create_url,'/').".new" ) }}</a>
        </div>
		<table class="table table-bordered table-hover">
			<tr>
				<th scope="col">#</th>

				@foreach ($headers as $header)
				    <th scope="col">{{ trans( trim($create_url,'/').".".$header ) }}</th>
				@endforeach
			</tr>
			@foreach ($data as $row)
			<tr scope="row">
				<td>{{ $loop->iteration }}</td>
				@foreach ($row as $item)
					@if($loop->iteration>1)
					<td>{{ $item }}</td>
					@endif
				@endforeach
				<td><a class="btn btn-success" href="{{ $create_url }}/{{ reset($row) }}">{{ trans( trim($create_url,'/').".show" ) }}</a></td>
				<td><a class="btn btn-primary" href="{{ $create_url }}/{{ reset($row) }}/edit">{{ trans( trim($create_url,'/').".edit" ) }}</a></td>
				<td>
					<a class="btn btn-danger" data-method="delete" data-token="<?php echo csrf_token();?>" href="{{ $create_url }}/{{ reset($row) }}" data-confirm="Are you sure you want to delete this item ?">{{ trans( trim($create_url,'/').".delete" ) }}</a>
				</td>
			</tr>
			@endforeach

		</table>
		
		
		
	</div>

@endsection