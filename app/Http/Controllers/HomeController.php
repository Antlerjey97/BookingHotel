<?php

namespace App\Http\Controllers;


use App\Hotel;
use App\Partner;
use App\Proposal;
use App\Role;
use App\User;
use AuthAdmin;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
//        $hotel=Hotel::all();
//        view()->share('Hotels', $hotel);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // Used for Authorising the user.

    public function index()
    {
        //Checks to see what Role Id the Logged in user has.
        $Id = Auth::user()->id;
        $CurrentUser = User::find($Id);
        $UsersRole = $CurrentUser->role;
        $Partner = $CurrentUser->partners;
        $RoleId = $UsersRole->id;
        // dd($RoleId);
        //Depending on the Role Id different Dashboards are loaded.
        if ($RoleId == 2 && Auth::user()) {
            $Hotels = Hotel::where('status', 1)->get();
            return view('search',compact('Hotels'));
            // return view('userDash', compact('UsersRole'));
        } else {
            if ($RoleId == 4 && Auth::user()) {
                return view('adminM.master', compact('UsersRole'));
                // return view('admin.adminDash', compact('UsersRole'));
            } else {
                if ($RoleId == 1 && Auth::user()) {
                    // return view('search');
                    $PartnerHotels = $Partner->hotels->count();
                    return view('partners.partnerDash', compact('UsersRole', 'Partner', 'PartnerHotels'));
                    // return view('/profile', compact('proposal'));
                } else {
                    return view('auth.login');
                }
            }
        }
    }

    //Updates a User Role to Partner if the Admin accepts the Partner Request.

    public function update(Proposal $proposal, Role $role, Partner $partner)
    {

        //Finds the User a Proposal belongs to
        $Id = $proposal->id;
        $Proposal = Proposal::find($Id);
        $UserId = $Proposal->User->id;
        $User = User::findOrFail($UserId);

        // Updates the Users Role to Partner
        User::where('id', $UserId)->update(array('role_id' => '1'));
        $CompanyName = $Proposal->CompanyName;
        $CompanyEmail = $Proposal->CompanyEmail;
        $HQAddress = $Proposal->HQAddress;
        $phone = $Proposal->phone_number;

        // Creates a record in the Partners table with details such as Company Name
        $User->addPartner(

            $partner->create(
                [
                    'CompanyName' => $CompanyName,
                    'CompanyEmail' => $CompanyEmail,
                    'HQAddress' => $HQAddress,
                    'user_id' => $UserId,
                    'phone' => $phone
                ])
        );
        // Deletes the Proposal.
        $proposal->delete();

        return back();
    }

    public function profile()
    {

        if (Auth::check()) {
            $UserId = Auth::id();
            $User = User::find($UserId);
            if ($User->role->id == 2 && $User->proposals) {
                $proposal = $User->proposals;
                return view('profile', compact('proposal', 'User'));

            } elseif ($User->role->id == 2 )
            {

                return view('profileClient', compact('User'));
            } elseif ($User->role->id == 1)
            {
                $partners = $User->partners;
                return view('profileManageHotel', compact('User', 'partners'));
            }else{
                return redirect('/');
            }
        } else {
            return redirect('/login');
        }
    }

    public function created()
    {
        return view('adminM.user.register');
    }

    public function listUser()
    {
        $users = DB::table('users')->paginate(5);
        return view('adminM.user.list', compact('users'));
    }

    public function indexUser($id)
    {
        $user = User::find($id);
        if ($user->role_id == 2 || $user->role_id == 1) {
            return view('adminM.user.edit', compact('user'));
        }
        return back();
    }

    public function editUser($id, UserRequest $request)
    {
        $status = $request->input('check') ?: 0;
        $user = User::where('id', $id);
        if ($user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' =>  Hash::make($request['password']),
            'status' => $status
        ])) {
            toast()->success('Cập nhập tài khoản  thành công');
            return redirect()->route('admin.list');
        }
        toast()->warning('Cập nhập tài khoản thất bại');
        return redirect()->route('admin.list');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user ->status =1;
        $user ->save();
            toast()->success('Chặn tài khoản thành công');
            return redirect()->route('admin.list');
    }

    public function createUser(UserRequest $request)
    {

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role_id = 2;
        $user->save();
        toast()->success('Tạo tài khoản  thành công');
        return redirect()->route('admin.list');

    }

    public function editManage($id, UserRequest $request)
    {
        $user =Auth::user();
        if ($user->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $request['password']
            ]) && $user->partners->update([
                'CompanyName' => $request['companyName'],
                'CompanyEmail' => $request['companyEmail'],
                'HQAddress' => $request['addressCompany']
            ])) {
            toast()->success('Cập nhập tài khoản  thành công');
            return redirect()->route('profile');
        }
        toast()->warning('cập nhập tài khoản thất bại');
        return redirect()->route('profile');
    }
    public function userEdit(UserRequest $request){
        $user =Auth::user();
        if ($user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password']
        ])) {
            toast()->success('Cập nhập tài khoản  thành công');
            return redirect()->route('profile');
        }
        toast()->warning('Cập nhập tài khoản thất bại');
        return redirect()->route('profile');
    }

}
