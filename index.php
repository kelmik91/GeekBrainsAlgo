<?php

$link = $_GET['a'] ? $_GET['a'] : '/';
$dir = new DirectoryIterator("$link");
foreach ($dir as $item) {
    if ($link == '/') {
        $link = null;
    }
    if ($item == '.') {
        continue;
    }
    if ($item == '..') {
        $linkBack = dirname($link);
        if ($linkBack == '\\') {
            $linkBack = '/';
        }
        echo "<a href='?a=$linkBack'>Назад</a>" . "<hr>";
    } else {
        echo "<a href='?a=$link/$item'>$item</a>" . "<hr>";
    }
}



