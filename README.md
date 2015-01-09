yii2-widgets
============

### BinaryPicker
```php
    use eanekrasov\widgets\BinaryPicker;
    echo $form->field($model, 'status')->widget(BinaryPicker::className(), [
        'items' => [
            ['label' => 'Promoted'],
            ['label' => 'Hidden'],
        ],
    ]);

   	// All default options
    echo $form->field($model, 'status')->widget(BinaryPicker::className(), [
        'items' => [ /* ... */ ],
        'tag' => 'div',
        'inputOptions => ['class' => 'form-control'],
        'itemTag => 'div',
        'itemOptions => ['class' => 'checkbox-inline'],
        'expertMode => true,
        'expertEnabled => true,
        'expertOptions => ['label' => 'Expert Mode'],
        'containerTag => 'div',
        'containerOptions => [],
    ]);
```
