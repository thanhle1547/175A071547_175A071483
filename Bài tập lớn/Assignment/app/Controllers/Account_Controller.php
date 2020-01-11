<?php
defined('PATH_SYSTEM') || die("Bad request!");

include PATH_APP . '/Entities/NguoiDung_Entity.php';
include PATH_APP . '/Models/Account_Model.php';

class Account_Controller extends Base_Controller
{
    public function index()
    {
        $data['title'] = 'Đăng nhập';
        $data['page'] = 'login';
        $this->load_header($data);
        $this->load_content('login', $data);
    }

    public function login($username, $password)
    {
        $message = '';

        $username = trim($username);
        $password = trim($password);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (strlen(trim($password)) < 5)
                die("Password must have atleast 5 characters.");

            // Vì gtri đc đưa vào sau khi blind nên ở đây chỉ kiểm tra dữ liệu
            if (empty($username) || !preg_match('/^\w+$/', $username)) {
                $message = "Username just containt letters, numbers and dash";
            }

            if (empty($password) || !preg_match('/^\w+$/', $password)) {
                $message = "Passwword just containt letters, numbers and dash";
            }

            if ($message == '') {
                try{
                    if ($result = Account_Model::login($username, $password)) {
                        foreach($result as $r)
                        {
                            $hash = hash_pbkdf2("sha256", $password, $r->Salt, 10);
                            if ($hash == $r->Password) {
                                $_SESSION['userId'] = $r->MaND;
                                $_SESSION['hoten'] = $r->HoTen;
                                $_SESSION['chucvu'] = $r->MaCV;
                                header('location: app/dashboard');
                                exit;
                            }
                        }
                    } else
                        $message = "Login failed!!!";
                }
                catch (PDOException $e){
                    throw new Exception("Error Processing Request", 1);
                }
            }
            echo $message;
        }
    }

    /* public static function register(){
        $r = bin2hex(random_bytes(50));
        $hash = hash_pbkdf2("sha256", 'nam12345', $r, 10);
    } */

    public static function logout()
    {
        if (isset($_SESSION['userId'])) {
            // Unsset $_SESSION
            $_SESSION = array();
            // or session_unset()

            // deleting the whole session
            // destroys the session data that is stored in the session storage (e.g. the session file in the file system)

            // https://www.php.net/session_destroy
            // If a cookie is used to propagate the session ID (default behavior), then the session cookie must be deleted. setcookie() may be used for that.
            // echo ini_get("session.use_cookies"); trả về 1
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(
                    session_name(),
                    '',
                    time() - 4200,
                    $params['path'],
                    $params['domain'],
                    $params['secure'],
                    $params['httponly']
                );
            }

            if (session_status() == PHP_SESSION_ACTIVE)
                session_destroy();
        }
        header("location: account");
        exit;
    }
}
