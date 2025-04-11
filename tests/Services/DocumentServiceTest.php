<?php

use Ahmdrv\MekariSign\Services\Document;

beforeEach(function () {

    $this->document = Document::of('aead64e0-8fc6-4e21-ae03-535cb74e4ec0s');
});


it('document detail fetched', function () {
    expect($this->document->getDocumentId())->toBeString();
});

it('can get the signers', function () {
    expect($this->document->getSigner())->toBeArray();
});
