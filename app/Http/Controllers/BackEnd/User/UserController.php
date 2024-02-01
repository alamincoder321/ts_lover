<?php

namespace App\Http\Controllers\BackEnd\User;

use App\Http\Controllers\Controller;
use App\Models\BasicSettings\Basic;
use App\Models\Language;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  public function index(Request $request)
  {
    $searchKey = null;

    if ($request->filled('info')) {
      $searchKey = $request['info'];
    }

    $users = User::query()->when($searchKey, function ($query, $searchKey) {
      return $query->where('username', 'like', '%' . $searchKey . '%')
        ->orWhere('email', 'like', '%' . $searchKey . '%');
    })
      ->orderByDesc('id')
      ->paginate(10);

    return view('backend.users.user.index', compact('users'));
  }

  public function updateEmailStatus(Request $request, $id)
  {
    $user = User::query()->find($id);

    if ($request['email_status'] == 'verified') {
      $user->update([
        'email_verified_at' => date('Y-m-d H:i:s')
      ]);
    } else {
      $user->update([
        'email_verified_at' => NULL
      ]);
    }

    Session::flash('success', 'Email status updated successfully!');

    return redirect()->back();
  }

  public function updateAccountStatus(Request $request, $id)
  {
    $user = User::query()->find($id);

    if ($request['account_status'] == 1) {
      $user->update([
        'status' => 1
      ]);
    } else {
      $user->update([
        'status' => 0
      ]);
    }

    Session::flash('success', 'Account status updated successfully!');

    return redirect()->back();
  }

  public function show($id)
  {
    $user = User::query()->find($id);
    $information['userInfo'] = $user;
    $information['basicData'] = Basic::query()->select('self_pickup_status', 'two_way_delivery_status')->first();

    return view('backend.users.user.details', $information);
  }

  public function changePassword($id)
  {
    $userInfo = User::query()->find($id);

    return view('backend.users.user.change-password', compact('userInfo'));
  }

  public function updatePassword(Request $request, $id)
  {
    $rules = [
      'new_password' => 'required|confirmed',
      'new_password_confirmation' => 'required'
    ];

    $messages = [
      'new_password.confirmed' => 'Password confirmation does not match.',
      'new_password_confirmation.required' => 'The confirm new password field is required.'
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
      return Response::json([
        'errors' => $validator->getMessageBag()->toArray()
      ], 400);
    }

    $user = User::query()->find($id);

    $user->update([
      'password' => Hash::make($request->new_password)
    ]);

    Session::flash('success', 'Password updated successfully!');

    return Response::json(['status' => 'success'], 200);
  }

  public function destroy($id)
  {
    $user = User::query()->find($id);
    // delete user image
    @unlink(public_path('assets/img/users/') . $user->image);
    $user->delete();
    return redirect()->back()->with('success', 'User deleted successfully!');
  }

  public function bulkDestroy(Request $request)
  {
    $ids = $request->ids;

    foreach ($ids as $id) {
      $user = User::query()->find($id);
      // delete user image
      @unlink(public_path('assets/img/users/') . $user->image);
      $user->delete();
    }

    Session::flash('success', 'Users deleted successfully!');

    return Response::json(['status' => 'success'], 200);
  }

  //secrtet login
  public function secret_login($id)
  {
    Session::put('secret_login', true);
    $user = User::where('id', $id)->first();
    Auth::guard('web')->login($user);
    return redirect()->route('user.dashboard');
  }
}
