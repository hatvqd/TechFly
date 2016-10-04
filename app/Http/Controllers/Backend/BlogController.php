<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{

    protected $posts;

    public function __construct(Post $posts)
    {
        $this->posts = $posts;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->posts->with('author')->orderBy('published_at', 'desc')->paginate(10);

        return view('backend.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $fileBrowseUrl = config('medias.url');
        return view('backend.blog.form', compact('post', 'fileBrowseUrl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StorePostRequest $request)
    {
        $this->posts->create(
            ['author_id' => auth()->user()->id] + $request->only('title', 'slug', 'published_at', 'body', 'excerpt')
        );

        return redirect(route('backend.blog.index'))->with('status', 'Post has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->posts->findOrFail($id);

        $fileBrowseUrl = config('medias.url');

        return view('backend.blog.form', compact('post', 'fileBrowseUrl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $this->posts->findOrFail($id);

        $post->fill($request->only('title', 'slug', 'published_at', 'body', 'excerpt'))->save();

        return redirect(route('backend.blog.edit', $post->id))->with('status', 'Post has been updated.');
    }

    public function confirm($id)
    {
        $post = $this->posts->findOrFail($id);

        return view('backend.blog.confirm', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->posts->findOrFail($id);

        $post->delete();

        return redirect(route('backend.blog.index'))->with('status', 'Post has been deleted.');
    }
}
