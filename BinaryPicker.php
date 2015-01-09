<?php

namespace eanekrasov\widgets;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\Button;
use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * BinaryPicker renders a group of checkbox components.
 *
 * For example,
 *
 * ```php
 * // items configuration
 * echo BinaryPicker::widget([
 *     'items' => [
 *         [1 => 'Item 1'],
 *         [2 => 'Item 2'],
 *     ]
 * ]);
 *
 * @author Coder <coder@1dea.ru>
 * @since 2.0
 */
class BinaryPicker extends Widget
{
    /*
     * @var object model
     */
    public $model = null;

    /*
     * @var string name of attribute
     */
    public $attribute = null;


    public $items = [];

    public $tag = 'div';
    public $inputOptions = ['class' => 'form-control'];
    public $itemTag = 'div';
    public $itemOptions = ['class' => 'checkbox-inline'];

    public $expertMode = true;
    public $expertEnabled = true;
    public $expertOptions = ['label' => 'Expert Mode'];

    public $containerTag = 'div';
    public $containerOptions = [];

    protected function _val() {
        return $this->model->{$this->attribute};
    }

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'binary-picker');
    }

    /**
     * Renders the widget.
     */
    public function run() {
        $items = [];
        if ($this->expertMode) {
            $items[] = Html::checkbox('expert', $this->expertEnabled, $this->expertOptions);
        }
        $items[] = Html::textInput($this->attribute, $this->_val(), $this->inputOptions);
        $items[] = Html::tag($this->containerTag, $this->renderItems($this->items), $this->containerOptions);
        echo Html::tag($this->tag, implode("\n", $items), $this->options);
        BootstrapAsset::register($this->getView());
    }

    /**
     * Generates the elements that compound the group as specified on [[items]].
     * @return string the rendering result.
     */
    protected function renderItems($data) {
        $items = [];
        foreach ($data as $key=>$item) {
            $pow = pow(2, $key);
            if (is_array($item)) {
                $options = ArrayHelper::merge([], $item);
                $item['view'] = $this->getView();
                $checkbox = Html::checkbox($this->attribute . $pow, $this->_val() && $pow, $options);
                $items[] = Html::tag($this->itemTag, $checkbox, $this->itemOptions);
            } else {
                $items[] = $item;
            }
        }
        return implode("\n", $items);
    }
}
