<?php

namespace App\Http\Controllers;

use App\Models\Dataplans;
use App\Models\Network_list;
use App\Models\plan_type_list;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function admin_dashboard()
  {
    return  view('admin.dashboard');
  }

  public function users()
  {
    $users = User::paginate(20);

    return view('admin.users', compact('users'));
  }

  public function view_user(Request $request)
  {
    $user = User::find($request->id);

    return view('admin.view_user', compact('user'));
  }

  public function credit_user(Request $request)
  {
    $user = User::find($request->id);

    $user->balance = $user->balance + $request->creditAmount;
    $user->save();

    return redirect()->back()->with('message', "You have credit the user's balance");
  }

  public function debit_user(Request $request)
  {
    $user = User::find($request->id);

    $user->balance = $user->balance - $request->debitAmount;
    $user->save();

    return redirect()->back()->with('message', "You have debited the user's balance");
  }

  public function message_user(Request $request)
  {
    $user = User::find($request->id);

    try {

      return redirect()->back()->with('message', "Message has been sent");
    } catch (\Exception $e) {
      return redirect()->back()->with('message', 'Something went wrong');
    }
  }

  public function delete_user(Request $request)
  {
    $user = User::find($request->id);

    $user->delete();

    return redirect('/admin/users');
  }

  public function networks()
  {
    $networks = Network_list::all();

    return view('admin.networks', compact('networks'));
  }

  public function edit_network(Request $request)
  {
    $network = Network_list::find($request->id);

    $network->label = $request->label;
    $network->network_id = $request->network_id;

    $network->save();

    return redirect()->back()->with('message', 'Network has been updated');
  }

  public function delete_network(Request $request)
  {
    $network = Network_list::find($request->id);

    $network->delete();

    return redirect('/admin/networks');
  }

  public function add_network(Request $request)
  {
    $network = Network_list::create([
      'label' => $request->label,
      'network_id' => $request->network_id,
    ]);

    return redirect()->back()->with('message', 'Network has been added');
  }

  public function data_types()
  {
    $data_types = plan_type_list::all();
    return view('admin.data_types', compact('data_types'));
  }

  public function edit_data_type(Request $request)
  {
    $data_type = plan_type_list::find($request->id);

    $data_type->plan_type = $request->label;
    $data_type->network_id = $request->network_id;

    $data_type->save();

    return redirect()->back();
  }

  public function delete_data_type(Request $request)
  {
    $data_type = plan_type_list::find($request->id);

    $data_type->delete();

    return redirect()->back();
  }

  public function add_data_type(Request $request)
  {
    $data_type = plan_type_list::create([
      'plan_type' => $request->label,
      'network_id' => $request->network_id
    ]);

    return redirect()->back();
  }

  // Data plan management
  public function data_plans(Request $request)
  {
    $data_plans = [];

    if (isset($request->plan_id)) {
      $data_plans = Dataplans::where('plan_id', '=', $request->plan_id)->get();
    } else {
      $data_plans = Dataplans::all();
    }
    return view('admin.data_plans', compact('data_plans'));
  }

  public function edit_data_plan(Request $request)
  {
    $plan = Dataplans::find($request->id);
    $plan->plan_id = $request->plan_id;
    $plan->size = $request->size;
    $plan->price = $request->price;
    $plan->validity = $request->validity;
    $plan->data_id = $request->data_id;
    $plan->save();

    return redirect()->back();
  }

  public function delete_data_plan(Request $request)
  {
    $plan = Dataplans::find($request->id);

    $plan->delete();

    return redirect()->back();
  }

  public function add_data_plan(Request $request)
  {
    Dataplans::create($request->except('_token'));

    return redirect()->back();
  }
}
