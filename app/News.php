<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;
    //
    protected $fillable = [
        'title', 'text'
    ];

    /**
     *
     */
    public function translateTitle()
    {
        if ($this->title_eng != '') {
            $this->title_eng = $this->translate($this->title_eng);
        }
    }

    /**
     * Транслитерируем и выставляем в нижний регистр строчку для урла статьи, которую мы будет использовать как значение урла
     *
     * @param $string
     * @return string
     */
    private function translate($string)
    {
        $string = str_replace(' ', '-', $string);
        $string = strtr($string,
            "абвгдежзийклмнопрстуфыэАБВГДЕЖЗИЙКЛМНОПРСТУФЫЭ",
            "abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE"
        );

        $string = strtr($string, array(
            'ё' => "yo", 'х' => "h", 'ц' => "ts", 'ч' => "ch", 'ш' => "sh",
            'щ' => "shch", 'ъ' => '', 'ь' => '', 'ю' => "yu", 'я' => "ya",
            'Ё' => "Yo", 'Х' => "H", 'Ц' => "Ts", 'Ч' => "Ch", 'Ш' => "Sh",
            'Щ' => "Shch", 'Ъ' => '', 'Ь' => '', 'Ю' => "Yu", 'Я' => "Ya",
        ));

        return strtolower($string);
    }

    /**
     * @return mixed|string
     */
    public function formatCreateDate()
    {
        if ($this->created_time != '0000-00-00 00:00:00' or $this->created_time != '1970-01-01 00:00:00')
            return \Carbon\Carbon::parse($this->created_time)->format('d.m.Y H:i:s');
        else return $this->created_time;
    }

    /**
     * @return mixed|string
     */
    public function formatUpdatedDate()
    {
        if ($this->updated_time != '0000-00-00 00:00:00' or $this->updated_time != '1970-01-01 00:00:00')
            return \Carbon\Carbon::parse($this->updated_time)->format('d.m.Y H:i:s');
        else return $this->updated_time;
    }

    /**
     * Проверяем, что title_eng
     *
     * @return bool
     */
    public function checkTitleEngOnUnique()
    {
        $count = self::where('deleted', 0)->where('posted', 1)->where('title_eng', $this->title_eng)->count();
        return ($count > 0) ? true : false;
    }
}
