<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * @var int|array
     */
    protected $item;

    /**
     * Handle action.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function index(Request $request)
    {
        $actionName = $request->get('action');

        $id = $request->get('id');
        if (!is_array($id)) {
            $this->item[] = $id;
        } else {
            $this->item = $id;
        }

        if (method_exists($this, $actionName)) {
            return call_user_func([$this, $actionName], $request);
        }

        flash('Hành động này không tồn tại.', 'danger');

        return back();
    }
}