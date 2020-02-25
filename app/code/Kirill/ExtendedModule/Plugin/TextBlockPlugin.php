<?php

namespace Kirill\ExtendedModule\Plugin;

use Kirill\ExtendedModule\Block\TextBlock;

class TextBlockPlugin {

    public function afterGetProductName(TextBlock $obj, $result)
    {
        return '<strong>New</strong> '.$result;
    }
    public function beforeGetBlaBla(TextBlock $obj)
    {
        $obj->unused_text = '<strong>None</strong>';
    }
    public function aroundGetCurrentTime(TextBlock $obj, callable $callback) {

        $obj->current_time = '<h4>Current date: '.$obj->current_time.'</h4>';
        return $callback();
    }
}
