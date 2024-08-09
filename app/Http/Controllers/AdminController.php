<?php

namespace App\Http\Controllers;

use App\Models\Airtime_to_cash;
use App\Models\AirtimetoCashConfig;
use App\Models\Cable_list;
use App\Models\Cable_plan;
use App\Models\Dataplans;
use App\Models\Manual_funding;
use App\Models\Network_list;
use App\Models\Pending_manual_fund;
use App\Models\plan_type_list;
use App\Models\Preorder;
use App\Models\Preordered;
use App\Models\Profits;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Vendor_config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
  public function admin_dashboard()
  {
    $balance = Http::withHeaders([
      'Authorization' => 'Token ' . env('API_TOKEN')
    ])->get(env('API_BASE_URL') . 'user')->json()['user']['wallet_balance'];
    return  view('admin.dashboard', compact('balance'));
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

  public function status(Request $request)
  {
    $data_type = plan_type_list::find($request->id);

    if ($data_type->status == 'active') {
      $data_type->status = 'inactive';
    } else {
      $data_type->status = 'active';
    }

    $data_type->save();
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

  public function cable_list(Request $request)
  {
    $cable_lists = Cable_list::all();

    return view('admin.cable_list', compact('cable_lists'));
  }

  public function edit_cable_list(Request $request)
  {
    $cable_list = Cable_list::find($request->id);
    $cable_list->label = $request->label;
    $cable_list->cable_id = $request->network_id;
    $cable_list->save();

    return redirect()->back();
  }

  public function delete_cable_list(Request $request)
  {
    $cable_list = Cable_list::find($request->id);
    $cable_list->delete();

    return redirect()->back();
  }

  public function add_cable_list(Request $request)
  {
    Cable_list::create($request->except('_token'));

    return redirect()->back();
  }

  // Cable plan management
  public function cable_plans(Request $request)
  {
    $cable_plans = Cable_plan::all();

    return view('admin.cable_plans', compact('cable_plans'));
  }

  public function add_cable_plan(Request $request)
  {
    Cable_plan::create($request->except('_token'));

    return redirect()->back();
  }

  public function edit_cable_plan(Request $request)
  {
    $cable_plan = Cable_plan::find($request->id);
    $cable_plan->plan_id = $request->plan_id;
    $cable_plan->plan_name = $request->plan_name;
    $cable_plan->price = $request->price;
    $cable_plan->cable_id = $request->cable_id;
    $cable_plan->save();

    return redirect()->back();
  }

  public function delete_cable_plan(Request $request)
  {
    $cable_plan = Cable_plan::find($request->id);
    $cable_plan->delete();

    return redirect()->back();
  }

  //preorder management
  public function preorders()
  {
    $preorders = Preorder::all();
    return view('admin.preorders', compact('preorders'));
  }

  public function edit_preorder(Request $request)
  {
    $preorder = Preorder::find($request->id);

    $preorder->size = $request->size;
    $preorder->price = $request->price;
    $preorder->validity = $request->validity;

    $preorder->save();
    return redirect()->back();
  }

  public function add_preorder(Request $request)
  {
    Preorder::create($request->except('_token'));
    return redirect()->back();
  }

  public function delete_preorder(Request $request)
  {
    $preorder = Preorder::find($request->id);
    $preorder->delete();
    return redirect()->back();
  }

  public function pull_mtn_sme()
  {
    // Pull from API response
    $response = Http::withHeaders([
      'Authorization' => 'Token ' . env('API_TOKEN'),
      'Content-Type' => 'application/json',
    ])->get(env('API_BASE_URL') . 'user')->json()['Dataplans']['MTN_PLAN']['ALL'];

    foreach ($response as $sme) {
      if ($sme['plan_type'] == 'SME') {
        $plan = Dataplans::where('plan_id', '=', 1)->where('data_id', '=', $sme['dataplan_id'])->first();
        if ($plan) {
          $plan->price = $sme['plan_amount'];
          $plan->validity = $sme['month_validate'];
          $plan->size = $sme['plan'];
          $plan->save();
        } else {
          Dataplans::create([
            'data_id' => $sme['dataplan_id'],
            'plan_id' => 1,
            'size' => $sme['plan'],
            'validity' => $sme['month_validate'],
            'price' => $sme['plan_amount'],
          ]);
        }
      }
    }
    return redirect()->back();
  }

  public function mtn_corporate()
  {
    // Pull from API response
    $response = Http::withHeaders([
      'Authorization' => 'Token ' . env('API_TOKEN'),
      'Content-Type' => 'application/json',
    ])->get(env('API_BASE_URL') . 'user')->json()['Dataplans']['MTN_PLAN']['ALL'];

    foreach ($response as $sme) {
      if ($sme['plan_type'] == 'CORPORATE GIFTING') {
        $plan = Dataplans::where('plan_id', '=', 3)->where('data_id', '=', $sme['dataplan_id'])->first();
        if ($plan) {
          $plan->price = $sme['plan_amount'];
          $plan->validity = $sme['month_validate'];
          $plan->size = $sme['plan'];
          $plan->save();
        } else {
          Dataplans::create([
            'data_id' => $sme['dataplan_id'],
            'plan_id' => 3,
            'size' => $sme['plan'],
            'validity' => $sme['month_validate'],
            'price' => $sme['plan_amount'],
          ]);
        }
      }
    }
    return redirect()->back();
  }

  public function mtn_gifting()
  {
    // Pull from API response
    $response = Http::withHeaders([
      'Authorization' => 'Token ' . env('API_TOKEN'),
      'Content-Type' => 'application/json',
    ])->get(env('API_BASE_URL') . 'user')->json()['Dataplans']['MTN_PLAN']['ALL'];

    foreach ($response as $sme) {
      if ($sme['plan_type'] == 'GIFTING') {
        $plan = Dataplans::where('plan_id', '=', 2)->where('data_id', '=', $sme['dataplan_id'])->first();
        if ($plan) {
          $plan->price = $sme['plan_amount'];
          $plan->validity = $sme['month_validate'];
          $plan->size = $sme['plan'];
          $plan->save();
        } else {
          Dataplans::create([
            'data_id' => $sme['dataplan_id'],
            'plan_id' => 2,
            'size' => $sme['plan'],
            'validity' => $sme['month_validate'],
            'price' => $sme['plan_amount'],
          ]);
        }
      }
    }
    return redirect()->back();
  }

  public function mtn_awoof()
  {
    // Pull from API response
    $response = Http::withHeaders([
      'Authorization' => 'Token ' . env('API_TOKEN'),
      'Content-Type' => 'application/json',
    ])->get(env('API_BASE_URL') . 'user')->json()['Dataplans']['MTN_PLAN']['ALL'];

    foreach ($response as $sme) {
      if ($sme['plan_type'] == 'DATA AWOOF') {
        $plan = Dataplans::where('plan_id', '=', 13)->where('data_id', '=', $sme['dataplan_id'])->first();
        // if ($plan == null) {
        if ($plan) {
          $plan->price = $sme['plan_amount'];
          $plan->validity = $sme['month_validate'];
          $plan->size = $sme['plan'];
          $plan->save();
        } else {
          Dataplans::create([
            'data_id' => $sme['dataplan_id'],
            'plan_id' => 13,
            'size' => $sme['plan'],
            'validity' => $sme['month_validate'],
            'price' => $sme['plan_amount'],
          ]);
        }
        // }
      }
    }
    return redirect()->back();
  }

  public function mtn_coupon()
  {
    // Pull from API response
    $response = Http::withHeaders([
      'Authorization' => 'Token ' . env('API_TOKEN'),
      'Content-Type' => 'application/json',
    ])->get(env('API_BASE_URL') . 'user')->json()['Dataplans']['MTN_PLAN']['ALL'];

    foreach ($response as $sme) {
      if ($sme['plan_type'] == 'DATA COUPONS') {
        $plan = Dataplans::where('plan_id', '=', 12)->where('data_id', '=', $sme['dataplan_id'])->first();
        // if ($plan == null) {
        if ($plan) {
          $plan->price = $sme['plan_amount'];
          $plan->validity = $sme['month_validate'];
          $plan->size = $sme['plan'];
          $plan->save();
        } else {
          Dataplans::create([
            'data_id' => $sme['dataplan_id'],
            'plan_id' => 12,
            'size' => $sme['plan'],
            'validity' => $sme['month_validate'],
            'price' => $sme['plan_amount'],
          ]);
        }
        // }
      }
    }
    return redirect()->back();
  }

  public function glo_corporate()
  {
    // Pull from API response
    $response = Http::withHeaders([
      'Authorization' => 'Token ' . env('API_TOKEN'),
      'Content-Type' => 'application/json',
    ])->get(env('API_BASE_URL') . 'user')->json()['Dataplans']['GLO_PLAN']['ALL'];

    foreach ($response as $sme) {
      if ($sme['plan_type'] == 'CORPORATE GIFTING') {
        $plan = Dataplans::where('plan_id', '=', 10)->where('data_id', '=', $sme['dataplan_id'])->first();
        // if ($plan == null) {
        if ($plan) {
          $plan->price = $sme['plan_amount'];
          $plan->validity = $sme['month_validate'];
          $plan->size = $sme['plan'];
          $plan->save();
        } else {
          Dataplans::create([
            'data_id' => $sme['dataplan_id'],
            'plan_id' => 10,
            'size' => $sme['plan'],
            'validity' => $sme['month_validate'],
            'price' => $sme['plan_amount'],
          ]);
        }
        // }
      }
    }
    return redirect()->back();
  }

  public function glo_gifting()
  {
    // Pull from API response
    $response = Http::withHeaders([
      'Authorization' => 'Token ' . env('API_TOKEN'),
      'Content-Type' => 'application/json',
    ])->get(env('API_BASE_URL') . 'user')->json()['Dataplans']['GLO_PLAN']['ALL'];

    foreach ($response as $sme) {
      if ($sme['plan_type'] == 'GIFTING') {
        $plan = Dataplans::where('plan_id', '=', 9)->where('data_id', '=', $sme['dataplan_id'])->first();
        // if ($plan == null) {
        if ($plan) {
          $plan->price = $sme['plan_amount'];
          $plan->validity = $sme['month_validate'];
          $plan->size = $sme['plan'];
          $plan->save();
        } else {
          Dataplans::create([
            'data_id' => $sme['dataplan_id'],
            'plan_id' => 9,
            'size' => $sme['plan'],
            'validity' => $sme['month_validate'],
            'price' => $sme['plan_amount'],
          ]);
        }
        // }
      }
    }
    return redirect()->back();
  }

  public function airtel_gifting()
  {
    // Pull from API response
    $response = Http::withHeaders([
      'Authorization' => 'Token ' . env('API_TOKEN'),
      'Content-Type' => 'application/json',
    ])->get(env('API_BASE_URL') . 'user')->json()['Dataplans']['AIRTEL_PLAN']['ALL'];

    foreach ($response as $sme) {
      if ($sme['plan_type'] == 'GIFTING') {
        $plan = Dataplans::where('plan_id', '=', 6)->where('data_id', '=', $sme['dataplan_id'])->first();
        // if ($plan == null) {
        if ($plan) {
          $plan->price = $sme['plan_amount'];
          $plan->validity = $sme['month_validate'];
          $plan->size = $sme['plan'];
          $plan->save();
        } else {
          Dataplans::create([
            'data_id' => $sme['dataplan_id'],
            'plan_id' => 6,
            'size' => $sme['plan'],
            'validity' => $sme['month_validate'],
            'price' => $sme['plan_amount'],
          ]);
        }
        // }
      }
    }
    return redirect()->back();
  }

  public function airtel_corporate()
  {
    // Pull from API response
    $response = Http::withHeaders([
      'Authorization' => 'Token ' . env('API_TOKEN'),
      'Content-Type' => 'application/json',
    ])->get(env('API_BASE_URL') . 'user')->json()['Dataplans']['AIRTEL_PLAN']['ALL'];

    foreach ($response as $sme) {
      if ($sme['plan_type'] == 'CORPORATE GIFTING') {
        $plan = Dataplans::where('plan_id', '=', 8)->where('data_id', '=', $sme['dataplan_id'])->first();
        // if ($plan == null) {
        if ($plan) {
          $plan->price = $sme['plan_amount'];
          $plan->validity = $sme['month_validate'];
          $plan->size = $sme['plan'];
          $plan->save();
        } else {
          Dataplans::create([
            'data_id' => $sme['dataplan_id'],
            'plan_id' => 8,
            'size' => $sme['plan'],
            'validity' => $sme['month_validate'],
            'price' => $sme['plan_amount'],
          ]);
        }
        // }
      }
    }
    return redirect()->back();
  }

  public function mobile_gifting()
  {
    // Pull from API response
    $response = Http::withHeaders([
      'Authorization' => 'Token ' . env('API_TOKEN'),
      'Content-Type' => 'application/json',
    ])->get(env('API_BASE_URL') . 'user')->json()['Dataplans']['9MOBILE_PLAN']['ALL'];

    foreach ($response as $sme) {
      if ($sme['plan_type'] == 'GIFTING') {
        $plan = Dataplans::where('plan_id', '=', 7)->where('data_id', '=', $sme['dataplan_id'])->first();
        // if ($plan == null) {
        if ($plan) {
          $plan->price = $sme['plan_amount'];
          $plan->validity = $sme['month_validate'];
          $plan->size = $sme['plan'];
          $plan->save();
        } else {
          Dataplans::create([
            'data_id' => $sme['dataplan_id'],
            'plan_id' => 7,
            'size' => $sme['plan'],
            'validity' => $sme['month_validate'],
            'price' => $sme['plan_amount'],
          ]);
        }
        // }
      }
    }
    return redirect()->back();
  }

  public function mobile_corporate()
  {
    // Pull from API response
    $response = Http::withHeaders([
      'Authorization' => 'Token ' . env('API_TOKEN'),
      'Content-Type' => 'application/json',
    ])->get(env('API_BASE_URL') . 'user')->json()['Dataplans']['9MOBILE_PLAN']['ALL'];

    foreach ($response as $sme) {
      if ($sme['plan_type'] == 'CORPORATE GIFTING') {
        $plan = Dataplans::where('plan_id', '=', 11)->where('data_id', '=', $sme['dataplan_id'])->first();
        // if ($plan == null) {
        if ($plan) {
          $plan->price = $sme['plan_amount'];
          $plan->validity = $sme['month_validate'];
          $plan->size = $sme['plan'];
          $plan->save();
        } else {
          Dataplans::create([
            'data_id' => $sme['dataplan_id'],
            'plan_id' => 11,
            'size' => $sme['plan'],
            'validity' => $sme['month_validate'],
            'price' => $sme['plan_amount'],
          ]);
        }
        // }
      }
    }
    return redirect()->back();
  }

  public function profits()
  {
    $profits = Profits::all();
    return view('admin.profit', compact('profits'));
  }

  public function edit_profit(Request $request)
  {
    $profit = Profits::find($request->id);
    $profit->profit = $request->profit;
    $profit->save();
    return redirect()->back();
  }

  public function all_preorder()
  {
    $preorders = Preordered::paginate(20);
    return view('admin.preordered', compact('preorders'));
  }

  public function approve_preorder(Request $request)
  {
    $preorder = Preordered::find($request->id);

    if ($preorder) {
      $transaction = Transactions::where('transaction_id', '=', $preorder->reference)->first();

      $transaction->status = 'successfull';
      $transaction->save();

      $preorder->delete();
    }
    return redirect()->back();
  }

  public function airtime_to_cash()
  {
    $atocs = Airtime_to_cash::paginate(20);
    return view('admin.airtime_to_cash', compact('atocs'));
  }

  public function view_airtime_to_cash(Request $request)
  {
    $ato = Airtime_to_cash::find($request->id);
    return view('admin.view_airtime_to_cash', compact('ato'));
  }

  public function approve_airtime_to_cash(Request $request)
  {
    $ato = Airtime_to_cash::find($request->id);

    if ($ato) {
      if ($ato->account_name == '') {
        // find User 
        $user = User::find($ato->user_id);
        $percent = AirtimetoCashConfig::first();

        $user->balance = $user->balance + ($ato->amount *($percent->percent / 100) );
        $user->save();
      }

      // finc transaction 
      $trans = Transactions::where('transaction_id', '=', $ato->transaction_id)->first();
      $trans->status = "Successfull";
      $trans->save();

      $ato->delete();
    }
    return redirect('/admin/airtime_to_cash');
  }

  public function reject_airtime_to_cash(Request $request)
  {
    $ato = Airtime_to_cash::find($request->id);
    if ($ato) {
      // finc transaction 
      $trans = Transactions::where('transaction_id', '=', $ato->transaction_id)->first();
      $trans->status = "Rejected";
      $trans->save();


      $ato->delete();
    }
    return redirect('/admin/airtime_to_cash');
  }

  public function config_airtime_to_cash()
  {
    $ato_config = AirtimetoCashConfig::first();
    return view('admin.config_airtime_to_cash', compact('ato_config'));
  }

  public function update_config_airtime_to_cash(Request $request)
  {
    $ato_config = AirtimetoCashConfig::first();
    $ato_config->to = $request->to;
    $ato_config->percent = $request->percent;
    $ato_config->save();
    return redirect()->back();
  }

  public function config_vendors(Request $request){
    $vendor_config = Vendor_config::first();

    return view('admin.vendor_config', compact('vendor_config'));
  }

  public function update_config_vendors(Request $request){
    $vendor_config = Vendor_config::first();

    $vendor_config->onetime_fee = $request->onetime_fee;
    $vendor_config->discount = $request->discount;

    $vendor_config->save();

    return redirect()->back();
  }

  public function config_funding(){
    $methods = Manual_funding::all();
    return view('admin.config_funding',compact('methods'));
  }

  public function edit_config_funding(Request $request){
    $method = Manual_funding::find($request->id);

    $method->account_name = $request->account_name;
    $method->account_number = $request->account_number;
    $method->bank_name = $request->bank_name;

    $method->save();

    return redirect()->back();
  }

  public function add_config_funding(Request $request){
    Manual_funding::create($request->except('_token'));

    return redirect()->back();
  }

  public function delete_config_funding(Request $request){
    $method = Manual_funding::find($request->id);
    $method->delete();

    return redirect()->back();
  }

  public function pending_funding(){
    $pendings = Pending_manual_fund::all();

    return view('admin.pending_funding',compact('pendings'));
  }

  public function approve_pending_funding(Request $request){
    $pending = Pending_manual_fund::find($request->id);

    if($pending){
      $user = User::find($pending->user_id);
      $user->balance = $user->balance + $pending->amount;
      $user->save();

      $pending->delete();

      // Create Transaction
      Transactions::create([
        'user_id' => $user->id,
        'transaction_id' => uniqid(),
        'amount' => $pending->amount,
        'type' => 'deposit',
        'status' => 'success',
        'title' => 'wallet Funding'
      ]);
    }

    return redirect()->back();
  }

  public function reject_pending_funding(Request $request){
    $pending = Pending_manual_fund::find($request->id);

    if($pending){
      $pending->delete();

      // create Transaction
      Transactions::create([
        'user_id' => $pending->user_id,
        'transaction_id' => uniqid(),
        'amount' => $pending->amount,
        'type' => 'deposit',
        'status' => 'rejected',
        'title' => 'wallet Funding'
      ]);
    }

    return redirect()->back();
  }
}
