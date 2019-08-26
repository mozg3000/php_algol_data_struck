<?php
/**
 * Created by IntelliJ IDEA.
 * User: iluka
 * Date: 19.08.2019
 * Time: 15:04
 */
$connect =mysqli_connect("localhost", "root", "", "alg");

$query = "SELECT c.id_category, c.category_name, cl.parent_id, cl.child_id, cl.level FROM `category` AS `c` INNER JOIN `category_links` AS `cl` ON `c`.`id_category` = `cl`.`child_id`";

$result = mysqli_query($connect, $query);
$catalog=[];

while($r = mysqli_fetch_assoc($result)){

//    echo $r;
    $catalog[$r['parent_id']][$r['child_id']] = $r;
}

function buildTree($items, $parent_id){

    if(isset($items) && is_array($items) && array_key_exists($parent_id, $items)){

        $tree = "<ul>";
        foreach ($items[$parent_id] as $item){

            if($item['child_id'] != $parent_id){

                $tree .= "<li>".$item['category_name'];
                $tree .= buildTree($items, $item['child_id']);
            }
            $tree .= "</li>";
        }
        $tree .= "</ul>";
    }
    return $tree;
}
echo buildTree($catalog, 1);
//var_dump($catalog);

