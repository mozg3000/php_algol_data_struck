<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 19.08.2019
 * Time: 13:43
 */

 function polindrom(string $str, &$res):void {

     if(strlen($str)===1 or strlen($str)===0) {

         $res = 'yes';
         return ;
     }
     if($str{0} === $str{-1}){

         polindrom(substr($str, 1, -1), $res);
     }else{

         $res = 'no';
         return;
     }
    return ;
};

$res = null;
polindrom('asccaa', $res);
echo $res;
$res = null;
polindrom('aaccaa', $res);
echo $res;