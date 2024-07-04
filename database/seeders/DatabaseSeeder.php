<?php

namespace Database\Seeders;

use App\Models\Cable_list;
use App\Models\Contacts;
use App\Models\Dataplans;
use App\Models\Network_list;
use App\Models\plan_type_list;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // $mtn_plans_types = [
        //     [
        //         'network_id' => 1,
        //         'plan_type' => 'SME'
        //     ],
        //     [
        //         'network_id' => 1,
        //         'plan_type' => 'Gifting'
        //     ],
        //     [
        //         'network_id' => 1,
        //         'plan_type' => 'Corporate'
        //     ],
        //     [
        //         'network_id' => 1,
        //         'plan_type' => 'Datashare'
        //     ]
        // ];

        // foreach ($mtn_plans_types as $mtn_plans_types){
        //     plan_type_list::create($mtn_plans_types);
        // }

        // // Create SME options
        // $sme = [
        //     [
        //         'data_id' => 210,
        //         'plan_id' => 1,
        //         'size' => '500MB',
        //         'validity' => 30,
        //         'price' => 160,
        //     ],
        //     [
        //         'data_id' => 7,
        //         'plan_id' => 1,
        //         'size' => '1GB',
        //         'validity' => 30,
        //         'price' => 280,
        //     ],
        //     [
        //         'data_id' => 8,
        //         'plan_id' => 1,
        //         'size' => '2GB',
        //         'validity' => 30,
        //         'price' => 558,
        //     ],
        //     [
        //         'data_id' => 240,
        //         'plan_id' => 1,
        //         'size' => '3GB',
        //         'validity' => 30,
        //         'price' => 780
        //     ],
        //     [
        //         'data_id' => 222,
        //         'plan_id' => 1,
        //         'size' => '5GB',
        //         'validity' => 30,
        //         'price' => 1376
        //     ],
        //     [
        //         'data_id' => 247,
        //         'plan_id' => 1,
        //         'size' => '10GB',
        //         'validity' => 30,
        //         'price' => 2752
        //     ]
        // ];

        // foreach ($sme as $sme){
        //     Dataplans::create($sme);
        // }

        // // Create Gifting
        // $gifting = [
        //     [
        //         'data_id' => 91,
        //         'plan_id' => 2,
        //         'size' => '1GB',
        //         'validity' => 30,
        //         'price' => 160,
        //     ],
        //     [
        //         'data_id' => 238,
        //         'plan_id' => 2,
        //         'size' => '1.2GB',
        //         'validity' => 30,
        //         'price' => 280,
        //     ],
        //     [
        //         'data_id' => 256,
        //         'plan_id' => 2,
        //         'size' => '3GB',
        //         'validity' => 30,
        //         'price' => 558,
        //     ],
        //     [
        //         'data_id' => 56,
        //         'plan_id' => 2,
        //         'size' => '10GB',
        //         'validity' => 30,
        //         'price' => 780
        //     ],
        //     [
        //         'data_id' => 57,
        //         'plan_id' => 2,
        //         'size' => '20GB',
        //         'validity' => 30,
        //         'price' => 1376
        //     ],
        //     [
        //         'data_id' => 59,
        //         'plan_id' => 2,
        //         'size' => '40GB',
        //         'validity' => 30,
        //         'price' => 2752
        //     ]
        // ];

        // foreach ($gifting as $sme){
        //     Dataplans::create($sme);
        // }

        // $cables = [
        //     [
        //         'label' => 'GOTV'
        //     ],
        //     [
        //         'label' => 'DSTV'
        //     ],
        //     [
        //         'label' => 'STARTIME'
        //     ],
        // ];

        // foreach ($cables as $cable){
        //     Cable_list::create($cable);
        // }

        $contacts = [
            [
                'title' => 'Conttact Via Email',
                'detail' => 'sitemail@site.com',
                'type' => 'email',
            ],

            [
                'title' => 'Contact Via whatsapp',
                'detail' => '+1234567890',
                'type' => 'whatsapp',
            ],
        ];

        foreach ($contacts as $contact){
            Contacts::create($contact);
        }
    }
}
