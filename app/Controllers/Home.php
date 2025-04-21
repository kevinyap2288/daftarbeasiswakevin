<?php

namespace App\Controllers;

use CodeIgniter\Email\Email;
use App\Models\Model2;
use App\Models\User_model;
use App\Models\ParkingModel;
use App\Models\MahasiswaModel;
use App\Models\PendaftaranModel;
use App\Models\BeasiswaModel;
use App\Models\LogActivityModel;
use App\Models\PaymentModel;

class Home extends BaseController
{
        protected $logModel;

        public function __construct()
        {
            $this->logModel = new \App\Models\LogActivityModel();
            $this->beasiswaModel = new \App\Models\ParkingModel();
        }

        private function logActivity($action)
        {
            if (session()->has('id')) {
                $this->logModel->insert([
                    'id_user'   => session()->get('id'),
                    'username'  => session()->get('u'),
                    'action'    => $action,
                    'ip_address' => $_SERVER['REMOTE_ADDR'],
                    'timestamp' => date('Y-m-d H:i:s')
                ]);
            }
        }
        // Index / Landing Page
        public function index()
        {
            if (session()->has('id')) {
                return redirect()->to('home/dashboard');
            }

        // Check remember_user cookie
            if (isset($_COOKIE['remember_user'])) {
                $username = $_COOKIE['remember_user'];
                $asc = new Model2();
                $cek = $asc->getWhere('pengguna', ['nama' => $username]);

                if ($cek != null) {
                    session()->set([
                        'id' => $cek->id_user,
                        'u' => $cek->nama,
                        'level' => $cek->level
                    ]);
                    return redirect()->to('home/dashboard');
                }
            }

        // Jika tidak login, tampilkan dashboard tamu
            echo view('header');
            return view('dashboard_guest', ['cek' => $cek]);
            echo view('footer');
        }


        // Register Page
        public function register()
        {
            echo view('header');
            echo view('sign-up');
            echo view('footer');
        }

        // Handle Registration
        public function aksi_register()
    {
    $asc = new Model2();
    $data = [
        'nama' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'password' => MD5($this->request->getPost('password')),
        'level' => 2, // Default user level
        'created_at' => date('Y-m-d H:i:s'), // Waktu saat dibuat
        'created_by' => "system", // Ganti dengan ID admin atau pengguna yang membuat
    ];

    $asc->input('pengguna', $data);
    $cek = $asc->getWhere('pengguna', ['email' => $data['email']]); // Cek berdasarkan email

    if ($cek != null) {
        session()->set([
            'id' => $cek->id_user ?? null, // Pastikan kunci ini ada
            'u' => $cek->nama ?? null, // Ganti dengan nama yang sesuai
            'level' => $cek->level
        ]);
        $this->logActivity("User  terdaftar dengan nama: " . $this->request->getPost('name'));
        return redirect()->to('home/login');
    }
    }

        // Login Page
        public function login()
        {
            if (session()->has('isLoggedIn') && session()->get('isLoggedIn')) {
                return redirect()->to('home/dashboard');
            }
            echo view('header');
            echo view('sign-in');
            echo view('footer');
        }
        public function resetpw()
        {
            if (session()->has('isLoggedIn') && session()->get('isLoggedIn')) {
                return redirect()->to('home/dashboard');
            }
            echo view('header');
            echo view('recover-password');
            echo view('footer');
        }
        
   public function send_reset_link() {
    helper('url'); // Load helper URL
    $emailService = \Config\Services::email(); // Gunakan service email
    $userModel = new User_model();

    $email = $this->request->getPost('email');

    // Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format.";
    }

    $user = $userModel->get_user_by_email($email);

