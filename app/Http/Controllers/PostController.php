<?php

namespace App\Http\Controllers;

use App\Http\BaseControllers\DashboardController;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends DashboardController
{
    public function index()
    {
        $this->setSubtitle('Accounts');
        if (auth()->user()->role == 'user') {
            $data = Post::with('author')->where('author_id', auth()->user()->id)->get();

            $this->setData('posts', $data);
            return $this->render('post.index-user');
        }
        $data = Post::with('author')->get();

        $this->setData('posts', $data);
        return $this->render('post.index');
    }

    public function postAt($uuid)
    {
        $data = Post::with(['author', 'sections.sectionable'])->where('uuid', $uuid)->first();
        abort_if($data == null, 404);

        $this->setData('post', $data);
        return $this->render('post.view');
    }
}
