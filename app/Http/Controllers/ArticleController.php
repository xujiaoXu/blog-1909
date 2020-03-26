<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Atype;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 搜索
         // $name = request()->name;
        $all = request()->except('_token'); 
        // dd($all);
        $where = [];
        if(!empty($all['name'])){
            $where[] = ['aname','like',"%".$all['name']."%"];

        }
        if(!empty($all['tid'])){
            $where[] = ['tname','like',"%".$all['tid']."%"];
        }

        //展示
        $atype = Atype::all();

        $article = Article::leftjoin('atype','article.tid','=','atype.tid')
                          ->where($where)
                          // ->get();
                        ->paginate(2);
                        // dd($article);
        $query = request()->all();
        if(request()->ajax()){
            // dd('123');
            return view('article.ajaxpage',['article'=>$article,'query'=>$query]);
        }


        return view('article.index',['article'=>$article,'query'=>$query,'atype'=>$atype]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加
        $atype = Atype::all();
        // dd($atype);
        return view('article.create',['atype'=>$atype]);
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
            'aname' => 'required|unique:article',
            'tid' => 'required',
            'zhongyao' => 'required',
            'is_show' => 'required',
            

            ],[
                'aname.required'=>'标题不能为空！',
                'aname.unique'=>'商品名称已存在！',
                'tid.required'=>'分类不能为空！',
                'zhongyao.required'=>'是否重要必选！',
                'is_show.required'=>'是否显示必选！',

            ]
        );






        // 执行商品添加
        $post = $request->except('_token'); 
        // dd($post);
        // 单文件上传
        if($request->hasFile('pic')){
            $post['pic'] =upload('pic');
        }
         $res = Article::create($post);
        // dd($res);
        
        if($res){
            return redirect('/article/index');
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
        //删除
        $res = Article::destroy($id);
        // dd($res);
        if($res){
            if(request()->ajax()){
                return json_encode(['code'=>'00000','msg'=>'删除成功']);
            }
            return redirect('/article/index');
        }
        
    }
}
