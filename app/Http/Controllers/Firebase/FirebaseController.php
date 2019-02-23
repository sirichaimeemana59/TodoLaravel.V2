<?php

namespace App\Http\Controllers\Firebase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{

    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'../../Firebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

        $database = $firebase->getDatabase();

        $ref = $database->getReference('sirichai');
        $key = $ref->push()->getKey();

        $ref->getChild($key)->set([
            'firstname'=>'Usa',
            'lastname'=>'Panyawong'
        ]);

        return $key;
    }

}
