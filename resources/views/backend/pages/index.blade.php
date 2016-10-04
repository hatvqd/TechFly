@extends('layouts.backend')

@section('title', 'Pages')

@section('content')
	<a href="{{route('backend.pages.create')}}" class="btn btn-primary">Create New page</a>
	<table class="table table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Url</th>
                <th>Name</th>
                <td>Template</td>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($pages as $page)
                <tr>
                    <td>
                        <a href="{{ route('backend.pages.edit', $page->id) }}">
                        {!! $page->linkToPaddedTitle(route('backend.pages.edit', $page->id)) !!}
                        </a>
                    </td>
                    <td> <a href="{{ url($page->uri) }}"> {{ $page->pretty_uri }} </a> </td>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->template or 'None' }}</td>
                    <td>
                        <a href="{{ route('backend.pages.edit', $page->id) }}">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('backend.pages.confirm', $page->id) }}">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $pages->render() !!}
@endsection