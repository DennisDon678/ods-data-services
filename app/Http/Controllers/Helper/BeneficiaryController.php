<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

class BeneficiaryController extends Controller
{

    public function create(array $benficiary)
    {
        $newBeneficiary = Beneficiary::create([
            'user_id' => $benficiary['user_id'],
            'name' => $benficiary['name'],
            'number' => $benficiary['number']
        ]);

        if ($newBeneficiary) {
            return ([
                'saved' => true,
            ]);
        } else {
            return ([
                'saved' => false,
            ]);
        }
    }

    public function retrive($user_id)
    {
        $benficiaries = Beneficiary::where('user_id', $user_id)->get();
        if ($benficiaries) {
            return ([
                'benficiaries' => $benficiaries,
            ]);
        } else {
            return ([
                'benficiaries' => null,
            ]);
        }
    }

    public function delete($benficiary_id) {
        $benficiary = Beneficiary::find($benficiary_id);
        if ($benficiary) {
            $benficiary->delete();
            return ([
                'deleted' => true,
            ]);
        } else {
            return ([
                'deleted' => false,
            ]);
        }
    }

    public function update_benficary($benficiary_id, $benficiaryData) {
        $benficiary = Beneficiary::find($benficiary_id);
        if ($benficiary) {
            $benficiary->update([
                'name' => $benficiaryData['name'],
                'number' => $benficiaryData['number']
            ]);
            return ([
                'updated' => true,
            ]);
        } else {
            return ([
                'updated' => false,
            ]);
        }
    }
}
