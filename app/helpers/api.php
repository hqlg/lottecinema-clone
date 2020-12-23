<?php

function successfulRes($data = [],$status = 200,$headers = [])
{
    return response()->json($data,$status,$headers);
}

function successfulResStore($data = [],$status = 201,$headers = [])
{
    successfulRes($data,$status,$headers);
}


function failedRes($msg = "Error",$status = 404,$headers = [])
{
    return response()->json($msg,$status,$headers);
}