    if ($user) {
        $token = bin2hex(random_bytes(50)); // Generate token unik
        $userModel->save_token($email, $token);

        $reset_link = base_url("home/reset_password/$token");
        $message = "Click the link to reset your password: <a href='$reset_link'>$reset_link</a>";

        // Konfigurasi Email
        $emailService->setFrom($this->email->fromEmail, $this->email->fromName);
        $emailService->setTo($email);
        $emailService->setSubject('Reset Your Password');
        $emailService->setMessage($message);

        if ($emailService->send()) {
            return "Check your email for the password reset link.";
        } else {
            // Debugging: tampilkan kesalahan
            return $emailService->printDebugger(['headers']);
        }
    } else {
        return "Email not registered.";
    }
}

    public function reset_password($token) {
        $userModel = new User_model(); // Buat instance dari User_model
        $email = $userModel->get_email_by_token($token);

        if (!$email) {
            echo "Invalid or expired token.";
            return;
        }
        echo view('header');
            echo view('reset_password');
            echo view('footer');

        // Lanjutkan dengan logika reset password
    }
   public function reset_pass($token = null)
    {
    $userModel = new \App\Models\User_model();

    if (!$token) {
        return redirect()->to('/home/login')->with('error', 'Invalid request.');
    }

    $email = $userModel->get_email_by_token($token);
    if (!$email) {
        return redirect()->to('/home/login')->with('error', 'Invalid or expired token.');
    }

    if ($this->request->getMethod() === 'post') {
        $password = $this->request->getPost('password');
        $userModel->update_password($email, $password);

        return redirect()->to('/home/login')->with('success', 'Password berhasil diperbarui! Silakan login.');
    }

    // Tampilkan view lengkap dengan header/footer
    echo view('header');
    echo view('reset_password', ['token' => $token]);
    echo view('footer');
    }


        // Handle Login
        public function aksi_login()
        {
            if (empty($recaptcha_response)) {
    // Assume user is offline, validate math captcha
    $math_captcha = $this->request->getPost('math_captcha');
    $math_result = $this->request->getPost('math_result');

    if ($math_captcha != $math_result) {
        echo "Math CAPTCHA verification failed. Please try again.";
        exit();
    }
    } else {
        // Online: verify Google reCAPTCHA
        $recaptcha_secret = "6LeF9ugqAAAAALYEZDv-25Ozc7UXzTBhhX-XhLsW";
        $verify_url = "https://www.google.com/recaptcha/api/siteverify";
        $response = file_get_contents($verify_url . "?secret=" . $recaptcha_secret . "&response=" . $recaptcha_response);
        $response_keys = json_decode($response, true);

        if (!$response_keys["success"]) {
            echo "reCAPTCHA verification failed. Please try again.";
            exit();
        }
    }

            $asc = new Model2();
            $data = [
                'nama' => $this->request->getPost('name'),
                'password' => MD5($this->request->getPost('password'))
            ];
            
            $cek = $asc->getWhere('pengguna', $data);
            if ($cek != null) {
                session()->set([
                    'id' => $cek->id_user,
                    'u' => $cek->nama,
                    'level' => $cek->level,
                    'isLoggedIn' => true
                ]);
                
                if ($this->request->getPost('remember')) {
                    setcookie('remember_user', $cek->nama, time() + (86400 * 7), "/");
                }
                $this->logActivity("User login");   
                return redirect()->to('home/dashboard');
            }
            
            return redirect()->to('home/login')->with('error', 'Username atau Password salah!');
        }

        // Logout Function
        public function logout()
        {
            $this->logActivity("User logout");
            session()->destroy();
            setcookie('remember_user', '', time() - 3600, "/");
            return redirect()->to('home/login');
        }

        // Dashboard Page
        public function dashboard()
        {
        // Check if user is logged in
            if (!session()->has('isLoggedIn') || !session()->get('isLoggedIn')) {
                return redirect()->to('home/login')->with('error', 'Silakan login dulu!');
            }

        // Load your model (assuming Model2 is your generic model)
            $this->logActivity("User mengakses dashboard");
            echo view('header');
            echo view('menu_hal');
        echo view('index'); // Pass the fetched data to the view
        echo view('footer');
    }


        // About Page
    public function user()
    {
        if (!session()->has('level') || !in_array(session()->get('level'), [0, 1])) {
    return redirect()->to('home/dashboard');
    }
        $this->logActivity("User mengakses table User");

        $asc = new Model2();
        $asfe['takdirestui'] = $asc->tampil('pengguna', 'id_user');

        echo view('header');
        echo view('menu_hal', $asfe);
        echo view('about');
        echo view('footer');
    }
    public function restoreuser()
    {
        if (!session()->has('level') || session()->get('level') != 0) {
            return redirect()->to('home/dashboard');
        }
        $this->logActivity("User mengakses table Restore User");

        $asc = new Model2();
        $asfe['takdirestui'] = $asc->tampil('pengguna', 'id_user');

        echo view('header');
        echo view('menu_hal', $asfe);
        echo view('restoreuser');
        echo view('footer');
    }


    public function simpanPengguna()
    {
        if (!session()->has('level') || !in_array(session()->get('level'), [0, 1])) {
        return redirect()->to('home/dashboard');
        }
        {
            $Joyce = new Model2();
            $data = [
                'nama' => $this->request->getPost('nama'),
                'kendaraan' => $this->request->getPost('kendaraan'),
                'level' => $this->request->getPost('level'),
                'email' => $this->request->getPost('email'),
                'password' => md5($this->request->getPost('password')), // Menggunakan MD5 untuk password
            ];

            // Menambahkan data pengguna ke dalam tabel
            $Joyce->input('pengguna', $data);
            return redirect()->to('home/user');
        }
    }

    public function hapusPengguna($id_user)
    {
        if (!session()->has('level') || !in_array(session()->get('level'), [0, 1])) {
    return redirect()->to('home/dashboard');
        }

        {

            $Joyce = new Model2();

                // Cek apakah id_user ada
            $cek = $Joyce->db->table('pengguna')->where('id_user', $id_user)->get()->getRow();

            if (!$cek) {
                die('ID user tidak ditemukan!');
            }
            $data = ['delete_status' => '1'];
            $where = ['id_user' => $id_user];

            $Joyce->edit('pengguna', $data, $where);

            return redirect()->to('home/user');
        }
    }

    public function aksirestore($id_user)
    {
        if (session()->get('level') == 0) {
            $Joyce = new Model2();

                // Cek apakah id_user ada
            $cek = $Joyce->db->table('pengguna')->where('id_user', $id_user)->get()->getRow();

            if (!$cek) {
                die('ID user tidak ditemukan!');
            }
            $data = ['delete_status' => '0'];
            $where = ['id_user' => $id_user];

            $Joyce->edit('pengguna', $data, $where);

            return redirect()->to('home/user');
        } 
    }
    public function aksirestoreall()
    {
            if (session()->get('level') == 0) { // Hanya level 0 yang bisa restore
                $Joyce = new Model2();
                
                // Update semua pengguna dengan level 1 menjadi level 0
                $data = ['delete_status' => '0'];
                $where = ['delete_status' => '1'];

                $Joyce->edit('pengguna', $data, $where); // Pastikan `edit` bisa menangani update banyak data

                return redirect()->to('home/user')->with('success', 'Semua user level 1 berhasil diubah ke level 0');
            } else {
                return redirect()->to('home')->with('error', 'Akses ditolak');
            }
        }   

        public function hapusPenggunaril($id_user)
        {
         if (session()->get('level') == 0) {
            $Joyce = new Model2();
            $where = ['id_user' => $id_user];
            $Joyce->hapus('pengguna', $where);
            return redirect()->to('home/user');
        } else {
            return redirect()->to('home');
        }

    }

    public function editPengguna($id_user)
    {
        if (!session()->has('level') || !in_array(session()->get('level'), [0, 1])) {
        return redirect()->to('home/dashboard');
        }
    {
            $Joyce = new Model2();
            $data['pengguna'] = $Joyce->getWhere('pengguna', ['id_user' => $id_user]);

            // Cek apakah pengguna ditemukan
            if ($data['pengguna']) {
                echo view('header');
                echo view('menu_hal');
                echo view('pengguna_edit', $data);
                echo view('footer');
            } else {
                return redirect()->to('home/user');
            }
        }
    }

    public function updatePengguna($id_user)
    {
        if (!session()->has('level') || !in_array(session()->get('level'), [0, 1])) {
        return redirect()->to('home/dashboard');
        }
   {
            $Joyce = new Model2();

            // Ambil data dari form
            $data = [
                'nama' => $this->request->getPost('nama'),
                'kendaraan' => $this->request->getPost('kendaraan'),
                'level' => $this->request->getPost('level'),
                'email' => $this->request->getPost('email'),
                'updated_at' => date('Y-m-d H:i:s'), // Waktu saat dibuat (awal)
                'updated_by' => 1 // Ganti dengan ID admin atau pengguna yang membuat
            ];

            // Cek apakah ada password yang diubah
            $password = $this->request->getPost('password');
            if (!empty($password)) {
                $data['password'] = md5($password); // Gunakan md5 jika memang ingin menggunakan md5
            }

            // Update pengguna berdasarkan id
            $Joyce->edit('pengguna', $data, ['id_user' => $id_user]);

            // Redirect setelah update
            return redirect()->to(base_url('home/pengguna'));
        } 
    }

    public function pendaftaran()
    {
        if (!session()->has('id')) {
            return redirect()->to('/home/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Set timezone ke Indonesia
        date_default_timezone_set('Asia/Jakarta');

        // Ambil tanggal hari ini
        $today = date('Y-m-d');

        // Ambil data beasiswa yang masih berlaku
        $beasiswa = $this->beasiswaModel
            ->where('tanggal_buka <=', $today)
            ->where('tanggal_tutup >=', $today)
            ->findAll();

        // Tambahan pengecekan logika jika masih muncul yang sudah tutup
        $beasiswa = array_filter($beasiswa, function ($item) use ($today) {
            return $item['tanggal_tutup'] >= $today;
        });

        // Kirim data ke view
        $data = [
            'beasiswa' => $beasiswa
        ];

        // Tampilkan view
        echo view('header');
        echo view('menu_hal');
        echo view('portfolio', $data);
        echo view('footer');

        // Simpan log aktivitas
        $this->logActivity("User mengakses pendaftaran");

        // Debug opsional (hapus kalau sudah yakin)
            // dd([
            //     'today' => $today,
            //     'beasiswa' => $beasiswa
            // ]);
    }

 


    public function pendaftaranpilih()
    {
        if (!session()->has('id')) {
            return redirect()->to('/home/login')->with('error', 'Anda harus login terlebih dahulu.');
        }
        echo view('header');
        echo view('pendaftaranpilih');
        echo view('footer');
        $this->logActivity("User melakukan pendaftaran");
    }
    public function insertformdaftar()
{
    if (!session()->has('id')) {
        return redirect()->to('/home/login')->with('error', 'Anda harus login terlebih dahulu.');
    }

    helper(['form', 'url']);

    $mahasiswaModel = new \App\Models\MahasiswaModel();
    $pendaftaranModel = new \App\Models\PendaftaranModel();
    $db = \Config\Database::connect();

    $nama = $this->request->getPost('name');
    $nik = $this->request->getPost('NIK');
    $jurusan = $this->request->getPost('jurusan');
    $nilai_ipk = $this->request->getPost('nilai');
    $bukti = $this->request->getFile('bukti');

    $id_user = session()->get('id'); // Ambil ID user dari session

    // Cek apakah NIK atau nama sudah terdaftar
    $mahasiswaExist = $mahasiswaModel->where('nik', $nik)
                                     ->orWhere('nama_mahasiswa', $nama)
                                     ->first();

    if ($mahasiswaExist) {
        return redirect()->back()->with('error', 'Nama atau NIK sudah terdaftar.');
    }

    // Upload file bukti IPK
    if ($bukti->isValid() && !$bukti->hasMoved()) {
        $namaFile = $bukti->getRandomName();
        $bukti->move('uploads/bukti_ipk', $namaFile);
    } else {
        return redirect()->back()->with('error', 'Upload bukti IPK gagal!');
    }

    // Simpan ke tabel mahasiswa (tambahkan id_user)
    $id_mahasiswa = $mahasiswaModel->insert([
        'nama_mahasiswa' => $nama,
        'nik' => $nik,
        'jurusan' => $jurusan,
        'id_user' => $id_user, // disini penambahan id_user
    ]);

    // Ambil id_beasiswa dari database (contoh: beasiswa terbaru)
    $query = $db->table('beasiswa')->select('id_beasiswa')->orderBy('id_beasiswa', 'DESC')->limit(1)->get();
    $id_beasiswa = $query->getRow() ? $query->getRow()->id_beasiswa : null;

    if (!$id_beasiswa) {
        return redirect()->back()->with('error', 'Beasiswa tidak tersedia.');
    }

    // Simpan ke tabel pendaftaran
    $pendaftaranModel->insert([
        'id_beasiswa'    => $id_beasiswa,
        'id_mahasiswa'   => $id_mahasiswa,
        'nilai_ipk'      => $nilai_ipk,
        'bukti_ipk'      => $namaFile,
        'tanggal_daftar' => date('Y-m-d'),
        'status'         => 'Sedang Diajukan'
    ]);

    return redirect()->to('/home/pendaftaran')->with('success', 'Pendaftaran berhasil!');
}

    public function riwayatbeasiswa()
{
    if (!session()->has('id')) {
        return redirect()->to('/home/login')->with('error', 'Anda harus login terlebih dahulu.');
    }

    $userId = session()->get('id');
    $level  = session()->get('level');

    $pendaftaranModel = new \App\Models\PendaftaranModel();
    $data['pendaftaran'] = $pendaftaranModel->getRiwayatPendaftaran($userId, $level);

    echo view('header', $data);
    echo view('menu_hal', $data);
    echo view('riwayat_pendaftaran', $data);
    echo view('footer', $data);
    $this->logActivity("User melihat riwayat pendaftaran");
}




        public function viewLog()
    {
    $logModel = new LogActivityModel();
    $level = session()->get('level');
    $userId = session()->get('id');
    $selectedUsername = $this->request->getGet('username'); // Ambil username dari GET

    // Ambil daftar user untuk dropdown
    $users = $logModel->select('username')->distinct()->findAll();

    // Ambil log sesuai level user
    if ($level == 1) {
        if (!empty($selectedUsername)) {
            $logs = $logModel->where('username', $selectedUsername)->findAll();
        } else {
            $logs = $logModel->findAll();
        }
    } else {
        $logs = $logModel->where('id_user', $userId)->findAll();
    }

    // Catat aktivitas user
    $this->logActivity("User melihat Logs");

    $data = [
        'logs' => $logs,
        'users' => $users,
        'selectedUsername' => $selectedUsername // Tambahkan ini agar bisa dipakai di view
    ];

    echo view('header', $data);
    echo view('menu_hal', $data);
    echo view('log_activity', $data);
    echo view('footer', $data);
    }
    public function pengaturan()
    {
        $db = db_connect();
        $pengaturan = $db->table('pengaturan_app')->get()->getRow();
        echo view('header');
        echo view('pengaturan', ['pengaturan' => $pengaturan]);
        echo view('footer');
    }
    public function simpan_pengaturan()
    {
        $db = db_connect();
    
        // Ambil file yang diunggah untuk logo header
        $fileLogo = $this->request->getFile('logo');
    
        // Ambil file yang diunggah untuk logo favicon
        $fileLogoWeb = $this->request->getFile('logo_web');
    
        // Ambil data pengaturan saat ini
        $pengaturan = $db->table('pengaturan_app')->get()->getRow();
    
        // Inisialisasi variabel untuk nama file
        $logoName = $pengaturan->logo; // Gunakan logo lama sebagai default
        $logoWebName = $pengaturan->logo_web; // Gunakan logo_web lama sebagai default
    
        // Proses logo header
        if ($fileLogo && $fileLogo->isValid() && !$fileLogo->hasMoved()) {
            // Validasi tipe file
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($fileLogo->getMimeType(), $allowedTypes)) {
                return redirect()->back()->with('error', 'Hanya file gambar yang diperbolehkan (JPG, PNG, GIF).');
            }
    
            // Generate nama file unik dan pindahkan file
            $logoName = $fileLogo->getRandomName();
            $fileLogo->move(FCPATH . 'uploads', $logoName);
    
            // Hapus logo lama jika ada
            if ($pengaturan->logo && file_exists(FCPATH . 'uploads/' . $pengaturan->logo)) {
                unlink(FCPATH . 'uploads/' . $pengaturan->logo);
            }
        }
    
        // Proses logo favicon
        if ($fileLogoWeb && $fileLogoWeb->isValid() && !$fileLogoWeb->hasMoved()) {
            // Validasi tipe file
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/x-icon'];
            if (!in_array($fileLogoWeb->getMimeType(), $allowedTypes)) {
                return redirect()->back()->with('error', 'Hanya file gambar yang diperbolehkan (JPG, PNG, GIF, ICO).');
            }
    
            // Generate nama file unik dan pindahkan file
            $logoWebName = $fileLogoWeb->getRandomName();
            $fileLogoWeb->move(FCPATH . 'uploads', $logoWebName);
    
            // Hapus logo_web lama jika ada
            if ($pengaturan->logo_web && file_exists(FCPATH . 'uploads/' . $pengaturan->logo_web)) {
                unlink(FCPATH . 'uploads/' . $pengaturan->logo_web);
            }
        }
    
        // Ambil data dari input form
        $data = [
            'judul' => $this->request->getPost('judul'),
            'logo' => $logoName, // Simpan nama file logo header ke database
            'logo_web' => $logoWebName, // Simpan nama file logo favicon ke database
        ];
    
        // Update ke database
        $db->table('pengaturan_app')->update($data);
    
        return redirect()->to('home/dashboard')->with('success', 'Pengaturan berhasil diperbarui!');
    }
    public function setujui($id)
{
    $model = new PendaftaranModel();
    $model->update($id, ['status' => 'Diterima']);
    return redirect()->back()->with('success', 'Pendaftaran berhasil disetujui.');
}

public function tolak($id)
{
    $model = new PendaftaranModel();
    $model->update($id, ['status' => 'Ditolak']);
    return redirect()->back()->with('success', 'Pendaftaran berhasil ditolak.');
}

}
