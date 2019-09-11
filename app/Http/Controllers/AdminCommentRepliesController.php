<?php

namespace App\Http\Controllers;

use App\CommentReplies;
use App\Http\Requests\CommnetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCommentRepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
//        return $user->photo->file;
        $data = [
            'comment_id' => $request->comment_id,
            'body' => $request->body,
            'author' => $user->name,
            'email' => $user->email,
            'photo' => $user->photo->file,
        ];
        CommentReplies::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $replies = CommentReplies::all()->where('comment_id', '=', $id);

        return view('admin.comments.replies.index', compact('replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reply = CommentReplies::find($id);
        $reply->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CommentReplies::findOrFail($id)->delete();
        return redirect()->back();
    }
}
