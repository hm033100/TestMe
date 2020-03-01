<?php
namespace App\Services\Utility;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

Class LoggerTwo implements ILogger{
    private static $logger = null;
    
   

    public static function getLogger()
    {
        if (self::$logger == null){
            self::$logger = new Logger('MyApp');
            $stream = new StreamHandler('storage/logs/myapp.log', Logger::DEBUG);
            $stream->setFormatter(new LineFormatter("%datatime% : %level_name% : %message% %context%\n", "g:iA n/j/Y"));
            
            self::$logger->pushHandler($stream);
        }
        return self::$logger;
    }

    public static function warning($message, $data)
    {
        self::getLogger()->warning($message, $data);
    }

    public static function error($message, $data)
    {
        self::getLogger()->error($message, $data);
    }

    public static function info($message, $data)
    {
        self::getLogger()->info($message, $data);
    }

     public static function debug($message, $data)
    {
        self::getLogger()->debug($message, $data);
    }
}