<?php

use Ahmdrv\MekariSign\Services\Annotation;

beforeEach(function () {
    $this->annotation = Annotation::make()
        ->setPage(1)
        ->setCanvasSize(100, 10)
        ->setPosition(10, 10)
        ->setElementSize(500, 500);
});

it('can convert to array', function () {
    expect($this->annotation->toArray())
        ->toBeArray()
        ->toHaveKeys([
            'type_of',
            'page',
            'position_x',
            'position_y',
            'element_width',
            'element_height',
            'canvas_width',
            'canvas_height'
        ]);
});

it('default type_of must be signature', function () {
    expect($this->annotation->toArray()['type_of'])->toEqual('signature');
});

it('type_of must be materai', function () {
    $annotation = clone $this->annotation;
    $annotation->setTypeOf('materai');

    expect($annotation->toArray()['type_of'])->toEqual('materai');
});

it('type_of must be initial', function () {
    $annotation = clone $this->annotation;
    $annotation->setTypeOf('initial');

    expect($annotation->toArray()['type_of'])->toEqual('initial');
});

it('ensures default values are set correctly', function () {
    expect($this->annotation->toArray())->toMatchArray([
        'type_of' => 'signature',
        'page' => 1,
        'position_x' => 10,
        'position_y' => 10,
        'element_width' => 500,
        'element_height' => 500,
        'canvas_width' => 100,
        'canvas_height' => 10,
    ]);
});

it('allows setting and getting page value', function () {
    $this->annotation->setPage(3);

    expect($this->annotation->toArray()['page'])->toEqual(3);
});

it('throws exception when setting invalid type_of', function () {
    $this->annotation->setTypeOf('invalid-type');
})->throws(InvalidArgumentException::class, 'type_of must be one of: signature, materai, initial');

it('ensures cloned annotation does not affect the original instance', function () {
    $cloned = clone $this->annotation;
    $cloned->setPage(2);

    expect($this->annotation->toArray()['page'])->toEqual(1);
    expect($cloned->toArray()['page'])->toEqual(2);
});

it('ensures toArray reflects updates correctly', function () {
    $this->annotation->setElementSize(300, 300)->setCanvasSize(800, 600);

    expect($this->annotation->toArray())->toMatchArray([
        'element_width' => 300,
        'element_height' => 300,
        'canvas_width' => 800,
        'canvas_height' => 600,
    ]);
});
