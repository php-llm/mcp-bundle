<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php74\Rector\Closure\ClosureToArrowFunctionRector;
use Rector\PHPUnit\CodeQuality\Rector\Class_\PreferPHPUnitSelfCallRector;
use Rector\PHPUnit\CodeQuality\Rector\Class_\PreferPHPUnitThisCallRector;
use Rector\PHPUnit\Set\PHPUnitSetList;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/src',
    ])
    ->withPhpSets(php82: true)
    ->withSets([
        PHPUnitSetList::PHPUNIT_110,
        PHPUnitSetList::ANNOTATIONS_TO_ATTRIBUTES,
        PHPUnitSetList::PHPUNIT_CODE_QUALITY,
    ])
    ->withRules([
        PreferPHPUnitSelfCallRector::class,
    ])
    ->withImportNames(importShortClasses: false)
    ->withSkip([
        ClosureToArrowFunctionRector::class,
        PreferPHPUnitThisCallRector::class,
    ])
    ->withTypeCoverageLevel(0);
