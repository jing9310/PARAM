<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Sport;
use App\Models\Place;
use App\Models\Content;

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth:doctor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Content::where('del_flg', '1')
                        ->orderBy('created_at', 'desc')
                        ->paginate(3);

        return view('doctor.home', [
            'contents' => $all,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $contents = Content::where('del_flg', '1')
                            ->where('title', 'like', "%{$request->keyword}%")
                            ->orWhere('body', 'like', "%{$request->keyword}%")
                            ->paginate(3);


        $search_result = '「'.$request->keyword.'」の検索結果'.$contents->count().'件';

        return view('doctor.home', [
            'contents' => $contents,
            'search_result' => $search_result,
            'search_query'  => $request->search
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $doctors = Doctor::with('sport', 'place')->find($id);
        $sports = Sport::get();
        $places = Place::get();
        
        return view('doctor.mypage', [
            'doctors' => $doctors,
            'sports' => $sports,
            'places' => $places,
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
        $doctors = new Doctor();
        $record = $doctors->find($id);

        $columns = ['name', 'email', 'password', 'kana', 'nickname', 'gender', 'birthday', 'specialty', 'doctors_history', 'self_introduction', 'place_id', 'sport_id',];

        foreach($columns as $column) {
            $record->$column = $request->$column;
        }

        if($request->image) {
            $name = request()->file('image')->getClientOriginalName();
            $file = request()->file('image')->move('storage/doctor', $name);
            $record->image = $name;
        }

        $record->save();

        return redirect()->route('doctor.home.index')->with('update', 'マイページ更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DOctor::find($id);
        $delete->delete();

        return redirect()->route('top')->with('success', '退会完了しました');
    }

}
