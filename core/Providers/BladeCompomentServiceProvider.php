<?php
/**
 * Coca-Admin is a general modular web framework developed based on Laravel 5.4 .
 * Author:     Rojer
 * Mail:       rojerchen@qq.com
 * Git:        https://github.com/rojer95/CocaAdmin
 * QQ Group:   647229346
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


        Blade::directive('import',function ($expression){
            $expression = explode(',',$expression);
            $module = '\'.get_current_module().\'';
            if (count($expression) >= 3) $module = $expression[2];
            if ($expression[1] == 'css'){
                return  "<link rel=\"stylesheet\" href=\"<?php echo asset('/module/".$module."/".$expression[0].".css'); ?>\" media=\"all\" />";
            }else{
                return  "<script type=\"text/javascript\" src=\"<?php echo asset('/module/".$module."/".$expression[0].".js'); ?>\"></script>";
            }

        });


        Blade::directive('captcha', function ($expression) {
            $expression = explode(',',$expression);
            $w = $expression[0];
            $h = $expression[1];
            return "<?php echo route('captcha',['w'=>$w,'h'=>$h,'t'=>time()]); ?>";
        });


        Blade::directive('canshow', function ($expression) {
            return "<?php if(hasRoutePermission('$expression')): ?>";
        });

        Blade::directive('endcanshow', function () {
            return "<?php endif; ?>";
        });

    }

}