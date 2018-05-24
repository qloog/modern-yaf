<?php
/**
 * @name RegisterPlugin
 * @desc Yaf定义了如下的6个Hook,插件之间的执行顺序是先进先Call
 * @see http://www.php.net/manual/en/class.yaf-plugin-abstract.php
 * @author qloog
 */
class RegisterPlugin extends Yaf\Plugin_Abstract {

    public function routerStartup(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
        // 注册request对象
        Yaf\Registry::set('request',$request);

        // 注册laravel request对象
        app()->singleton('request',function(){
            return \Illuminate\Http\Request::createFromGlobals();
        });
    }
}
