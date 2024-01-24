<?php

    function convertToSEO($text)
    {
    $turkce = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");

    return strtolower(str_replace($turkce, $convert, $text));
    }

    //Randevu modülünde işlemin yapılacığı Şubenin id sinde ismini değiştirme işlemi..
    function getBranchName($id)
    {
        $ci = &get_instance();
        $ci->load->database();
        $branches = $ci->db->where(array("id" => $id))->get("branches")->row();
        return $branches->name;
    }
    //Randevu modülünde Müşterinin ismini dinamik olarak değiştirme işlemi....
    function getCustomersName($id)
    {
        $ci = &get_instance();
        $ci->load->database();
        $appointments = $ci->db->where(array("id" => $id))->get("customers")->row();
        return $appointments->name;
    }

    //Randevu tablosunda işlemi gerçekleştirecek olan çalışanın ismini dinamik olarak değiştirme işlemii.....
    function getStaffName($id)
    {
        $ci = &get_instance();
        $ci->load->database();
        $appointments = $ci->db->where(array("id" => $id))->get("staff")->row();
        return $appointments->name;
    }

    function getServicesName($id)
    {
        $ci = &get_instance();
        $ci->load->database();
        $appointments = $ci->db->where(array("id" => $id))->get("services")->row();
        return $appointments->name;
    }
    function getProductName($id)
    {
        $ci = &get_instance();
        $ci->load->database();
        $appointments = $ci->db->where(array("id" => $id))->get("products")->row();
        return $appointments->name;
    }



if(!function_exists('selected_control'))
    {
        function selected_control($data, $selected_value)
        {
            $options = "";

            foreach ($data as $row)
            {
                $options = '<options value="' . $row->id . '" ' . ($selected_value == $row->id ? 'selected' : '') . '>';
                $options = $row->gender;
                $options = '</option>';

                return $options;
            }

        }
    }

    function ActiveUserControl()
    {
        $process = &get_instance();

        $user = $process->session->userdata("user");

        if ($user)
            return $user;
        else
            return false;

    }

?>