<?php

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

    public function spit() {
        return $this->__object;
    }

}

function choo($obj) {
    return new choo($obj);
}