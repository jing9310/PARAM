<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Content;
use App\Models\Reply;

use App\Http\Requests\ContentRequest;

class ContentController extends Controller
{
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
        return view('user.create_content');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
    {
        $post = new Content;

        $post->title   = $request->title;
        $post->body    = $request->body;
        $post->del_flg = $request->del_flg;
        $post->user_id = Auth::user()->id;

        $post->save();

        return redirect()->route('user.home.index')->with('success', '新規投稿しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::find($id);
    
        return view('user.content_detail', [
            'content' => $content,
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
        $content = Content::find($id);

        return view('user.content_edit', [
            'content' => $content,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, $id)
    {
        $content = Content::find($id);

        $content->title = $request->title;
        $content->body  = $request->body;

        $content->save();

        return redirect()->route('user.home.index')->with('success', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Content::find($id);
        $delete->delete();

        return redirect()->route('user.home.index')->with('success', '投稿削除しました');
    }

    // 論理削除
    public function delflg(Request $request, $id)
    {
        
        $delflg = Content::find($id);

        $delflg->del_flg = $request->del_flg;
        
        $delflg->save();

        return redirect()->route('user.home.index');
    }
}
