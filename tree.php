<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 26.08.2019
 * Time: 17:53
 */
$formula = '7*y';
//$formula = '(x+42)^2+7*y-z';
$tokens =[];

for($i=0; $i<strlen($formula); $i++) {
    array_push($tokens, $formula{$i});
}
$tree = new ExpressionTree();
$tree->build($tokens);

print_r($tree);
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
class ExpressionTree{

    /*
     * @property Node $head
     */
    public $head= null;
    const  priority = [

        '(' => 90,
        '^' => 80,
        '*' => 70,
        '/' => 70,
        '+' => 50,
        '-' => 50,
    ];
    public function build(array $tokens){

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

            if($value instanceof Node){

                if(is_null($this->head->left)){

                    $this->head->left = $value;
                }else{

                    $this->head->right = $value;
                }
            }else{

                $this->addNode($value);
            }
        }
    }
    private function addNode($value){

        $priority_new = array_key_exists($value, self::priority)?self::priority[$value]:100;
        $priority = array_key_exists($this->head->value,self::priority)? self::priority[$this->head->value]:100;

        if($priority_new < $priority){

            $node = new Node($value);

            $node->left = $this->head;
            $this->head = $node;

        }else{

            if(is_null($this->head->left)){

                $this->head->left = $value;

            }else{

                $this->head->right = $value;
            }
        }
    }
    private function headIsNull():bool{

        return is_null($this->head);
    }
}