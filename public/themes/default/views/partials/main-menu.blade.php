@foreach($pages as $page)
    <li class="">
        <a href="{{ url($page->uri) }}">
            {{ $page->title }}
    </li>
@endforeach



                            