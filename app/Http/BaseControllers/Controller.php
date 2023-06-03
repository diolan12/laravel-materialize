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

    private $title = null;
    private $subtitle = null;

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

    protected function render(string $view)
    {
        $head = (object) [
            'title' => $this->title??env('APP_NAME', 'Laravel'),
            'subtitle' => $this->subtitle
        ];
        $data = [
            'head' => $head
        ];
        return view($this->viewBase . '.' . $view, $data);
    }
}