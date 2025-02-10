<?php

namespace Ahmdrv\MekariSign\Services;

/**
 * Class Signer
 *
 * This class represents a signer with properties such as name, email, auto-sign flag, and annotations.
 */
class Signer
{
    /**
     * @var string The name of the signer.
     */
    protected string $name = '';

    /**
     * @var string The email of the signer.
     */
    protected string $email = '';

    /**
     * @var bool Indicates if the signer should auto-sign.
     */
    protected bool $isAutoSign = true;

    /**
     * @var array An array of annotations associated with the signer.
     */
    protected array $annotations = [];

    /**
     * Signer constructor.
     *
     * @param  string  $name  The name of the signer.
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Create a new instance of the Signer class.
     *
     * @param  string  $name  The name to be assigned to the new Signer instance.
     * @return self A new instance of the Signer class.
     */
    public static function make(string $name): self
    {
        return new static($name);
    }

    /**
     * Set the name of the signer.
     *
     * @param  string  $name  The name of the signer.
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the email of the signer.
     *
     * @param  string  $email  The email of the signer.
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set the auto-sign flag for the signer.
     *
     * @param  bool  $autoSign  Indicates if the signer should auto-sign.
     */
    public function setAutoSign(bool $autoSign = true): self
    {
        $this->isAutoSign = $autoSign;

        return $this;
    }

    /**
     * Add an annotation to the signer.
     *
     * @param  Annotation  $annotation  The annotation to add.
     */
    public function setAnnotation(Annotation $annotation): self
    {
        $this->annotations[] = $annotation->toArray();

        return $this;
    }

    /**
     * Convert the signer to an array.
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'is_autosign' => $this->isAutoSign,
            'annotations' => $this->annotations,
        ];
    }
}
