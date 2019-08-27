<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 26.08.2019
 * Time: 17:53
 */
$formula = '(x+42)^2+7*y-z';
$tokens =[];

for($i=0; $i<strlen($formula); $i++) {
    array_push($tokens, $formula{$i});
}
//print_r($lexemes);
class Node{

    public $value;
    public $left = null;
    public $right = null;

    public function __construct($value = null)
    {
        $this->value = $value;
    }

}
//print_r($o = new Node());
//print_r(is_null($o->value));
class expressionTree{

    public $head= null;
    const  priority = [

        '(' => 90,
        '^' => 80,
        '*' => 70,
        '/' => 70,
        '+' => 50,
        '-' => 50,
    ];
    public function build(array $tokens):Node{

        $pointer = 0;
        while ($pointer < count($tokens)){

            if($tokens[$pointer] === '('){

                $subtokens = [];

                while ($tokens[$pointer] !== ')'){

                    $subtokens[] = $tokens[$pointer];
                    $pointer++;
                }
                $this->add($this->build($subtokens));

            }else{

                $this->add($tokens[$pointer]);
            }
            $pointer++;
        }
    }
    private function add($value){

        if($this->headIsNull()){

            $this->head = new Node($value);
        }else{

            $this->addNode($value);
        }
    }
    private function addNode($value){

        if(self::priority[$value] < $this->head->value)
    }
    private function headIsNull():bool{

        return is_null($this->head);
    }
}