<?php
    interface Animal{
        public function getName();
    }


    class Dog implements Animal{
        public function getName(){
            echo "Nguyệt Huế";
        }
    }
?>