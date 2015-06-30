<?php

namespace Optimus\Uploader\Controller;

use Illuminate\Foundation\Application;
use Illuminate\Routing\Controller;

class LaravelController extends Controller {

    private $app;

    private $manager;

    private $request;

    public function __construct(Application $application)
    {
        $this->app = $application;

        $this->manager = $this->app['uploader'];
        $this->request = $this->app['request']->instance();
    }

    public function upload()
    {
        $data = $this->request->all();
        return response()->json($this->manager->upload($data));
    }

    public function delete()
    {
        $qquuid = $this->request->get('qquuid');
        return response()->json($this->manager->delete($qquuid));
    }

    public function session()
    {
        $session = $this->request->get('session', []);
        return response()->json($this->manager->session($session));
    }

}