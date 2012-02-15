<?php
require_once "data.php";

function myEscape($str)
{
    return str_replace(array('"', '$'), array('\"', '\$'), $str);
}

echo "<?php\nfunction addValues()\n{\n";
foreach($passwords as $key=>$value)
{
    echo "    addValue(\"" . myEscape($key) . "\", \"" . myEscape($value) . "\");\n";
}
echo "}\n";