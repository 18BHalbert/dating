<?php


class PremiumMember extends Member{
    private $_inDoorInterests;
    private $_outDoorInterests;

    function getInDoorInterests(){
        return $this->_inDoorInterests;
    }

    function setInDoorInterests($interests){
        $this->_inDoorInterests = $interests;
    }

    function getOutDoorInterests(){
        return $this->_outDoorInterests;
    }

    function setOutDoorInterests($interests){

    }
}