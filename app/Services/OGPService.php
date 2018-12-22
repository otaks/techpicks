<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Embed\Embed;

class OGPService
{
    protected $fields = ['tags', 'title', 'type', 'url', 'image', 'images', 'description', 'providerName'];

    protected  $url;

    public function __construct($url, array $fields = null)
    {
        $this->url = $url;
        if (isset($fields)) $this->fields[] = $fields;
    }


    /**
     * meta要素を取得
     *
     * @return mixed
     */
    public function get()
    {
        if (empty($this->url)) throw new \UnexpectedValueException("記事のURLを指定してください");
        $meta = Embed::create($this->url);

        return $this->format($meta);
    }

    /**
     * 整形
     *
     * @param $meta
     * @return array
     */
    protected function format($meta)
    {
        $result = array();
        foreach ($this->fields as $field) {
            $key = $field;
            $value = $meta->{$field};
            switch ($key) {
                case 'tags' :
                    $key = 'keywords';
                    break;
                case 'type' :
                    if ($value == 'link') $value = 'article';
                    break;
                case 'providerName':
                    $key = 'site_name';
                    break;
                default :
                    break;
            }
            $result[$key] = $value;
        }

        return $result;
    }
}
