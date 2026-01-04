<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class BaseController extends Controller
{
    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do NOT edit this line
        parent::initController($request, $response, $logger);

        // Anda bisa tambahkan inisialisasi global di sini jika diperlukan
        // Contoh: helper, session, dll.
        // helper(['form', 'url']);
    }
}