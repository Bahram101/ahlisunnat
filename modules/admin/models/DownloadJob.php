<?php
/**
 * Created by PhpStorm.
 * User: Bahram
 * Date: 07.07.2020
 * Time: 9:41
 */

namespace app\modules\admin\models;


use yii\base\BaseObject;
use yii\queue\JobInterface;

class DownloadJob extends BaseObject implements JobInterface{
    public $url;
    public $file;

    public function execute($queue){
        file_put_contents($this->file, file_get_contents($this->url));
    }
}