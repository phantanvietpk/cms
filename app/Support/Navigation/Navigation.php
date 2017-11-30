<?php

namespace App\Support\Navigation;

class Navigation
{
    /**
     * @var array
     */
    protected $item = [];

    /**
     * @var string
     */
    protected $currentItem = '';

    /**
     * @param \App\Support\Navigation\NavigationItemInterface $item
     */
    public function register(NavigationItemInterface $item)
    {
        $this->item[] = $item;
    }

    /**
     * @param $name
     */
    public function setCurrentItem($name)
    {
        $this->currentItem = $name;
    }

    /**
     * @return string
     */
    public function getCurrentItem()
    {
        return $this->currentItem;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->item;
    }
}