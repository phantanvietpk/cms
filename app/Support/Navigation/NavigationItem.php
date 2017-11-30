<?php

namespace App\Support\Navigation;

use Illuminate\Support\Facades\Route;

class NavigationItem implements NavigationItemInterface
{
    protected $name;

    protected $title;

    protected $url;

    protected $permission;

    protected $icon;

    protected $children;

    /**
     * NavigationItem constructor.
     *
     * @param $name
     * @param $title
     * @param $url
     * @param $permission
     * @param $icon
     * @param $children
     */
    public function __construct(
        $name,
        $title,
        $url = '#',
        $permission = '*',
        $icon = '',
        $children = []
    )
    {
        $this->name = $name;
        $this->title = $title;
        $this->url = $url;
        $this->permission = $permission;
        $this->icon = $icon;
        $this->children = $children;
    }


    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function url()
    {
        if (! $this->url) {
            return '#';
        }

        return Route::has($this->url) ? route($this->url) : url($this->url);
    }

    /**
     * @return string
     */
    public function icon()
    {
        return $this->icon;
    }

    /**
     * @return string
     */
    public function permission()
    {
        return $this->permission;
    }

    /**
     * @return array
     */
    public function children()
    {
        return $this->children;
    }
}