@extends('layouts.frontend')

 @section('title', 'Welcome')


@section('content')
  @if($page->view)
        {!! $page->view->render() !!}
  @else
        @include('templates.page')
  @endif
@endsection
 
