<?php
class Userop extends CI_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("users_model");
    }

    public function login()
    {
        $viewData = new stdClass();

        /** View'e gönderilecek Değişkenlerin Set Edilmesi.. */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function do_login() {

        $this->load->library("form_validation");

        //Kurallar Yazılır
        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email");
        $this->form_validation->set_rules("password", "Şifre", "required|trim|min_length[8]");

        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> Alanı Doldurulmalıdır.",
                "valid_email"   => "Lütfen geçerli bir E-Posta Adresi Giriniz",
                "min_length"    => "En az 8 karakterli şifre girilmelidir"
            )
        );

        //Form Validation Çalışır..

        if ($this->form_validation->run() == FALSE) {

            $viewData = new stdClass();

            /** View'e Gönderilecek Değişkenlerin Set Edilmesi */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        } else {

            $user = $this->users_model->get(
                array(
                    "email"     => $this->input->post("email"),
                    "password"  => md5($this->input->post("password"))
                )
            );

            if ($user){
                //Giriş yapılıp yapılmadığını kontrol ettikten sonra sayfalara giriş izini verilip verilmemesi
                $alert = array(
                    "title"     => "İşlem Başarılı",
                    "text"  => "$user->username Hoşgeldiniz",
                    "type"  =>  "success"
                );

                $this->session->set_userdata("user", $user);
                $this->session->set_flashdata("alert", $alert);

                redirect(base_url());

            } else {
                //Hata Kodları yazılacak

                $alert = array(
                    "title"     => "İşlem Başarısız",
                    "text"  => "Lütfen Giriş Bilgilerinizi kontrol ediniz",
                    "type"  =>  "error"
                );

                $this->session->set_userdata("user", $user);

                redirect(base_url("login"));

            }
        }

    }

}