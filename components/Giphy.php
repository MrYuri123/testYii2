<?php 

namespace app\components;

use yii\base\Component;

class Giphy extends Component
{
    public $key;

    public function getGif()
    {
        $data = $this->request();

        return $data->data->images->downsized_large->url ?? '';
    }

    private function request()
    {
        $url = "https://api.giphy.com/v1/gifs/random?api_key=$this->key&tag=&rating=G";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
        curl_close($ch);

        return json_decode($output);
    }
}