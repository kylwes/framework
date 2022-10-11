<?php

namespace Illuminate\View;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Support\Htmlable;

class ComponentSlot implements Htmlable
{
    /**
     * The slot attribute bag.
     *
     * @var \Illuminate\View\ComponentAttributeBag
     */
    public $attributes;

    /**
     * The slot contents.
     *
     * @var string
     */
    protected $contents;

    /**
     * Create a new slot instance.
     *
     * @param  string  $contents
     * @param  array  $attributes
     * @return void
     */
    public function __construct($contents = '', $attributes = [])
    {
        $this->contents = $contents;

        $this->withAttributes($attributes);
    }

    /**
     * Render the defined scoped slot.
     *
     * @param  array  $attributes
     * @return View
     */
    public function scoped(array $attributes)
    {
        if (!$this->contents) {
            return;
        }

        // Make sure the __components hint is defined.
        // Container::getInstance()->make('view')->addNamespace(
        //     '__components',
        //     Container::getInstance()['config']->get('view.compiled')
        // );

        // $a = Container::getInstance()->make('view');
        // dd($a);

        // return view($this->contents, $attributes);
    }

    /**
     * Set the extra attributes that the slot should make available.
     *
     * @param  array  $attributes
     * @return $this
     */
    public function withAttributes(array $attributes)
    {
        $this->attributes = new ComponentAttributeBag($attributes);

        return $this;
    }

    /**
     * Get the slot's HTML string.
     *
     * @return string
     */
    public function toHtml()
    {
        return $this->contents;
    }

    /**
     * Determine if the slot is empty.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->contents === '';
    }

    /**
     * Determine if the slot is not empty.
     *
     * @return bool
     */
    public function isNotEmpty()
    {
        return ! $this->isEmpty();
    }

    /**
     * Get the slot's HTML string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toHtml();
    }
}
