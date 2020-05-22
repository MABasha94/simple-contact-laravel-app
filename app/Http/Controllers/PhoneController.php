<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneValidate;
use Illuminate\Http\Request;
use App\Phone;
use Auth;

class PhoneController extends Controller
{

    //make policy in constructor when make any action
    // public function __construct(){
    //     $this->authorizeResource(Phone::class, 'phone');
    // }

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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneValidate $request)
    {
        //  $phone = new Phone();
        //  $phone->user_id = Auth::id();
        //  $phone->phone = $request->phone;
        //  $phone->save();

        Phone::create($request->all() + ['user_id' => Auth::id()]);
        return redirect()->route("home")->with('alert', 'Phone has been created successfully!');

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
    public function edit(Phone $phone)
    {
        // $findId = Phone::find($id);
        // $this->authorize('phone.edit', auth()->user());
        return view('phones.edit',['returnData'=>$phone]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneValidate $request, Phone $phone)
    {
        // $newPhone = Phone::find($id);
        $this->authorize('update', $phone);
        $phone->phone = $request->phone;
        $phone->save();

        // Phone::update($request->all() + ['user_id' => Auth::id()]);
        return redirect()->route('home')->with('alert', 'Phone has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        // die($phone);
        $this->authorize('delete', $phone);
        // dd($deleteIdPhone);

        // $deleteIdPhone = Phone::find($id);
        $phone->delete();
        return redirect()->route('home');
    }
}
