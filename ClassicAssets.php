<?php
namespace whitemiku\ckeditor5;

use yii\web\AssetBundle;

class ClassicAssets extends AssetBundle
{
    public $sourcePath = '@vendor/white-miku/yii2-ckeditor5/assets';

    public $js = [
        'js/ckeditor.js',
    ];

    public $publishOptions = [
        'only' => [
            'js/*',
            'js/translations/*'
        ],
    ];
}