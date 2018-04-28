<?php
/**
 * @name Bootstrap
 * @author qloog
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf\Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */

use Yaf\Loader;
use Yaf\Application;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher as EventDispatcher;
use Illuminate\Container\Container;

class Bootstrap extends Yaf\Bootstrap_Abstract
{

    protected $config;

    public function _initConfig()
    {
		//把配置保存起来
		$this->config = Application::app()->getConfig()->toArray();
		Yaf\Registry::set('config', $this->config);
	}

	public function _initPlugin(Yaf\Dispatcher $dispatcher) {
		//注册一个插件
		$objSamplePlugin = new SamplePlugin();
		$dispatcher->registerPlugin($objSamplePlugin);
	}

	public function _initRoute(Yaf\Dispatcher $dispatcher) {
		//在这里注册自己的路由协议,默认使用简单路由
	}
	
	public function _initView(Yaf\Dispatcher $dispatcher) {
		//在这里注册自己的view控制器，例如smarty,firekylin
	}

	public function _initLoader()
	{
		$loader = Loader::getInstance();

		$autoload = APP_ROOT . '/vendor/autoload.php';
		if (file_exists($autoload)) {
			$loader->import($autoload);
		}
	}

    public function _initDbAdapter()
    {
        $capsule = new Capsule();

        $db = $this->config['database'];
        $capsule->addConnection($db);
        $capsule->setEventDispatcher(new EventDispatcher(new Container()));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        class_alias(\Illuminate\Database\Capsule\Manager::class, 'DB');
	}
}
