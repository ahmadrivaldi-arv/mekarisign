<?php

namespace Ahmdrv\MekariSign\Services;

use InvalidArgumentException;

/**
 * Class Annotation
 *
 * This class represents an annotation with various properties such as page number,
 * position coordinates, element dimensions, canvas dimensions, and type.
 */
class Annotation
{
    /**
     * @var int The page number where the annotation is placed.
     */
    protected int $page = 1;

    /**
     * @var int The X coordinate position of the annotation.
     */
    protected int $positionX = 0;

    /**
     * @var int The Y coordinate position of the annotation.
     */
    protected int $positionY = 0;

    /**
     * @var int The width of the annotation element.
     */
    protected int $elementWidth = 0;

    /**
     * @var int The height of the annotation element.
     */
    protected int $elementHeight = 0;

    /**
     * @var int The width of the canvas where the annotation is placed.
     */
    protected int $canvasWidth = 0;

    /**
     * @var int The height of the canvas where the annotation is placed.
     */
    protected int $canvasHeight = 0;

    /**
     * @var string The type of the annotation (e.g., 'signature').
     */
    protected string $typeOf = 'signature';

    /**
     * Annotation constructor.
     */
    public function __construct() {}

    /**
     * Creates a new instance of the Annotation class.
     */
    public static function make(): static
    {
        return new static;
    }

    /**
     * Sets the page number for the annotation.
     */
    public function setPage(int $page): static
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Sets the X and Y coordinate positions for the annotation.
     *
     * @param  int  $x  The X coordinate position.
     * @param  int  $y  The Y coordinate position.
     * @return static Returns the current instance for method chaining.
     */
    public function setPosition(int $x, int $y): static
    {
        $this->positionX = $x;
        $this->positionY = $y;

        return $this;
    }

    /**
     * Set the size of the element.
     *
     * @param  int  $width  The width of the element.
     * @param  int  $height  The height of the element.
     * @return static Returns the instance of the class for method chaining.
     */
    public function setElementSize(int $width, int $height): static
    {
        $this->elementWidth = $width;
        $this->elementHeight = $height;

        return $this;
    }

    /**
     * Set the size of the canvas.
     *
     * @param  int  $width  The width of the canvas.
     * @param  int  $height  The height of the canvas.
     * @return static Returns the instance of the class for method chaining.
     */
    public function setCanvasSize(int $width, int $height): static
    {
        $this->canvasWidth = $width;
        $this->canvasHeight = $height;

        return $this;
    }

    /**
     * Sets the type of the annotation.
     */
    public function setTypeOf(string $typeOf): static
    {
        $allowedTypes = ['signature', 'materai', 'initial'];

        if (! in_array($typeOf, $allowedTypes)) {
            throw new InvalidArgumentException(
                sprintf('type_of must be one of: %s', implode(', ', $allowedTypes))
            );
        }

        $this->typeOf = $typeOf;

        return $this;
    }

    /**
     * Converts the annotation properties to an associative array.
     */
    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'position_x' => $this->positionX,
            'position_y' => $this->positionY,
            'element_width' => $this->elementWidth,
            'element_height' => $this->elementHeight,
            'canvas_width' => $this->canvasWidth,
            'canvas_height' => $this->canvasHeight,
            'type_of' => $this->typeOf,
        ];
    }
}
