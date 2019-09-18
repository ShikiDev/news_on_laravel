<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Тупо решение, но т.к. тестовое делается на локальной машине,
     * то настраивать htaccess у меня нет необходимости.
     * А вообще такие вещи разруливаются через redirect в htaccess
     *
     */
    public function gotonews()
    {
        return redirect()->action('NewsController@index');
    }

    //
    public function index()
    {
        $news_list = News::where('deleted',0)->where('posted',0)->paginate(15);
        return view('news.index', [
            'news' => $news_list
        ]);
    }

    public function add()
    {
        return view('news.add', [

        ]);
    }

    public function store()
    {
        return [];
    }

    public function edit()
    {
        return view('news.update', [

        ]);
    }

    public function update()
    {
        return [];
    }

    public function delete()
    {
    }

    public function pageList()
    {
        return view('news.pages_list', [

        ]);
    }

    public function show()
    {
        return view('news.page', [

        ]);
    }
}
