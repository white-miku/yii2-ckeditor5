YII2 CKEditor 5
==================
More details about CKEditor 5 on site https://ckeditor.com/ckeditor-5/

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Add the following code to the `repositories` section of your `composer.json` file:

```
{
    "url": "https://github.com/white-miku/yii2-ckeditor5.git",
    "type": "git"
}
```
and the fillowing line to the `require` section of your `composer.json` file:

```
"white-miku/yii2-ckeditor5": "*"
```
Then run `composer update`.


Usage
-----

The package has an built-in CKE5 v.19.0.0 package with following modules included: `heading, bold, italic, underline, strikethrough, fontColor, fontBackgroundColor, alignment, bulletedList, numberedList, link, blockQuote, insertTable, horizontalLine, removeFormat`.

If you need, you can download [prebuilt](https://ckeditor.com/ckeditor-5/download/) package or [build your own](https://ckeditor.com/ckeditor-5/online-builder/) package and replace files `ckeditor.js` and `ckeditor.map` in the `@vendor/white-miku/ckeditor5/assests/js` folder.

Once the extension is installed, simply use it in your code by:

```php
use \whitemiku\ckeditor5\EditorClassic;
...
$form->field($model, 'fieldName')->widget(EditorClassic::className(), []);
```

You can edit toolbar or uploadUrl:
```php
$form->field($model, 'fieldName')->widget(EditorClassic::className(), 
    [
        'toolbar' => ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
        'uploadUrl' => '/someUpload.php',
    ]
);
```

The package supports only `CKEditor 5 Classic` implementation. May be other implementations will be added later.

More info in [guides](https://docs.ckeditor.com/ckeditor5/latest/builds/guides/overview.html)
