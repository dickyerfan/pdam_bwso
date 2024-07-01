<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_arsip');
        $this->load->library('form_validation');
        if (!$this->session->userdata('nama_pengguna')) {
            redirect('auth');
        }
    }

    public function index()
    {
        // URL API
        $apiUrl = 'http://103.160.148.174/manager/Api_arsip';

        // Mengambil data dari API menggunakan file_get_contents
        $output = file_get_contents($apiUrl);
        $response = json_decode($output, true);

        // Mengkonversi output JSON ke array PHP
        $data['sk'] = $response['sk'];
        $data['per'] = $response['per'];
        $data['bk'] = $response['bk'];
        $data['dk'] = $response['dk'];
        $data['arsip'] = $response['arsip'];
        $data['daftarEska'] = $response['daftarEska'];
        $data['daftarPer'] = $response['daftarPer'];
        $data['daftarBer'] = $response['daftarBer'];
        $data['daftarDok'] = $response['daftarDok'];

        // Pastikan data sudah diambil dengan benar
        if ($data === null) {
            $data = [];
        }

        $data['title'] = 'Data Arsip PDAM';

        if ($this->session->userdata('level') == 'Admin') {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('arsip/view_arsip', $data);
            $this->load->view('templates/footer');
        } else {

            $this->load->view('templates/pengguna/header', $data);
            $this->load->view('templates/pengguna/navbar');
            $this->load->view('templates/pengguna/sidebar');
            $this->load->view('arsip/view_arsip', $data);
            $this->load->view('templates/pengguna/footer');
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|min_length[2]|max_length[4]|numeric');
        $this->form_validation->set_rules('nama_dokumen', 'Nama Dokumen', 'required|trim|is_unique[arsip.nama_dokumen]');
        $this->form_validation->set_rules('tentang', 'Tentang', 'required|trim');
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar');
        $this->form_validation->set_message('min_length', '%s Minimal 2 digit');
        $this->form_validation->set_message('max_length', '%s Maksimal 4 digit');
        $this->form_validation->set_message('numeric', '%s harus di isi angka');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Upload Data';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('arsip/view_upload', $data);
            $this->load->view('templates/footer');
        } else {
            if (isset($_FILES['nama_file'])) {
                $filePath = $_FILES['nama_file']['tmp_name'];
                $fileName = $_FILES['nama_file']['name'];

                // Siapkan data untuk dikirim ke API
                $data = [
                    'jenis' => $this->input->post('jenis'),
                    'tahun' => $this->input->post('tahun'),
                    'nama_dokumen' => $this->input->post('nama_dokumen'),
                    'tentang' => $this->input->post('tentang'),
                    'tgl_dokumen' => $this->input->post('tgl_dokumen'),
                    'keterangan' => $this->input->post('keterangan'),
                    'tgl_upload' => date('Y-m-d'),
                    'nama_file' => new CURLFile($filePath, $_FILES['nama_file']['type'], $fileName)
                ];

                // URL endpoint API Anda
                $url = 'http://103.160.148.174/manager/Api_arsip/upload';

                // Inisialisasi cURL
                $ch = curl_init();

                // Set opsi cURL
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // Eksekusi cURL dan dapatkan respons
                $response = curl_exec($ch);

                // Cek apakah ada error
                if ($response === false) {
                    $error = curl_error($ch);
                    curl_close($ch);

                    $this->session->set_flashdata(
                        'info',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error,</strong> Error saat mengirim request: ' . $error . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>'
                    );
                    redirect('arsip');
                    return;
                }

                // Tutup cURL
                curl_close($ch);
                // Decode response
                $response_data = json_decode($response, true);

                if (isset($response_data['status']) && $response_data['status'] == true) {
                    // Jika sukses
                    $this->session->set_flashdata(
                        'info',
                        '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Sukses,</strong> File berhasil diunggah dan data tersimpan.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>'
                    );
                } else {
                    // Jika gagal
                    $this->session->set_flashdata(
                        'info',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error,</strong> ' . (isset($response_data['message']) ? $response_data['message'] : 'Terjadi kesalahan saat mengunggah file.') . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>'
                    );
                }

                redirect('arsip');
            } else {
                $this->session->set_flashdata(
                    'info',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error,</strong> Tidak ada file yang diunggah.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>'
                );
                redirect('arsip');
            }
        }
    }

    public function edit($id_arsip)
    {
        // URL API yang digunakan untuk mendapatkan data arsip berdasarkan ID
        $apiUrl = 'http://103.160.148.174/manager/Api_arsip/edit/' . $id_arsip;

        // Gunakan file_get_contents untuk mendapatkan data dari API
        $response = @file_get_contents($apiUrl);

        // Tangani kesalahan jika permintaan gagal
        if ($response === false) {
            $error = error_get_last();
            $error_message = isset($error['message']) ? $error['message'] : 'Unknown error';
            echo 'Failed to retrieve data: ' . htmlspecialchars($error_message);
            exit;
        }

        // Decode respons JSON menjadi array asosiatif
        $arsip = json_decode($response, true);

        // Periksa apakah respons valid
        if ($arsip === null) {
            echo 'Error: Invalid JSON data received from API.';
            exit;
        }

        // Periksa apakah terdapat error dalam data yang diterima
        if (isset($arsip['error'])) {
            echo 'Error: ' . htmlspecialchars($arsip['error']);
            exit;
        }

        // Pastikan data arsip tersedia sebelum mengirimkan ke view
        $data['arsip'] = $arsip;
        $data['title'] = 'Form Edit Data';

        // Muat tampilan dengan data yang diambil dari API

        if ($this->session->userdata('level') == 'Admin') {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('arsip/view_Edit', $data);
            $this->load->view('templates/footer');
        } else {

            $this->load->view('templates/pengguna/header', $data);
            $this->load->view('templates/pengguna/navbar');
            $this->load->view('templates/pengguna/sidebar');
            $this->load->view('arsip/view_Edit', $data);
            $this->load->view('templates/pengguna/footer');
        }
    }

    public function update()
    {
        $id_arsip = $this->input->post('id_arsip');
        $data = [
            'nama_dokumen' => $this->input->post('nama_dokumen'),
            'jenis' => $this->input->post('jenis'),
            'tahun' => $this->input->post('tahun'),
            'tentang' => $this->input->post('tentang'),
            'tgl_dokumen' => $this->input->post('tgl_dokumen'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $apiUrl = 'http://103.160.148.174/manager/Api_arsip/update/' . $id_arsip;

        $options = [
            'http' => [
                'header' => "Content-type: application/json\r\n",
                'method' => 'PUT',
                'content' => json_encode($data)
            ]
        ];

        $context = stream_context_create($options);
        $response = @file_get_contents($apiUrl, false, $context);

        if ($response === false) {
            $error = error_get_last();
            $error_message = isset($error['message']) ? $error['message'] : 'Unknown error';
            echo 'Failed to update data: ' . htmlspecialchars($error_message);
            exit;
        }

        $result = json_decode($response, true);

        if ($result['status']) {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses,</strong> Data berhasil di update
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
            );
        } else {
            $this->session->set_flashdata(
                'info',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf,</strong> ' . htmlspecialchars($result['message']) . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
            );
        }

        redirect('arsip');
    }

    public function hapus($id_arsip)
    {
        $cekFileLama = $this->db->get_where('arsip', ['id_arsip' => $id_arsip])->row();

        if (isset($cekFileLama->nama_file)) {
            unlink('uploads/' . $cekFileLama->nama_file);
        }

        $this->db->where('id_arsip', $id_arsip);
        $this->db->delete('arsip');

        $this->session->set_flashdata(
            'info',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sukses,</strong> File/Dokumen berhasil di hapus
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
          </div>'
        );
        redirect('arsip');
    }

    public function baca($id_arsip)
    {
        $url = 'http://103.160.148.174/manager/Api_arsip/baca/' . $id_arsip;

        $response = @file_get_contents($url);

        if ($response === FALSE) {
            show_error('Gagal mengakses API untuk membaca file.', 500);
        } else {
            header("Content-Type: application/pdf");

            echo $response;
        }
    }

    public function download($id_arsip)
    {
        $url = 'http://103.160.148.174/manager/Api_arsip/download/' . $id_arsip;

        $headers = get_headers($url, 1);

        // Memeriksa apakah header berisi Content-Disposition untuk mendapatkan nama file
        $filename = 'downloaded_file';
        if (isset($headers['Content-Disposition'])) {
            if (preg_match('/filename="([^"]+)"/', $headers['Content-Disposition'], $matches)) {
                $filename = $matches[1];
            }
        }

        // Mengambil data dari URL
        $response = @file_get_contents($url);

        // Memeriksa apakah respons berhasil diambil
        if ($response === FALSE) {
            show_error('Gagal mengakses API untuk mengunduh file', 500);
            return;
        }

        // Mengatur header untuk unduhan
        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Transfer-Encoding: binary");
        header("Expires: 0");
        header("Cache-Control: must-revalidate");
        header("Pragma: public");
        header("Content-Length: " . strlen($response));
        echo $response;
    }

    public function detail($id_arsip)
    {
        $data['title'] = 'Data Detail Arsip';
        $apiUrl = 'http://103.160.148.174/manager/Api_arsip/edit/' . $id_arsip;
        $response = @file_get_contents($apiUrl);

        if ($response === false) {
            $error = error_get_last();
            $error_message = isset($error['message']) ? $error['message'] : 'Unknown error';
            echo 'Failed to retrieve data: ' . htmlspecialchars($error_message);
            exit;
        }

        $detail_arsip = json_decode($response, true);

        if ($detail_arsip === null) {
            echo 'Error: Invalid JSON data received from API.';
            exit;
        }

        if (isset($detail_arsip['error'])) {
            echo 'Error: ' . htmlspecialchars($detail_arsip['error']);
            exit;
        }

        $data['detail_arsip'] = $detail_arsip;

        if ($this->session->userdata('level') == 'Admin') {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('arsip/view_detail', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/pengguna/header', $data);
            $this->load->view('templates/pengguna/navbar');
            $this->load->view('templates/pengguna/sidebar');
            $this->load->view('arsip/view_detail', $data);
            $this->load->view('templates/pengguna/footer');
        }
    }
}
