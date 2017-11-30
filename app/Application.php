<?php

namespace App;

use Illuminate\Foundation\Application as BaseApplication;

class Application extends BaseApplication
{
    /**
     * @inheritDoc
     */
    public function publicPath()
    {
        return $this->basePath;
    }
}