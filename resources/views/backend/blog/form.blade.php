@extends('layouts.backend')

@section('title', $post->exists ? 'Editing '.$post->title : 'Create New Blog Post')

@section('head')

    {!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') !!}

@endsection


@section('content')
    {!! Form::model($post, [
        'method' => $post->exists ? 'put' : 'post',
        'route' => $post->exists ? ['backend.blog.update', $post->id] : ['backend.blog.store']
    ]) !!}

    <div class="form-group">
        {!! Form::label('title') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('slug') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>

     <div class="form-group row">
        <div class="col-md-12">
            {!! Form::label('category') !!}
        </div>
        <div class="col-md-4">
            {!! Form::select('term_id', $terms->lists('name', 'id')->toArray(), null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            {!! Form::label('published_at') !!}
        </div>
        <div class="col-md-4">
            {!! Form::text('published_at', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group excerpt">
        {!! Form::label('excerpt') !!}
        {!! Form::textarea('excerpt', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit($post->exists ? 'Save Post' : 'Create New Blog Post', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    {!! HTML::script('ckeditor/ckeditor.js') !!}

    <script>
        
        var config = {
            codeSnippet_theme: 'Monokai',
            language: '{{ config('app.locale') }}',
            height: 200,
            filebrowserBrowseUrl: '{!! url($fileBrowseUrl) !!}',
            toolbarGroups: [
                { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others' },
                //'/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'styles' },
                { name: 'colors' }
            ]
        };

        CKEDITOR.replace( 'excerpt', config);
        config['height'] = 400;
        CKEDITOR.replace( 'body', config);

        $('input[name=published_at]').datetimepicker({
            allowInputToggle: true,
            format: 'YYYY-MM-DD HH:mm:ss',
            showClear: true,
            defaultDate: '{{ old('published_at', $post->published_at) }}'
        });

        $('input[name=title]').on('blur', function () {
            var slugElement = $('input[name=slug]');

            if (slugElement.val()) {
                return;
            }

            slugElement.val(this.value.toLowerCase().replace(/[^a-z0-9-]+/g, '-').replace(/^-+|-+$/g, ''));
        });

    </script>
@endsection
