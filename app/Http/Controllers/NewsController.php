<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Redis
use Illuminate\Support\Facades\Redis;

use App\News;
use App\Type;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // Redis::flushall();
        $page = request()->page??1;
        $name = request()->name??'';
        $news = Redis::get('newslist_'.$page.'_'.$name);
        // dump('newslist'.$page.'_'.$name);
        // dd($news);

    if(!$news){
        echo "DB";
        $where = [];
        if($name){
            $where[] = ['nname','like',"%$name%"];
         }


        $news = News::leftjoin('type','news.tid','=','type.tid')->where($where)->paginate(2);
        $news = serialize($news);
        Redis::setex('newslist_'.$page.'_'.$name,5*60,$news);

    }
        $news = unserialize($news);
        $query = request()->all();

        if(request()->ajax()){
            // dd('123');
            return view('news.ajaxpage',['news'=>$news,'query'=>$query]);
        }
         return view('news.index',['news'=>$news,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Type = Type::all();
        // 分类
        //添加
        return view('news.create',['Type'=>$Type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            
            
        $vaildatedData = $request->validate(
            [
            'nname' => 'required|unique:news|max:20',
            'zuozhe' => 'required',

            ],[
            'nname.required'=>'新闻名称必填！',
            'nname.unique'=>'新闻名称已存在！',
            'nname.max'=>'新闻名称最大长度不超过20位！',
            'zuozhe.required'=>'新闻作者必填！',


            ]
        );




        //
        $post = $request->except('_token'); 
        $res = News::create($post);
        // dd($res);
        
        if($res){
            return redirect('/news/index');
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
