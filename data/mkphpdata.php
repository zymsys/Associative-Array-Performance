<?php
function myEscape($str)
{
    return str_replace(
        array('\\', '"',  '$'),
        array('',   '\"', '\\$'),
        $str);
}

$passwords = explode("\n", file_get_contents("php://stdin"));

//Strangely the above adds a blank to the start and end.
array_pop($passwords);

$pairs = array();
while ($passwords)
{
    $key = array_pop($passwords);
    $value = array_pop($passwords);
    $pairs[] = "    \"" .
        myEscape($key) .
        "\" => \"" .
        myEscape($value) .
        "\",\n";
}

echo "<?php\n\$passwords = array( //Array contains " . count($pairs) . " items.\n";
echo implode('', $pairs);
echo ");\n";