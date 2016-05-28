<?php

    $src = __DIR__ . DIRECTORY_SEPARATOR . 'src';
    $out = __DIR__ . DIRECTORY_SEPARATOR . 'docs' . DIRECTORY_SEPARATOR . '%version%';
    $cache = __DIR__ . DIRECTORY_SEPARATOR . '.sami-cache' . DIRECTORY_SEPARATOR . '%version%';

    $iterator = Symfony\Component\Finder\Finder::create()
                                               ->files()
                                               ->name('*.php')
                                               ->exclude('build')
                                               ->exclude('tests')
                                               ->in($src);

    $versions = Sami\Version\GitVersionCollection::create($src)
                                                 ->add('master', 'Latest');

    $options = [
        'theme'     => 'default',
        'versions'  => $versions,
        'title'     => 'Laravel API Documentation',
        'build_dir' => $out,
        'cache_dir' => $cache,
    ];

    $sami = new Sami\Sami($iterator, $options);

    return $sami;