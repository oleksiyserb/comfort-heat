<?php

function debug($string)
{
    echo "<pre><big><h3 style='color:darkblue;'>";
    var_dump($string);
    echo "</h3></big></pre>";
}

function printer($string)
{
    echo '<pre>';
    print_r($string);
    echo '</pre>';
}


function dumper($obj)
{
    echo
    "<pre><big><h3 style='color:darkblue;'>",
    htmlspecialchars(dumperGet($obj)),
    "</h3></big></pre>";
}

function dumperGet(&$obj, $leftSp = "")
{
    if (is_array($obj)) {
        $type = "Array[" . count($obj) . "]";
    } elseif (is_object($obj)) {
        $type = "Object";
    } elseif (gettype($obj) == "boolean") {
        return $obj ? "true" : "false";
    } else {
        return "\"$obj\"";
    }
    $buf = $type;
    $leftSp .= "    ";
    for (Reset($obj); list($k, $v) = each($obj);) {
        if ($k === "GLOBALS") continue;
        $buf .= "\n$leftSp$k => " . dumperGet($v, $leftSp);
    }
    return $buf;
}