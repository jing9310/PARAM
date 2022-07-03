<?php

namespace App\Http\Controllers\Doctor\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Doctor;
use App\Models\Sport;
use App\Models\Place;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DOCTOR_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:doctor');
    }

    // Guardの認証方法を指定
    protected function guard()
    {
        return Auth::guard('doctor');
    }

    // 新規登録画面
    public function showRegistrationForm()
    {
        $sports = Sport::get();
        $places = Place::get();

        return view('doctor.auth.register', [
            'sports' => $sports,
            'places' => $places,
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'kana' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'integer'],
            'birthday' => ['required', 'date'],
            'place_id' => ['required', 'integer'],
            'specialty' => ['required', 'string'],
            'doctors_history' => ['required', 'integer'],
            'self_introduction' => ['required'],
            'image' => ['file','mimes:jpeg,png,jpg,bmb','max:2048'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Doctor
     */
    protected function create(array $data)
    {
        
        $path = $data['image']->store('public/doctor');

        return Doctor::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'kana' => $data['kana'],
            'nickname' => $data['nickname'],
            'birthday' => $data['birthday'],
            'gender' => $data['gender'],
            'place_id' => $data['place_id'],
            'sport_id' => $data['sport_id'],
            'specialty' => $data['specialty'],
            'doctors_history' => $data['doctors_history'],
            'self_introduction' => $data['self_introduction'],
            'image' => $path,
        ]);
    }

    private function saveAvatar(UploadedFile $file): string
    {
        $tempPath = $this->makeTempPath();
        Image::make($file)->fit(200, 200)->save($tempPath);
        $filePath = Storage::disk('public/doctor')
            ->putFile('image', new File($tempPath));
        return basename($filePath);
    }

   private function makeTempPath(): string
   {
       $tmp_fp = tmpfile();
       $meta   = stream_get_meta_data($tmp_fp);
       return $meta["uri"];
   }
}
