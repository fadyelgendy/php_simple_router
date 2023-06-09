<?php

declare(strict_types=1);

namespace App\Controllers;

use Exception;

define("VIEW_PATH", dirname(__FILE__, 3) . "/views/");

class Controller
{

    /**
     * include view
     *
     * @param string $viewPath
     * @param array $data
     * @return void
     */
    public function view(string $viewPath, array $data = []): void
    {
        ob_get_contents();

        extract($data);

        if (file_exists($file = VIEW_PATH . "{$viewPath}.view.php")) {
            require $file;
        } else {
            Controller::except(new Exception("No View File Found for: {$viewPath}"));
        }

        ob_end_flush();
    }

    /**
     * Handle abort issues
     *
     * @param string $path
     * @param int $code
     * @return void
     */
    public static function abort(string $path, int $code = 404): void
    {
        http_response_code($code);

        (new Controller)->view('errors/404', ['route' => $path]);

        die();
    }

    /**
     * Handle Exceptions
     *
     * @param Exception $exception
     * @return void
     */
    public static function except(Exception $exception): void
    {
        http_response_code(500);

        extract(['exception' => $exception]);

        require VIEW_PATH . "errors/500.view.php";
    }
}
