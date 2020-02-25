<?php


namespace Kirill\ExtendedModule\Preference;

use Kirill\ExtendedModule\Block\TextBlock;

class TextBlockPreference extends TextBlock
{
    public function getHelloWorld()
    {
        return 'Preference: Hello new world';
    }
}

