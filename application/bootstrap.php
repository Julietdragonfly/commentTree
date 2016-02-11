<?
/*require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор*/
class Core {
    static function start() {
        require_once 'core/model.php';
        require_once 'core/view.php';
        require_once 'core/controller.php';
        require_once 'core/route.php';
        require_once 'help/Href.php';
        require_once 'core/libraries.php';
        require_once 'core/framework.php';


        //$db = new Db;
        //$controller = new Controller;
				$lib = new Libraries;
        Route::start();
    }
}