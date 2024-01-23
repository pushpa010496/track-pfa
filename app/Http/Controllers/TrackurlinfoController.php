<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class TrackurlinfoController extends Controller
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

    public function geturlinfo(Request $request,$short_urlid)
    {
        
               $url_info=DB::table('tracklinks')->select('*')->where('shorturl_id',$short_urlid)->first();
           // $url_info=DB::table('tracklinks')->select('*')->first();
              //  print_r($url_info);

               

                if( $url_info){
                       $urlshortcode=$url_info->shorturl_id;
                       $clientip=$request->getClientIp();
                       $oriurl=$url_info->oriurl;
                       $titleid=$url_info->titleid;
                       $cliks_count=$url_info->cliks_count;
                       $newclick=$cliks_count+1;
                       $date=date('Y-m-d');
                       DB::table('trackurl_info')->insert([
                        'shorturl_id' => $urlshortcode,
                        'titleid' => $titleid, 
                        'client_ip' =>  $clientip,
                        'created_at'=>$date,
                        'updated_at'=>$date]
                    );

                             /* DB::table('tracklinks')
                             ->where('shorturl_id',$short_urlid)
                             ->update(['cliks_count' => $newclick]);
*/
                             if(substr($oriurl,0,4) == 'www.'){
                                $oriurl = 'http://'.$oriurl;
                                
                            }

                      return view('welcome', compact('oriurl'));        
                   // return redirect($oriurl);  
                
                  }





    }
}
