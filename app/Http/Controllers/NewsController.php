<?php

namespace App\Http\Controllers;

use App\News;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class NewsController extends Controller
{
    /**
     * Тупо решение, но т.к. тестовое делается на локальной машине,
     * то настраивать htaccess у меня нет необходимости.
     * А вообще такие вещи разруливаются через redirect в htaccess
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function gotonews()
    {
        return redirect()->action('NewsController@index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $news_list = News::where('deleted', 0)->where('posted', 1)->orderBy('created_time', 'desc')->paginate(5);
        return view('news.index', [
            'news' => $news_list
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('news.add');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $news = new News();
        $news->created_time = new \DateTime('now');
        $news->posted = $request->post('status', 0);
        $news->title = $request->input('title', '');
        $news->author_id = Auth::user()->id;
        $news->title_eng = $news->title;
        $news->translateTitle();
        $news->short_text = $request->input('short_text', '');
        $news->text = $request->input('text', '');

        if ($news->checkTitleEngOnUnique()) {
            return redirect()->route('add')->withInput($request->except('title'))->withErrors(['message' => 'Такое название уже используется. Придумайте другое']);
        }

        if ($news->save()) return redirect()->route('pagelist');
        else return redirect('add')->withInput();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('news.update', [
            'news' => $news
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $news->updated_time = new \DateTime('now');
        $news->posted = $request->post('status', 0);
        $news->title = $request->input('title', '');
        $news->author_id = Auth::user()->id;
        $news->title_eng = $news->title;
        $news->translateTitle();
        $news->short_text = $request->input('short_text', '');
        $news->text = $request->input('text', '');

        if ($news->checkTitleEngOnUnique()) {
            return redirect()->route('edit', ['id' => $id])->withInput($request->except('title'))->withErrors(['message' => 'Такое название уже используется. Придумайте другое']);
        }

        if ($news->save()) return redirect()->route('pagelist');
        else return redirect('edit')->withInput();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $news = News::find($id);
        $news->posted = 0;
        $news->deleted = 1;
        if ($news->save()) return redirect()->route('pagelist');
        else return redirect()->route('pagelist');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pageList()
    {
        $news_list = News::where('deleted', 0)->where('posted', 1)->paginate(5);
        return view('news.pages_list', [
            'news' => $news_list
        ]);
    }

    /**
     * @param $title_eng
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($title_eng)
    {
        $news = News::where('deleted', 0)->where('posted', 1)->where('title_eng', $title_eng)->first();
        return view('news.page', [
            'news' => $news
        ]);
    }
}
