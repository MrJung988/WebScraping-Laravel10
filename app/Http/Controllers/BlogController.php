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

    public function preview(Request $request)
    {
        $request->validate([
            'web_url' => 'required',
        ], [
            'web_url.required' => 'Image url cannot be empty. Please enter a valid website url.',
        ]);

        $data['payload'] = $this->blogRepository->fetchWebsite($request->web_url);

        return view('blog.preview', $data);
    }
}
