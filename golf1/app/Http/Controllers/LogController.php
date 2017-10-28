<?php

namespace AppGolf\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use AppGolf\Http\Requests;
use AppGolf\Http\Requests\LoginRequest;
use AppGolf\Http\Controllers\Controller;

class LogController extends Controller
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
   /* public function __construct(){
			$this->beforeFilter(function(){
								if(!Auth::check())
										return Redirect::to('/')->with('message','Iniciar sesion de nuevo');
			});		
    		}*/
    		
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
     public function logout(){
     			session_start();
     			session_destroy();
     			//header();
            //Auth::logout();            
            //Session::flush();            
            return Redirect::to('/');
            //Return Redirect::to('/');               
     }
    public function store(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request['email'],'password'=> $request['password']])){
            if(Auth::user()->rol == 1){
                return Redirect::to('/admin');
            }
            else{
                return Redirect::to('/uso');
            }  
        }
        Session::flash('message','Los datos son incorrectos');
        return Redirect::to('/');
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
        //
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
        //
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
