<?php
namespace App\Person\Patient;

class Foo extends Bar
{
    /**
     * @inheritDoc
     */
    public $brain = [];

    /**
     * @INHERITDOC
     */
    public $head = [];

    /**
     * {@inheritDoc}
     *
     * Extra description.
     *
     * @var int[]
     */
    public $body = [];

    /**
     * {@inheritDoc} Extra description.
     *
     * @var int[]
     */
    public $hand = [];

    /**
     * Short description first.
     *
     * {@inheritDoc}
     *
     * @var int[]
     */
    public $finger = [];

    /**
     * {@inheritDoc}
     */
    public $toe = [];

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function dumpThoughts($thoughts)
    {
    }
}
