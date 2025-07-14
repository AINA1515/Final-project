<?php
require("connection.php");

function make_request($sql)
{
    return mysqli_query(dbconnect(), $sql);
}

function request_to_array($sql)
{
    $request = make_request($sql);
    $result = array();
    while ($r = mysqli_fetch_assoc($request)) {
        $result[] = $r;
    }
    mysqli_free_result($request);
    return $result;
}

function fetch_result($sql)
{
    $request = make_request($sql);
    $result = mysqli_fetch_assoc($request);
    mysqli_free_result($request);
    return $result;
}

function count_result($sql)
{
    $request = make_request($sql);
    $result = mysqli_num_rows($request);
    mysqli_free_result($request);
    return $result;
}

function isBefore($date, $other_date)
{
    $sql = "SELECT '%s' < '%s' AS valid_date";
    $sql = sprintf($sql, $date, $other_date);
    $request = make_request($sql);
    return fetch_result($request)['valid_date'] == 0 ? false : true;
}
function getDateDiff($date)
{
    $query = "SELECT TIMESTAMPDIFF(YEAR, '%s', NOW()) AS diffYear";
    $query = sprintf($query, $date);

    $result = make_request($query);
    $data = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $data['diffYear'];
}