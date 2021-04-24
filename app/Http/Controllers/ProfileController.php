<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Auth;
use Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //$userprofile = //Profile::where('user_id',$id)->first();

         $user = User::where('id',Auth::user()->id)->first();
         
         return view('profile',['userprofile'=>$user->profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

          $request->validate([

             'name'=>'required',
             'slug' => 'unique:profiles,slug',
             'thumbnail' => 'mimes:jpeg,bmp,png|max:1020',




             ]);


        
  
            if(Auth::user()->email !== $request->email)
            {

                $userupdate = User::where('id',Auth::user()->id)->update([

                  'email_verified_at'=> NULL, 
                  'name'=>$request->name,
                  'email'=>$request->email,

               ]);   

        
            }
    

            if($request->has('thumbnail')){

                $profile = new Profile;
                Storage::delete($profile->thumbnail);

               
                $extension = ".".$request->thumbnail->getClientOriginalExtension();
                $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
                $name = $name.$extension;
                $path = $request->thumbnail->storeAs('image', $name, 'public');
                
             

            }

            else
            {
                    $path = $request->path;
            }



         

           $update = Profile::where('user_id',$request->id)->update([
                 
                  'name'=>$request->name,
                  'slug'=>$request->email,
                  'address'=>$request->address,
                  'country'=>$request->country,
                  'state'=>$request->state,
                  'city'=>$request->city,
                  'phone'=>$request->mobile,
                  'thumbnail' => $path,
                   ]);


            if($update == true)
            {

               return redirect()->route('home')->with('status','Your Profile Update Successfully');

           }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
