<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Jika user belum login
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        
        // Cek role jika ada argumen yang diberikan
        if ($arguments) {
            $userRole = session()->get('role');
            if (!in_array($userRole, $arguments)) {
                // Jika role tidak diizinkan, redirect ke halaman sebelumnya atau halaman default
                // Untuk simpelnya, kita redirect ke halaman login
                session()->setFlashdata('error', 'Anda tidak memiliki akses ke halaman tersebut.');
                return redirect()->back(); 
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu melakukan apa-apa setelah request
    }
}