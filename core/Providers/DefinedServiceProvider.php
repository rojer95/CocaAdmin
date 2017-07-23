<?php
/**
 * Coca-Admin is a general modular web framework developed based on Laravel 5.4 .
 * Author:     Rojer
 * Mail:       rojerchen@qq.com
 * Git:        https://github.com/rojer95/CocaAdmin
 * QQ Group:   647229346
 */

namespace App\Providers;

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

class DefinedServiceProvider extends ServiceProvider
{

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        Route::group(['middleware' => 'web'],function (){
            //验证码模块
            Route::get('/captcha',function (Request $request){
                //生成验证码图片的Builder对象，配置相应属性
                $builder = new CaptchaBuilder((new PhraseBuilder())->build(4, 'ABDEFHJKMPT123456789'));
                //可以设置图片宽高及字体
                $builder->build($request->input('w',100), $request->input('h',40));
                //获取验证码的内容
                $phrase = $builder->getPhrase();
                //把内容存入session
                session()->flash('_captcha',$phrase);
                //生成图片
                return (new Response($builder->output(), 200))
                    ->header('Content-Type', 'image/jpeg')
                    ->header('Cache-Control', 'no-cache, must-revalidate');
            })->name('captcha');
        });

        //上传模块
        Route::post('/upload',function(Request $request){
            $name = $request->input('name','file');
            $file = $request->file($name,null);
            if(is_null($file))
                return response()->json(error_json('没有获取到上传的文件！'));
            $path = $file->store('uploads','public');
            return response()->json(success_json('storage/'.$path));
        })->name('webUpload');

        Route::get('/notFound',function (){
            return view('notFound');
        })->name('notFound');

        Route::get('/notPermission',function (){
            return view('notPermission');
        })->name('notPermission');

    }
}