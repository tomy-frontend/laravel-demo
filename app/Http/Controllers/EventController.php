<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // 登録処理
    public function store(Request $request)
    {
        $title = $request->get(key: 'title');
        Log::debug('イベント名:' . $title);
        // 決済や登録形になると特に危険なためリダイレクト
        return to_route('events.create')->with('success', $title . 'を登録しました。');
    }
}
