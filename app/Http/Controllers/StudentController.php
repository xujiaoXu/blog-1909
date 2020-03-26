<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         //列表
        $student = DB::table('student')->get();
        return view('student.index',['student'=>$student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加
        return view('student.create');

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
        $res = DB::table('student')->insert($post);
         if($res){
            return redirect('/student/index');
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
        //编辑
         $student = DB::table('student')->where('sid',$id)->first();
        return view('student.edit',['student'=>$student]);
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
        //修改
         $post = $request->except(['_token']);
        $res = DB::table('student')->where('sid',$id)->update($post);
         if($res !==false){
            return redirect('/student/index');
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
         $res = DB::table('student')->where('sid',$id)->delete();
        if($res){
            return redirect('/student/index');
        }
    }
}
