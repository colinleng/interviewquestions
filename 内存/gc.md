## 内存相关内容

#### 1、PHP垃圾回收机制

> 5.*版本 

* 声明变量的时候，在变量内存空间当中会有两个值refcount和is_ref
* refcount是记录当前变量被使用次数初始为1；is_ref记录当前变量是否为传递引用
* 当refcount为0时，变量被释放
* 关闭gc回收以及递归引用会有可能造成内存泄漏
* 根缓冲区满了，触发垃圾回收机制。通过算法循环遍历所有根域，将refcount模拟减一，如果refcount为0则释放。

> 7.*版本 
* 声明变量的时候，在变量对应的内存空间当中会记录两个值分别是:refcount、is_ref，代表的意思是变量存在计数，和是否是地址引用。
    
        刚声明变量的时候refcount,is_ref均为0.当变量使用&引用传递给另外一个变量的时候则is_ref两者为1，refcount为2。
        不引用传递则refcount不变
* 当refcount为0的时候则在内存当中被回收
* 有的变量树均统一保存。保证变量树当中是唯一存在。

```php
    $a = 'test';
    xdebug_debug_zval('a');
    $a = '123';
    xdebug_debug_zval('a');
    
    $b = $a;
    xdebug_debug_zval('a');
    xdebug_debug_zval('b');
    $b = &$a ;
    $c = &$b;
    xdebug_debug_zval('a');
    xdebug_debug_zval('b');
    xdebug_debug_zval('c');
    unset($c);
    xdebug_debug_zval('a');
    xdebug_debug_zval('b');
    xdebug_debug_zval('c');
    unset($b);
    xdebug_debug_zval('a');
    xdebug_debug_zval('b');
    xdebug_debug_zval('c');
    unset($a);
    xdebug_debug_zval('a');
    xdebug_debug_zval('b');
    xdebug_debug_zval('c');
    //$b = &$a;
    //xdebug_debug_zval('a');
    //xdebug_debug_zval('b');
    //
    //unset($b);
    //xdebug_debug_zval('a');
    //xdebug_debug_zval('b');
    
    //$a = array('a'=>'1','b' => '2');
    //xdebug_debug_zval('a');
    //$a['c'] = $a['a'];
    //xdebug_debug_zval('a');
    //
    //unset($a['a']);
    //xdebug_debug_zval('a');
```