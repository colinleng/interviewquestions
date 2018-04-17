<?php
/**
 * 使用一个辅助栈，O(1)复杂度求出栈中的最小数
 * @hack 类中通过数组来模拟堆栈
 *
 * @author laiwenhui
 */
class strack{

    /**
     * 数据栈，存储栈数据；
     *
     * @var array
     */
    private $_arrData = array();
    /**
     * 辅助栈，存储数据组栈中每层的最下值信息；
     *
     * @var array
     */
    private $_arrMin = array();
    /**
     * 栈顶所在单元
     *
     * @var int
     */
    private $_top=-1;
    /**
     * 出栈
     * @return bool|int
     */
    public function pop(){
        if ($this->_top === -1){
            return false;
        }
        array_pop($this->_arrMin);
        $this->_top--;
        return array_pop($this->_arrData);
    }
    /**
     * 入栈
     * @param int $element
     * @return bool
     */
    public function push($element){
        $element = intval($element);
        //如果栈为空，直接入栈
        if ($this->_top === -1){
            array_push($this->_arrData, $element);
            array_push($this->_arrMin, $element);
            $this->_top++;
            return true;
        }
        //不为空，判断入栈的值是否比最小栈栈顶小
        $min = $this->_arrMin[$this->_top];
        //比较求出最小值
        $currentMin = $element < $min ? $element : $min;
        //当前栈中最小值入栈
        array_push($this->_arrMin, $currentMin);
        //数据入栈
        array_push($this->_arrData, $element);
        $this->_top++;

        return true;
    }
    /**
     * 求当前栈空间的最小值
     * @return bool|int
     */
    public function min(){
        if ($this->_top === -1){
            return false;
        }
        return $this->_arrMin[$this->_top];
    }
}

$obj = new strack();
$obj->push(12);
$obj->push(56);
$obj->push(23);
$obj->push(89);
$obj->push(4);
var_dump($obj->getMax());
$obj->pop();
var_dump($obj->getMax());
$obj->push(8);
var_dump($obj->getMax());
?>