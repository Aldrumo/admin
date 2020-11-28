<?php

namespace Aldrumo\Admin\Manager;

class MenuItem
{
    /** @var string */
    public $text;

    /** @var string|null */
    public $route;

    /** @var string|null */
    public $url;

    /** @var int */
    public $order;

    public static function make(string $text, ?string $route = null, int $order = null): MenuItem
    {
        return new static($text, $route, null, $order);
    }

    public function __construct(string $text, string $route = null, string $url = null, int $order = null)
    {
        $this->text = $text;
        $this->route = $route;
        $this->url = $url;
        $this->order = $order ?? 0;
    }

    public function text(string $text): MenuItem
    {
        $this->text = $text;
        return $this;
    }

    public function route(?string $route): MenuItem
    {
        $this->route = $route;
        return $this;
    }

    public function url(?string $url): MenuItem
    {
        $this->url = $url;
        return $this;
    }

    public function order(int $order): MenuItem
    {
        $this->order = $order;
        return $this;
    }
}
