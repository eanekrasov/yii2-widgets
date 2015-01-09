<?php

namespace eanekrasov\widgets;

/**
 * Asset bundle for BinaryPicker Widget
 *
 * @author coder <coder@1dea.ru>
 */
class BinaryPickerAsset extends AssetBundle {
    public function init() {
        $this->sourcePath = __DIR__ . '/assets';
        $this->setupAssets('css', ['css/binarypicker']);
        $this->setupAssets('js', ['js/binarypicker']);
        parent::init();
    }
}
