<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Content;
use App\Models\Reply;
use App\Models\Comment;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:doctor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor  = Auth::user()->id;
        $comment = Comment::where('doctor_id', $doctor)
                            ->with('content')
                            ->paginate(2);

        return view('doctor.replyList', [
            'comments' => $comment,
        ]);
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
        $reply = new Comment;

        $reply->comment    = $request->comment;
        $reply->content_id = $request->content_id;
        $reply->doctor_id  = Auth::user()->id;

        $reply->save();

        return redirect()->route('doctor.home.index')->with('success', '返信が完了しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor  = Auth::user()->id;
        $content = Content::find($id);

        $doctor_reply = Comment::where('content_id', $id)
                            ->where('doctor_id', $doctor)
                            ->get();

        $player_reply = Reply::where('content_id', $id)
                            ->where('user_id', $content->user->id)
                            ->get();

        return view('doctor.content_detail', [
            'content' => $content,
            'doctor_replys' => $doctor_reply,
            'player_replys' => $player_reply,
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
        $reply = Comment::find($id);

        return view('doctor.reply_edit', [
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
        $record = Comment::find($id);

        $record->comment = $request->comment;

        $record->save();

        return redirect()->route('doctor.home.index')->with('success', '返信内容を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = Comment::find($id);
        $reply->delete();

        return redirect()->back()->with('success', '削除しました');
    }
    
}
