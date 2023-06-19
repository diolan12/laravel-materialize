<?php
namespace App\Http\BaseControllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $viewBase = '';

    public static function app()
    {
        return [
            'name' => env('APP_NAME', 'Laravel Materialize'),
            'version' => '1.0.0'
        ];
    }

    private $title = null;
    private $subtitle = null;

    private $data = [];

    protected function overrideTitle(string $title)
    {
        $this->title = $title;
    }

    protected function setSubtitle(string $subtitle)
    {
        $this->subtitle = $subtitle;
    }

    protected function removeSubtitle()
    {
        $this->subtitle = null;
    }

    protected function setData($key, $data)
    {
        $this->data[$key] = $data;
    }
    protected function unsetData($key)
    {
        unset($this->data[$key]);
    }

    private function wrap()
    {
        $app = (object) self::app();

        $head = (object) [
            'title' => $this->title ?? env('APP_NAME', 'Laravel'),
            'subtitle' => $this->subtitle
        ];
        return [
            'app' => $app,
            'head' => $head,
            'data' => (object) $this->data
        ];
    }

    protected function render(string $view)
    {
        return view($this->viewBase . '.' . $view, $this->wrap());
    }
}