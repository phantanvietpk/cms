<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require_once MOXMAN_ROOT . '/../../../../../bootstrap/autoload.php';
$app = require_once MOXMAN_ROOT . '/../../../../../bootstrap/app.php';

$app->make(Kernel::class)
    ->handle(Request::capture());

$id = $app['encrypter']->decrypt($_COOKIE[$app['config']['session.cookie']]);
$app['session']->driver()->setId($id);
$app['session']->driver()->start();

class MOXMAN_LaravelAuthenticator_Plugin implements MOXMAN_Auth_IAuthenticator {

	public function authenticate(MOXMAN_Auth_User $user) {

	    if (auth()->check() && $user = auth()->user()) {
            $config = MOXMAN::getConfig();

            $userPath = Storage::path('user-'.$user->getAttribute('id'));

            if (! is_dir($userPath)) {
                @mkdir($userPath);
            }

            $config->extend([
                'filesystem.rootpath' => $userPath,
                'log.path' => storage_path('logs'),
                'cache.connection' => 'sqlite:' . storage_path('private/moxiemanager/cache.s3db'),
                'storage.path' => storage_path('private/moxiemanager')
            ]);

            return true;
        }

		return false;
	}
}

MOXMAN::getAuthManager()->add("LaravelAuthenticator", new MOXMAN_LaravelAuthenticator_Plugin());
