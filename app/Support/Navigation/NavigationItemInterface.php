<?php

namespace App\Support\Navigation;

interface NavigationItemInterface
{
    /**
     * @return string
     */
    public function name();

    /**
     * @return string
     */
    public function title();

    /**
     * @return string
     */
    public function url();

    /**
     * @return string
     */
    public function icon();

    /**
     * @return string
     */
    public function permission();

    /**
     * @return array
     */
    public function children();
}
