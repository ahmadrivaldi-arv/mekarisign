<?php

use Ahmdrv\MekariSign\Services\Signer;

beforeEach(function () {
    $this->signer = Signer::make('John Doe')
        ->setEmail('johndoe@example.com');
});

it('can be created with a name', function () {
    expect($this->signer)->toBeInstanceOf(Signer::class);
    expect($this->signer->toArray())->toHaveKey('name', 'John Doe');
});

it('can set and get email', function () {
    expect($this->signer->toArray())->toHaveKey('email', 'johndoe@example.com');

    $this->signer->setEmail('newemail@example.com');
    expect($this->signer->toArray())->toHaveKey('email', 'newemail@example.com');
});

it('throws exception when setting invalid email', function () {
    $this->signer->setEmail('invalid-email');
})->throws(InvalidArgumentException::class, 'Invalid email format');

it('ensures cloned signer does not affect the original instance', function () {
    $cloned = clone $this->signer;
    $cloned->setEmail('cloned@example.com');

    expect($this->signer->toArray()['email'])->toEqual('johndoe@example.com');
    expect($cloned->toArray()['email'])->toEqual('cloned@example.com');
});

it('ensures toArray reflects updates correctly', function () {
    $this->signer->setEmail('updated@example.com');

    expect($this->signer->toArray())->toMatchArray([
        'name' => 'John Doe',
        'email' => 'updated@example.com',
    ]);
});
