@extends('layouts.frontend')

 @section('title', 'Cty TNHH Thương mại và Du lịch TechFly')


@section('content')
  @if($page->view)
        {!! $page->view->render() !!}
  @else
        @include('templates.page')
  @endif
@endsection
 
