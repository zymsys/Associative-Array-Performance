<?php
require_once '../data/passwords.php';

date_default_timezone_set('America/New_York');
$values = array();

function addValue($key, $value)
{
    global $values;

    $values[$key] = $value;
}

function utime_now()
{
    $time = gettimeofday();
    return $time['sec'] + ($time['usec'] / 1000000.0);
}

function testInsertSpeed()
{
    global $values;

    $time = utime_now();
    for ($i = 0; $i < 100; $i++)
    {
        $values = array();
        addValues();
    }
    $completed = utime_now();
    printf("Inserts: %1.4lf\n", $completed - $time);
}

function testKeyExistsSpeed()
{
    global $values;

    $time = utime_now();

    for ($i = 0; $i < 1000; $i++)
    {
        assert(TRUE);
        assert(TRUE);
        assert(TRUE);
        assert(TRUE);
        assert(TRUE);
    }
    $blankCompleted = utime_now();
    for ($i = 0; $i < 1000; $i++)
    {
        assert(array_key_exists("KeHiekTyn",$values));
        assert(array_key_exists("WugsOmEad4",$values));
        assert(array_key_exists("hyeslyg8",$values));
        assert(array_key_exists("awvindAis",$values));
        assert(array_key_exists("wyRoovTugg",$values));
    }
    $completed = utime_now();
    $blankTime = $blankCompleted - $time;
    $keyExistsTime = $completed - $blankCompleted;
    printf("Keys Exist: %1.4lf\n", $keyExistsTime - $blankTime);
}

function testIsSetSpeed()
{
    global $values;

    $time = utime_now();

    for ($i = 0; $i < 1000; $i++)
    {
        assert(TRUE);
        assert(TRUE);
        assert(TRUE);
        assert(TRUE);
        assert(TRUE);
    }
    $blankCompleted = utime_now();
    for ($i = 0; $i < 1000; $i++)
    {
        assert(isset($values["KeHiekTyn"]));
        assert(isset($values["WugsOmEad4"]));
        assert(isset($values["hyeslyg8"]));
        assert(isset($values["awvindAis"]));
        assert(isset($values["wyRoovTugg"]));
    }
    $completed = utime_now();
    $blankTime = $blankCompleted - $time;
    $keyExistsTime = $completed - $blankCompleted;
    printf("IsSet: %1.4lf\n", $keyExistsTime - $blankTime);
}

testInsertSpeed();
testIsSetSpeed();
testKeyExistsSpeed();
