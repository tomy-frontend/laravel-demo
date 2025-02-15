<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestSampleController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function queryStrings(Request $request)
    {
        $keyword = $request->get(key: 'keyword', default: '初期値');
        return 'キーワードは「' . $keyword . '」です。';
    }

    public function profile($id)
    {
        return "ID: " . $id;
    }

    public function productsArchive(Request $request, $category, $year)
    {
        return 'category:' . $category . '<br>year: ' . $year . '<br>page: ' . $request->get(key: 'page', default: '1');
    }

    public function routeLink()
    {
        $url = route('profile', ['id' => 1, 'photos' => 'yes']);
        return 'プロフィールページのURLは' . $url;
    }

    // ログインフォーム
    public function loginForm()
    {
        return view('login');
    }

    // ログイン処理
    public function login(Request $request)
    {
        if ($request->get('email') === 'user@example.com' && $request->get('password') === '12345678') {
            return 'ログイン成功';
        }
        return 'ログイン失敗';
    }
}
