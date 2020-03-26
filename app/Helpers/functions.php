<?php
/**
*公共函数文件
**/
// 文件上传
    function upload($img){
        // 接收文件
        $file = request()->$img;
        // 判断上传过虫中有没错误
        if($file->isValid()){
            // 接收文件
            $store_result = $file->store('uploads');
            return $store_result;
        }
        exit('没有获取上传文件或者过程出错');
    }

    // 多文件上传
    function Moreupload($img){
        // 接收文件
        $file = request()->$img;
        // dd($file);
        foreach ($file as $k => $v) {
                 // 判断上传过程中有没有错误
                if($v->isValid()){
                    $store_result[$k] = $v->store('uploads');
                }else{
                    $store_result[$k] = '没有获取上传文件或者过程出错';
                }
              }
              // dd($store_result);
              return $store_result;
    }



     function CreateTree($list,$pid = 0,$level = 1)
     {
         static $Info = [];
        foreach ($list as $key => $value)
        {
            if($value['pid'] == $pid){
                $value['level'] = $level;
                $Info[] = $value;
                CreateTree($list,$value['cate_id'],$value['level']+1);
            }
        }
        return $Info;
     }


?>