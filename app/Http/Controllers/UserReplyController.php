<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Content;
use App\Models\Reply;
use App\Models\Comment;

class UserReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reply = new Reply;

        $reply->reply_body = $request->reply_body;
        $reply->content_id = $request->content_id;
        $reply->comment_id = $request->comment_id;
        $reply->user_id    = Auth::user()->id;

        $reply->save();

        return redirect()->route('user.home.index')->with('success', '返信が完了しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user    = Auth::user()->id;
        $content = Content::find($id);

        $reply_doctor = Comment::with('doctor', 'reply')
                                ->where('content_id', $id)
                                ->get();

        $reply_user   = Reply::with('doctor', 'comment')
                                ->where('content_id', $id)
                                ->where('user_id', $user)
                                ->get();

        return view('user.reply', [
            'content' => $content,
            'reply_doctors' => $reply_doctor,
            'reply_users' => $reply_user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reply = Reply::find($id);        

        return view('user.reply_edit', [
            'reply' => $reply,
        ]);
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
        $user   = Auth::user()->id;
        $record = Reply::find($id);

        $record->reply_body = $request->reply_body;

        $record->save();

        return redirect()->route('user.home.index')->with('success', '返信内容を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = Reply::find($id);
        $reply->delete();

        return redirect()->route('user.home.index')->with('success', '削除しました');
    }
}
