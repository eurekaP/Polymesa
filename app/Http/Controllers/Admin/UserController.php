<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Crypto;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    protected $user;
    protected $crypto;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Crypto $crypto)
    {
        $this->user = $user;
        $this->crypto = $crypto;
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $users_fetch = $this->user->query()->where('role', 'customer')->get();
        return view('users-list', ['users_fetch' => $users_fetch]);
    }

    public function create(Request $request)
    {
        $cryptos = $this->crypto->query()->get();
        return view('user-add', ['cryptos' => $cryptos]);
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        $user->signinwiths = (array)(json_decode($user->signinwith));
        $user->cryptos = (array)(json_decode($user->cryptoSet));
        $user->communications = (array)(json_decode($user->communication));
        $user->emailNotifications = (array)(json_decode($user->emailNotification));

        $cryptos = $this->crypto->query()->get();
        return view('user-edit', ['cryptos' => $cryptos, 'user' => $user]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required | unique:users,deleted_at,NULL',
            'email' => 'required | unique:users,deleted_at,NULL',

            'password' => 'required',
            'confirmPassword' => 'required | same:password',
        ]);
        $file = $request->file('profile_pic');
        // var_dump($file);
        // exit(0);

        $data = array(
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
            'gender' => $request->gender,
            'city' => $request->city,
            'country' => $request->country,
            'birthdate' => $request->birthdate,
            'bio' => $request->bio,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'soundcloud' => $request->soundcloud,
            'youtube' => $request->youtube,
            'website' => $request->website,
            'patreon' => $request->patreon,
            'signinwith' => $request->signinwith,
            'communication' => $request->communication,
            'emailNotification' => $request->emailNotification,
            'cryptoSet' => $request->cryptoSet,
            'paypal' => $request->paypal,
            'stripe' => $request->stripe,
            'zelle' => $request->zelle,
            'venmo' => $request->venmo,
            'cashapp' => $request->cashapp,
            'status' => 'active',
        );
        
        if($file) {
            $fileName = time().'_'.$file->getClientOriginalName();
            $data['avatar'] = 'public/assets/images/users/'. $fileName;
            $file->move('public/assets/images/users/', $fileName);
        } else {
            $data['avatar'] = 'public/assets/images/users/default-avatar.png';
        }

        $this->user->create($data);

        return redirect()->route('user-list')->with('success', 'New User Added.');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'username' => 'required | unique:users',
            // 'password' => 'required | min:8',
            // 'confirmPassword' => 'required | min:8 | same:password',
        ]);
        
        $file = $request->file('profile_pic');
        $data = array(
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'gender' => $request->gender,
            'city' => $request->city,
            'country' => $request->country,
            'birthdate' => $request->birthdate,
            'bio' => $request->bio,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'soundcloud' => $request->soundcloud,
            'youtube' => $request->youtube,
            'website' => $request->website,
            'patreon' => $request->patreon,
            'signinwith' => $request->signinwith,
            'communication' => $request->communication,
            'emailNotification' => $request->emailNotification,
            'cryptoSet' => $request->cryptoSet,
            'paypal' => $request->paypal,
            'stripe' => $request->stripe,
            'zelle' => $request->zelle,
            'venmo' => $request->venmo,
            'cashapp' => $request->cashapp,
        );
        
        if($file) {
            $fileName = time().'_'.$file->getClientOriginalName();
            $data['avatar'] = 'public/assets/images/users/'. $fileName;
            $file->move('public/assets/images/users/', $fileName);
        } else {
            
        }

        if($request->password != '')
        {
            $data['password'] = Hash::make($request->password);
        }

        $this->user->find($id)->update($data);
        return redirect()->route('user-list')->with('success', 'Account is updated.');
    }

    public function changeStatus(Request $request)
    {
        $this->user->find($request->id)->update([
            'status' => $request->status,
        ]);
        return json_encode("success");
    }

    public function destroy($id)
    {
        $this->user->find($id)->delete();
        return redirect()->back()->with('success', 'User is deleted.');
    }
}