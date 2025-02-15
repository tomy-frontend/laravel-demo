<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    // アップロード画面
    public function create()
    {
        return view('photos.create');
    }

    // アップロード処理
    public function store(Request $request)
    {
        $savedFilePath = $request->file(key: 'image')->store(path: 'photos', options: 'public');
        Log::debug($savedFilePath);
        $fileName = pathinfo($savedFilePath, PATHINFO_BASENAME);
        Log::debug($fileName);

        return to_route('photos.show', ['photo' => $fileName])->with('success', 'アップロード完了！');
    }

    // アップロード画像の表示
    public function show($fileName)
    {
        return view('photos.show', ["fileName" => $fileName]);
    }

    // アップロード画像の削除処理
    public function destroy($fileName)
    {
        Storage::disk('public')->delete('photos/' . $fileName);
        return to_route('photos.create')->with('success', '削除しました。');
    }

    // アップロードファイルのダウンロード
    public function download($fileName)
    {
        return Storage::disk('public')->download('photos/' . $fileName, name: 'アップロード画像.png');
    }
}
