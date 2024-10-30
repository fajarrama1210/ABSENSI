<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Level;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $levels = Level::all();
        $majors = Major::all();

        return view('auth.register', compact('levels', 'majors'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'max:30'],
            'nisn' => ['required', 'digits_between:1,12'],
            'level_id' => ['required'],
            'major_id' => ['required'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:15360'],
        ], $this->messages());
    }

    protected function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.regex' => 'Nama hanya boleh berisi huruf.',
            'name.max' => 'Nama maksimal 30 karakter.',
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.digits_between' => 'NISN hanya boleh berisi angka dan maksimal 12 digit.',
            'level_id.required' => 'Kelas wajib dipilih.',
            'major_id.required' => 'Jurusan wajib dipilih.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'photo.required' => 'Foto wajib diisi.',
            'photo.image' => 'Foto harus berupa gambar.',
            'photo.mimes' => 'Foto harus berformat jpg, jpeg, atau png.',
            'photo.max' => 'Ukuran foto maksimal 15 MB.',
        ];
    }

    protected function create(array $data)
    {
        $photoPath = isset($data['photo']) ? $data['photo']->store('photos', 'public') : null;

        $user = User::create([
            'name' => $data['name'],
            'nisn' => $data['nisn'],
            'level_id' => $data['level_id'],
            'major_id' => $data['major_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'photo' => $photoPath,
            'status' => 'not active',
        ]);
        $user->assignRole('user');
        return $user;
        }

    protected function registered(Request $request, $user)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Menuggu Konfirmasi Admin.');
    }
}
