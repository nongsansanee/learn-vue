<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadsController extends Controller
{
    public function store()
    {
        return "aaaaa";
        return $request->all();
        if (!request()->file('file')->isValid()) return response('invalid', 403);
    
    request()->file('file')->store('uploads');

    sleep(1);

    // ไม่ควรคาดหวังว่า api จะตอบชื่อไฟล์กลับไปให้ ให้ออกแบบเสหมือนว่าเราไปใช้ api ของคนอื่น
    // $originName = request()->file('file')->getClientOriginalName();

    // if ($originName == "si_place_sources.xlsx") return response($originName, 500);
    
    // return $originName;

    $originName = request()->file('file')->getClientOriginalName();

    if ($originName == "si_place_sources.xlsx") return response("ERROR", 500);
    
    return "OK";
    }
}
