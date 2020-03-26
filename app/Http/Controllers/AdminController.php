<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Validation\Rule;


use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //展示
        $admin = Admin::orderby('aid','desc')->get();
        return view('admin.index',['admin'=>$admin]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加
        return view('admin.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 表单验证
         $vaildatedData = $request->validate(
            [
            'aname' => 'regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u|unique:admin',
            // 'brand_id' => 'required',
            'pwd' => 'required|digits_between:1,6',
            'atel' => 'required|digits:11',
            'aemail' => 'required',

            ],[
                'aname.regex'=>'管理员名称可以包含中文、数字、字母、下划线长度范围为2-16位！',
                'aname.unique'=>'管理员名称已存在！',
                'pwd.between'=>'密码不超过6位！',
                'pwd.required'=>'密码必填',
                'aemail.required'=>'邮箱非空',
                'atel.digits'=>'手机号必须是11位！',
                'atel.required'=>'手机号非空！',


            ]
        );




        //执行添加
        $post = $request->except('_token','rpwd'); 
        if($request->hasFile('pic')){
            $post['pic'] =upload('pic');
        }
        $res = Admin::create($post);
        // dd($res);
        
        if($res){
            return redirect('/admin/index');
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
        //接收编辑的值
        $admin = admin::find($id);
        return view('admin.edit',['admin'=>$admin]);

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

        $vaildatedData = $request->validate(
            [
            // 'aname' => 'regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u|unique:admin',

            //     'aname' => [
            //     'regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u',
            //     Rule::unique('admin')->ignore($id,'aid'),
            // ],

            // 'brand_id' => 'required',
            // 'pwd' => 'required|digits_between:1,6',
            'atel' => 'required|digits:11',
            'aemail' => 'required',

            ],[
                // 'aname.regex'=>'管理员名称可以包含中文、数字、字母、下划线长度范围为2-16位！',
                'aname.unique'=>'管理员名称已存在！',
                // 'pwd.between'=>'密码不超过6位！',
                // 'pwd.required'=>'密码必填',
                'aemail.required'=>'邮箱非空',
                'atel.digits'=>'手机号必须是11位！',
                'atel.required'=>'手机号非空！',


            ]
        );


        //执行修改
         //修改
        $post = $request->except(['_token']);

        if($request->hasFile('pic')){
            $post['pic'] =upload('pic');
        }

        $res = admin::where('aid',$id)->update($post);
         if($res !== false){
            return redirect('/admin/index');
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
        //删除
         $res = admin::destroy($id);
        if($res){
            return redirect('/admin/index');
        }
    }
}
