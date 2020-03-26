<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cate;

use DB;



class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // echo "OK";
        $list = Cate::get();
        $res = $this->getCateInfo($list);
        // dd($res);
        return view('cate.index',['info'=>$res]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加
        $list = Cate::get();
        $res = $this->getCateInfo($list);
        return view('cate.create',['arr'=>$res]);
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
        // $res = DB::table('category')->insert($post);
        $res = Cate::create($post);
         // dd($res);
        // echo "ok";die;
        if($res){
            return redirect('/cate/index');
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



       public function getCateInfo($list,$pid = 0,$level = 1)
     {
         static $Info = [];
        foreach ($list as $key => $value)
        {
            if($value['pid'] == $pid){
                $value['level'] = $level;
                $Info[] = $value;
                $this->getCateInfo($list,$value['cate_id'],$value['level']+1);
            }
        }
        return $Info;
     }
}
