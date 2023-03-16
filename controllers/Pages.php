<?php
namespace PagesController;

use Controller\Controller;

require_once './lib/Controller.php';

/**
 * 
 * @author Josh Kaye
 * https://joshkaye.dev
 * 
 */



class PagesController extends Controller {



    public function home() {
        $data = (object) [
            'title' => 'Spendly App',
        ];
        $this->view('index', $data);
    }



    public function about() {
        $data = (object) [
            'title' => 'About Spendly',
        ];
        $this->view('about', $data);
    }



    public function error(
        string $type = '404 Not Found', 
        string $message = 'There was an error.'
    ) {
        $data = (object) [
            'type' => $type,
            'message' => $message,
        ];
        $this->view('error', $data);
    }
}