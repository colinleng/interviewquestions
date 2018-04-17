<?php
class signle
{
    private static $obj = null;
    private function __construct()
    {

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function make()
    {
        if(empty(self::$obj))
        {
            self::$obj = new signle();
        }

        return self::$obj;
    }

    public function getName() {
        echo 'hello world!';
    }

}

$t =signle::make();
$t->getName();
?>