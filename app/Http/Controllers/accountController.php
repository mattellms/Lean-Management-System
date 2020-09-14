<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class accountController extends Controller
{
    public function login(){
        return view('login.loginPages');
    }

    public function register(){
        return view('registration.registerPages');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $acc = new Account;

        $request->validate([
            'kpknum' => 'unique:accounts,kpkNum',
            'emailAdd' => 'unique:accounts,email',            
         ]);
         

        $acc->fName = $request->fName;
        $acc->lName = $request->lName;
        $acc->email= $request->emailAdd;
        $acc->kpkNum = $request->kpknum;
        $acc->department = $request->department;
        $acc->pass = $request->pass;


        $acc->save();
        return redirect('/register')->with('status', 'Account Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
