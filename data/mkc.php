<?php
require_once "data.php";

function myEscape($str)
{
    return str_replace('"', '\"', $str);
}

echo "void addValues()\n{\n";
foreach($passwords as $key=>$value)
{
    echo "    addValue(\"" . myEscape($key) . "\", \"" . myEscape($value) . "\");\n";
}
echo "}\n";