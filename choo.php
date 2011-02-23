<?php

/**
 * `choo.php` allows the use of method chaining on existing objects, without
 * modifying the original object in any way.
 * 
 * @see README
 */
class choo {

    public $__object;

    function  __construct(&$obj) {

        $this->__object =& $obj;

    }

    function  __call($name, $arguments) {

        $result = call_user_func_array(array($this->__object, $name), $arguments);
        
        if(!empty($result))
            return $result;
        else
            return $this;

    }

    /**
     * Spits out (or unwraps, depending on how you want to look at it)
     * the underlying object.
     *
     * @return mixed The underlying object
     */
    public function spit() {
        return $this->__object;
    }

}

/**
 * Choo choo!
 * @param mixed $obj Any object you want choo'd up.
 * @return choo 
 */
function choo($obj) {
    return new choo($obj);
}