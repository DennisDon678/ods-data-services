<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\BeneficiaryController;
use Illuminate\Http\Request;

class ManageBeneficiary extends Controller
{
    protected $beneficiaryController;

    public function __construct()
    {
        $this->beneficiaryController = new BeneficiaryController();
    }

    public function list_beneficiaries(Request $request)
    {
        $user = $request->user()->id;
        $beneficiaries = $this->beneficiaryController->retrive($user);

        return response()->json([
            'status' => 'success',
            'data' => $beneficiaries['benficiaries'],
        ]);
    }

    public function add_beneficiary(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
        ]);

        $user = $request->user()->id;
        $beneficiaryData = [
            'user_id' => $user,
            'name' => $request->name,
            'number' => $request->number,
        ];

        $result = $this->beneficiaryController->create($beneficiaryData);

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function edit_beneficiary(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
        ]);

        $user = $request->user()->id;

        $beneficiaryData = [
            'name' => $request->name,
            'number' => $request->number,
        ];
        $result = $this->beneficiaryController->update_benficary($id, $beneficiaryData);
        if ($result['updated']) {
            return response()->json([
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update beneficiary',
            ], 500);
        }
    }

    public function delete_beneficiary(Request $request,$id)
    {
        $result = $this->beneficiaryController->delete($id);
        if ($result['deleted']) {
            return response()->json([
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete beneficiary',
            ], 500);
        }
    }
}
