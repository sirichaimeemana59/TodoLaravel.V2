<?php

namespace App\Http\Controllers\User;

//use Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ImageUploadAndResizer;
//use App\Helpers\ImageUpload;
use App\User_Profile;

class UserController extends Controller
{

    public function index()
    {
        return view('Layout.Index');
    }


    public function create(Request $request)
    {
        $fileNameToDatabase = '//via.placeholder.com/250x250';
        if($request->hasFile('photo')){
            $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
            $uploader->width = 250;
            $uploader->height = 250;
            $fileNameToDatabase = $uploader->execute();
        }

        $profile = new User_Profile;
        $profile->firstname = $request->input('firstname');
        $profile->lastname = $request->input('lastname');
        $profile->birthday = $request->input('birthday');
        $profile->photo = $fileNameToDatabase;
        $profile->save();
        //dd($profile);

        return redirect('/list_user');

    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $profile = new User_Profile;
        $profile = $profile->get();

        return view('User.list_user')->with(compact('profile'));
    }


    public function edit($id = null)
    {
        $profile = User_Profile::find($id);
        $profile = $profile->first();

        //dd($profile);
        return view('User.update_profile_form')->with(compact('profile'));
    }


    public function update(Request $request)
    {
        if(!empty($request->hasFile('photo'))){
            $fileNameToDatabase = '//via.placeholder.com/250x250';
            if($request->hasFile('photo')){
                $uploader = new ImageUploadAndResizer($request->file('photo', '/images/photo'));
                $uploader->width = 250;
                $uploader->height = 250;
                $fileNameToDatabase = $uploader->execute();
            }

            $profile = User_Profile::find($request->input('id'));
            $profile->firstname = $request->input('firstname');
            $profile->lastname = $request->input('lastname');
            $profile->birthday = $request->input('birthday');
            $profile->photo = $fileNameToDatabase;
            $profile->save();
        }else{
            $profile = User_Profile::find($request->input('id'));
            $profile->firstname = $request->input('firstname');
            $profile->lastname = $request->input('lastname');
            $profile->birthday = $request->input('birthday');
            $profile->photo = $request->input('photo_hidden');
            $profile->save();
        }

        return redirect('/list_user');

    }


    public function destroy(Request $request)
    {
        $profile = User_Profile::find($request->input('id_hidden'));
        $profile = $profile->delete();

        return redirect('list_user');
    }
}
