<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in([__DIR__.'/src'])
;

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->fixers([
        '-unalign_double_arrow',
        '-unalign_equals',
        'align_double_arrow',
        'header_comment',
        'newline_after_open_tag',
        'ordered_use',
        'short_array_syntax',
    ])
    ->setUsingCache(false)
    ->finder($finder)
;
