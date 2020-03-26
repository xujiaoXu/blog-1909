<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreBrandPost;

use Validator;

use DB;

use App\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 存储session

        // session(['name'=>'zhangsan']);
        // request()->session()->put('number',100);
        // // 获取session
        // echo session('name');
        // echo request()->session()->get('number');
        // // 删除
        // session(['name'=>null]);
        // request()->session->forget('number');
        // // 删除所有
        // resquest()->session()->flush();




        //列表
        // $brand = DB::table('brand')->get();
        // getArray();
        $name = request()->name;
        $where = [];
        if($name){
            $where[] = ['brand_name','like',"%$name%"];
        }

        $url = request()->url;
        if($url){
            $where[] = ['brand_url','like',"%$url%"];
        }


        $brand = Brand::where($where)->orderby('brand_id','desc')->paginate(2);
        $query = request()->all();
        
        // ajax分页
        if(request()->ajax()){
            // dd('123');
            return view('brand.ajaxpage',['brand'=>$brand,'query'=>$query]);
        }



        return view('brand.index',['brand'=>$brand,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 添加界面
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)

    public function heihei(){
        return view('brand.heihei');
    }

    public function store(StoreBrandPost $request)
    {

        // 第一种表单验证
        // $vaildatedData = $request->validate(
        //     [
        //     'brand_name' => 'required|unique:brand|max:20',
        //     'brand_url' => 'required',
        //     ],
        //     [
        //         'brand_name.required'=>'品牌名称必填！',
        //         'brand_name.unique'=>'品牌名称已存在！',
        //         'brand_name.max'=>'品牌名称最大长度不超过20位！',
        //         'brand_name.required'=>'品牌名称必填！',
        //         'brand_url.required'=>'网址名称必填！',
        //     ]
        // );

        //执行添加
        $post = $request->except('_token'); 
        // 第三种验证
        $validator = Validator::make($post,[
                 'brand_name' => 'required|unique:brand|max:20',
                 'brand_url' => 'required',
        ],[
                 'brand_name.required'=>'品牌名称必填！',
                 'brand_name.unique'=>'品牌名称已存在！',
                 'brand_name.max'=>'品牌名称最大长度不超过20位！',
                 'brand_name.required'=>'品牌名称必填！',
                 'brand_url.required'=>'网址名称必填！',
            ]);
        if($validator->fails()){
            return redirect('brand/create')
                            ->withErrors($validator)
                            ->withInput();
        }


        // dd($post);
        // $res = DB::table('brand')->insert($post);
        // 单文件上传
        if($request->hasFile('brand_logo')){
            $post['brand_logo'] = upload('brand_logo');
        }
        // 多文件上传
         if($request->hasFile('brand_imgs')){
            $brand_imgs =Moreupload('brand_imgs');
            $post['brand_imgs'] =implode('|', $brand_imgs);
        }

        $res = Brand::create($post);
        // dd($res);
        
        if($res){
            return redirect('/brand/index');
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
        // $brand = DB::table('brand')->where('brand_id',$id)->first();
        $brand = Brand::find($id);
        return view('brand.edit',['brand'=>$brand]);

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

        if($request->hasFile('brand_logo')){
            $post['brand_logo'] = $this->upload('brand_logo');
        }

        // $res = DB::table('brand')->where('brand_id',$id)->update($post);
        $res = Brand::where('brand_id',$id)->update($post);
         if($res !== false){
            return redirect('/brand/index');
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
        // $res = DB::table('brand')->where('brand_id',$id)->delete();
        $res = Brand::destroy($id);
        if($res){
            return redirect('/brand/index');
        }
    }
}
