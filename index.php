<?
/*ini_set('display_errors', 1);
require_once 'application/bootstrap.php';*/
if (!ini_get('mbstring.internal_encoding')) {
    @ini_set("mbstring.internal_encoding", 'UTF-8');
    mb_internal_encoding('UTF-8');
}
date_default_timezone_set('Europe/Kiev');
ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log", "phperror.log");
@session_start();
require_once dirname(__FILE__).'/application/bootstrap.php';
Core::start();