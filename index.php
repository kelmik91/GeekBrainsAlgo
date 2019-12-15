<?php

$connect = mysqli_connect('localhost', 'root', '', 'gbphp') or die('Not connection');

$query = "
SELECT c.id_category, c.category_name, cl.parent_id, cl.child_id, cl.level
FROM `category` AS `c`
INNER JOIN `category_links` AS `cl` ON `c`.`id_category` = `cl`.`child_id`
WHERE `cl`.`parent_id` = 1
";

$result = mysqli_query($connect, $query);
$cats = [];
while ($cat = mysqli_fetch_assoc($result)) {
    $cats[] = $cat;
}
var_dump($cats);

function clojureTable ($cats) {
    if(is_array($cats) && isset($cats)) {
        $tableMenu = "<ul>";

        foreach ($cats as $cat) {
            $tableMenu .= "<li>" . $cat['category_name'] . "</li>";
        }

        $tableMenu .="</ul>";
    }
    return $tableMenu;
}

echo clojureTable($cats);