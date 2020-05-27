<?php
/**
 * Created by PhpStorm.
 * User: st.kevich
 * Date: 25.03.18
 * Time: 18:05
 */
namespace whitemiku\ckeditor5;

use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

abstract class CKEditor5 extends InputWidget
{
    /**
     * @var string
     */
    public $editorType = 'Classic';

    /**
     * @var array
     */
    public $clientOptions = [];

    /**
     * @var array Toolbar options array
     */
    public $toolbar = [];

    /**
     * @var string Url to image upload
     */
    public $uploadUrl = '';

    /**
     * @var array
     */
    public $options = [];

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerAssets($this->getView());
        $this->registerEditorJS();
        $this->printEditorTag();
    }

    /**
     * Registration JS
     */
    protected function registerEditorJS()
    {
        if (!empty($this->toolbar)) {
            $this->clientOptions['toolbar'] = $this->toolbar;
        } else {
        	$this->clientOptions['toolbar'] = ['heading',
						'|',
						'bold',
						'italic',
						'underline',
						'strikethrough',
						'|',
						'fontColor',
						'fontBackgroundColor',
						'alignment',
						'|',
						'bulletedList',
						'numberedList',
						'|',
						'link',
						'blockQuote',
						'insertTable',
						'horizontalLine',
						'|',
						'removeFormat'];
        }
        if (!empty($this->uploadUrl)) {
            $this->clientOptions['ckfinder'] = ['uploadUrl' => $this->uploadUrl];
        }
        if (!empty($this->colorsList)) {
        	$this->clientOptions['fontColor']['colors'] = $this->colorsList;
        	$this->clientOptions['fontBackgroundColor']['colors'] = $this->colorsList;
        } else {
        	$colors = [
        [
						'color' => '#000000',
						'label' => 'Чёрный'
					],
					[
						'color' => '#4d4d4d',
						'label' => 'Тёмно-серый'
					],
					[
						'color' => '#999999',
						'label' => 'Серый'
					],
					[
						'color' => '#E6E6E6',
						'label' => 'Светло-серый'
					],
					[
						'color' => '#ffffff',
						'label' => 'Белый',
						'hasBorder' => 'true'
					],
					[
						'color' => '#E64C4C',
						'label' => 'Красный'
					],
					[
						'color' => '#E6994C',
						'label' => 'Оранжевый'
					],
					[
						'color' => '#E6E64C',
						'label' => 'Жёлтый'
					],
					[
						'color' => '#99E64C',
						'label' => 'Салатовый'
					],
					[
						'color' => '#4CE64C',
						'label' => 'Зелёный'
					],
					[
						'color' => '#4CE699',
						'label' => 'Аквамариновый'
					],
					[
						'color' => '#4CE6E6',
						'label' => 'Бирюзовый'
					],
					[
						'color' => '#4C99E6',
						'label' => 'Голубой'
					],
					[
						'color' => '#4C4CE6',
						'label' => 'Синий'
					],
					[
						'color' => '#994CE6',
						'label' => 'Фиолетовый'
					],
					[
						'color' => '#ff426a',
						'label' => 'Penka!'
					],
					];
        	$this->clientOptions['fontColor']['colors'] = $colors;
        	$this->clientOptions['fontBackgroundColor']['colors'] = $colors;
        }
        $clientOptions = Json::encode($this->clientOptions);

        $js = new JsExpression(
            $this->editorType . "Editor.create( document.querySelector( '#{$this->options['id']}' ), {$clientOptions} ).catch( error => {console.error( error );} );"
        );
        $this->view->registerJs($js);
    }

    /**
     * @param \yii\web\View $view
     */
    protected function registerAssets($view){}

    /**
     * View tag for editor
     */
    protected function printEditorTag(){}

}
