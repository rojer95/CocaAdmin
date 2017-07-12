<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 2017/7/8
 * Time: 13:09
 */

namespace App\Providers;


use App\Service\ContentService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeCompomentServiceProvider extends ServiceProvider
{
    public function boot(){
        Blade::directive('jsimport',function ($expression){
            return  "<script type=\"text/javascript\" src=\"<?php echo asset('/module/'.get_current_module().'/js/".$expression.".js'); ?>\"></script>";
        });


        Blade::directive('cssimport',function ($expression){
            return  "<link rel=\"stylesheet\" href=\"<?php echo asset('/module/'.get_current_module().'/css/".$expression.".css'); ?>\" media=\"all\" />";
        });
    }

}