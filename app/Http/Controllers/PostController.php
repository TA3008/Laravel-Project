<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Utilities\FileUpload;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
{
    $query = Post::with('user')->latest();

    if ($request->filled('keyword')) {
        $keyword = $request->input('keyword');
        $query->where('title', 'ILIKE', '%' . $keyword . '%'); 
    }

    $posts = $query->get();

    return view('posts.index', compact('posts'));
}


    public function show($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    public function edit($id = null)
    {
        $user = Auth::user();
        $role = is_object($user->role) ? $user->role->value : $user->role;

        if ($id) {
            // Sửa bài viết
            $post = Post::findOrFail($id);

            if ($role !== 'admin' && $post->created_by !== $user->id) {
                abort(403, 'Bạn không có quyền sửa bài viết này.');
            }
        } else {
            // Tạo bài viết mới
            if (!in_array($role, ['admin', 'editor'])) {
                abort(403, 'Bạn không có quyền tạo bài viết.');
            }

            $post = new Post();
        }

        return view('posts.edit', compact('post'));
    }

    public function save(Request $request, $id = null)
{
    $user = Auth::user();
    $role = is_object($user->role) ? $user->role->value : $user->role; 

    if ($id) {
        $post = Post::findOrFail($id);
        if ($role !== 'admin' && $post->user_id !== $user->id) {
            abort(403, 'Bạn không có quyền cập nhật bài viết này.');
        }
    } else {
        if (!in_array($role, ['admin', 'editor'])) {
            abort(403, 'Bạn không có quyền tạo bài viết.');
        }

        $post = new Post();
        $post->user_id = $user->id;
    }

    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->excerpt = $request->input('excerpt', '');

    // Upload ảnh nếu có
    if ($request->hasFile('image')) {
    $imagePath = FileUpload::upload($request->file('image'), 'posts');
    $post->image = $imagePath;
}

    $post->save();

    return redirect()->route('posts.index')->with('success', 'Lưu bài viết thành công.');
}

public function detail($slug)
{
    $post = Post::with('user')
        ->where('slug', $slug)
        ->firstOrFail();

    return view('posts.detail', compact('post'));
}


    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json([
            'message' => 'Xóa bài viết thành công.'
        ]);
    }
}
