<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Floor;


class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //展示
        // echo "展示";
         $floor = Floor::orderby('fid','desc')->get();
        return view('floor.index',['floor'=>$floor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加
        // echo 'ww';
        return view('floor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加
        $post = $request->except('_token'); 
        // dd($post);
        if($request->hasFile('pic')){
            $post['pic'] =upload('pic');
        }

       // 多文件上传
         if($request->hasFile('pics')){
            $pics =Moreupload('pics');
            $post['pics'] =implode('|', $pics);
        }




        $res = Floor::create($post);
        // dd($res);
        
        if($res){
            return redirect('/floor/index');
        }

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
