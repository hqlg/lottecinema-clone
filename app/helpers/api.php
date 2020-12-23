<?php

function successfulRes($data, $msg, $status = 200, $headers = [])
{
    return response()->json(['data' => $data, 'message' => $msg], $status, $headers);
}

function successfulResStore($data, $msg, $status = 201, $headers = [])
{
    successfulRes($data, $msg, $status, $headers);
}

function successfulResData($data = [], $status = 200, $headers = [])
{
    return response()->json($data, $status, $headers);
}

function successfulResMsg($msg, $status = 200, $headers = [])
{
    return response()->json($msg, $status, $headers);
}

function failedResMsg($msg, $status = 404, $headers = [])
{
    successfulResMsg($msg, $status, $headers);
}
