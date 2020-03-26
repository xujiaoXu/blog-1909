<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = request()->name;
        // dd($name);
        $where = [];
       if($name){
            $where[] = ['bname','like',"%$name%"];
        }

        //展示
         $book = Book::where($where)->orderby('bid','desc')->paginate(2);
        $query = request()->all();
        return view('book.index',['book'=>$book,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加
         return view('book.create');   


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
            'bname' => 'required',
            'zuozhe' => 'required',
            ],
            [
                'bname.required'=>'书名必填！',
                'zuozhe.required'=>'作者必填！',
            ]
        );




        //执行添加
        $post = $request->except('_token'); 
        // dd($post);
        if($request->hasFile('pic')){
            $post['pic'] = upload('pic');
        }
         $res = Book::create($post);
        // dd($res);
        
        if($res){
            return redirect('/book/index');
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
