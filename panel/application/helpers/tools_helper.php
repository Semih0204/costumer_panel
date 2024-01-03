<?php

    function convertToSEO($text)
    {
    $turkce = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");

    return strtolower(str_replace($turkce, $convert, $text));
    }

    function getBranchName($id)
    {
        $ci = &get_instance();
        $ci->load->database();
        $customers = $ci->db->where(array("id" => $id))->get("branches")->row();
        return $customers->name;
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

