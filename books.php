<?php

class User{
    private $id;
    private $user;
    private $hotel;
    private $date;


    function __construct($id,$user,$hotel,$date){
            $this->id = $id;
            $this->user = $user;
            $this->hotel = $hotel;
            $this->date = $date;
    }


    function getId(){
        return $this->id;
    }
    function getUser(){
        return $this->user;
    }
    function getHotel(){
        return $this->hotel;
    }
    function getDate(){
        return $this->date;
    }
}

?>