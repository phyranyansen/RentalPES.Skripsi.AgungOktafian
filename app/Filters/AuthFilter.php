<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();
        $isLoggedIn = $session->get('login') === 'logged_in';
        $currentPath = $request->uri->getPath();

        if($isLoggedIn==true)
        {

            // Jika sudah login dan mencoba mengakses halaman login,
            // maka arahkan ke halaman dashboard.
            if ($isLoggedIn && $currentPath === 'login') {
                return redirect()->to('dashboard');
            }
    
            // Jika belum login dan mencoba mengakses halaman selain login,
            // maka arahkan ke halaman login.
            if (!$isLoggedIn && $currentPath !== 'login') {
                return redirect()->to('/'); // Ganti dengan rute halaman login yang sesuai
            }
    
            // Jika user telah logout dan mencoba mengakses halaman lain,
            // maka arahkan ke halaman login.
            return $request;
        }
        
        if ($isLoggedIn!=true && $currentPath != '/') {
            
            return redirect()->to('/'); // Ganti dengan rute halaman login yang sesuai
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada aksi setelah permintaan selesai.
    }
}