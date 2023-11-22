<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BuktiModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Config\Services;

class BuktiPembayaran extends BaseController
{


    // public function transaction()
    // {
    //     $data = [
    //         'customer'      => $_POST['customer'],
    //         'paymentType'   => $_POST['paymentType'],
    //         'totalPrice'    => $_POST['totalPrice'],
    //         'fileUpload'    => $this->upload()
    //     ];
    // }

    public static function uploadFile(RequestInterface $request)
    {
        helper(['form', 'url']);
    
        $validator = Services::validation();
    
        if ($request->getMethod() === 'post') {
            // Periksa apakah ada file yang diunggah
            $file = $request->getFile('bukti');
    
            if ($file && $file->isValid()) {
                // Pengecekan tipe konten file
                $allowedMimeTypes = ['image/jpeg', 'image/png']; // Sesuaikan dengan jenis file yang diizinkan
    
                if (!in_array($file->getMimeType(), $allowedMimeTypes)) {
                    return [
                        'error' => true,
                        'message' => 'Tipe konten file tidak diizinkan.',
                    ];
                }
    
                // Pastikan direktori tujuan ada dan dapat ditulis
                $uploadPath = 'assets/uploads';
    
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }
    
                // Simpan file ke direktori
                if ($file->move($uploadPath, $file->getName())) {
                    $model = new BuktiModel();
    
                    // Simpan informasi file ke dalam database
                    $data = [
                        'Bukti' => 'assets/uploads/' . $file->getName(),
                    ];
    
                    $model->insert($data);
                    //Get Data
                    $getBukti = $model->get_bukti_where($data['Bukti']);

                    
                    return [
                        'success'  => true,
                        'message'  => 'File berhasil diunggah.',
                        'data'     => 'assets/uploads/' . $file->getName(),
                        'id_bukti' => $getBukti['Id_Bukti']
                    ];
                } else {
                    return [
                        'error' => true,
                        'message' => 'Gagal memindahkan file ke direktori upload.',
                    ];
                }
            } else {
                return [
                    'error' => true,
                    'message' => 'Tidak ada file yang diunggah atau file tidak valid.',
                ];
            }
        }
    
        return [
            'error' => true,
            'message' => 'Metode HTTP bukan POST.',
        ];
    }
    
    
    

}