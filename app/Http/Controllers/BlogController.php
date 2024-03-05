<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;
use App\Repositories\BlogRepositoryInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        return view('blog.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_url' => 'required',
        ], [
            'image_url.required' => 'Image url cannot be empty.',
        ]);

        
    }
}
