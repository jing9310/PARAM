<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Sport;
use App\Models\Place;
use App\Models\Content;
use App\Models\Reply;
use App\Models\Comment;

class HomeController extends Controller
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
    public function index(Request $request)
    {
        $user = Auth::user()->id;
        $contents = Content::where('user_id', $user)
                            ->orderBy('created_at', 'desc')
                            ->paginate(2);
                            
        if ($request->ajax())
        {
    		return response()->json($contents);
        }
        return view('user.home', [
            'contents' => $contents,
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
        $users = User::find($id);

        return view('user.confirm');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::with('sport', 'place')->find($id);
        $sports = Sport::get();
        $places = Place::get();
        
        return view('user.mypage', [
            'users' => $users,
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
        $record = User::find($id);

        $columns = ['name', 'email', 'password', 'kana', 'nickname', 'gender', 'birthday', 'height', 'weight', 'active', 'place_id', 'sport_id',];

        foreach($columns as $column) {
            $record->$column = $request->$column;
        }

        if($request->image) {
            $name = request()->file('image')->getClientOriginalName();
            $file = request()->file('image')->move('storage/user', $name);
            $record->image = $name;
        }
        
        $record->save();

        return redirect()->route('user.home.index')->with('success', 'マイページ更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id);
        $delete->delete();

        return redirect()->route('top')->with('success', '退会完了しました');
    }

    public function info($id)
    {
        $doctor = Doctor::find($id);

        return view('user.doctor_info', [
            'doctor' => $doctor,
        ]);
    }
}
