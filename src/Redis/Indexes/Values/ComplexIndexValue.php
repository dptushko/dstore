<?php
/**
 * ComplexIndexValue
 *
 * @author Denis Ptushko <d.ptushko@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\DStore\Redis\Indexes\Values;

class ComplexIndexValue
{

    /**
     * Values
     *
     * @var int[]
     */
    protected $values;

    /**
     * Glue for value list
     *
     * @var string
     */
    protected $glue = ':';

    /**
     * Set glue for value list
     *
     * @param string $glue Glue
     *
     * @return void
     */
    public function setGlue(string $glue): void
    {
        $this->glue = $glue;
    }

    /**
     * Add value
     *
     * @param int $value Value
     *
     * @return void
     */
    public function addParam(int $value): void
    {
        $this->values[] = $value;
    }

    /**
     * Get value
     *
     * @return int
     */
    public function getValue(): string
    {
        if (empty($this->values) === true) {
            throw new \RuntimeException("Value of ComplexIndexValue can't be a empty");
        }

        return implode($this->glue, $this->values);
    }

}