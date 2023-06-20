<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Funcsql
{
    // ambil data field all yang ada di dalama table database
    public function GetFieldArray($table = "")
    {
        // ger data field 
        $data_fields = "";
        if (empty($table)) {
            $data_fields = array();
            $fields = $this->db->field_data($table);
            foreach ($fields as $row) {
                array_push($data_fields, $row->name);
            }
        }
        return $data_fields;
    }

    public function DbSaveTable($tableSQL, $mode, $fieldkey)
    {
        $data        = array();
        $data_fields = $this->GetFieldArray($tableSQL);
        $data_form   = $this->input->post();
        foreach ($data_form as $key => $value) {
            if (in_array($key, $data_fields)) {
                $data[$key] = $value;
            }
        }

        $keys = $this->input->post($fieldkey);
        switch ($mode) {
            case 'C':
                $data['created_by']       = $this->auth->user_id();
                $data['created_username'] = $this->auth->user_name();
                $data['created_on']       = date('Y-m-d H:i:s', time());
                $proses = $this->db->insert($tableSQL, $data);
                break;
            case 'U':
                $data['modified_by']       = $this->auth->user_id();
                $data['modified_username'] = $this->auth->user_name();
                $data['modified_on']       = date('Y-m-d H:i:s', time());
                $this->db->where('id', $keys);
                $proses = $this->db->update($tableSQL, $data);
                break;
            case 'D':
                $delete['deleted']           = 1;
                $delete['modified_by']       = $this->auth->user_id();
                $delete['modified_username'] = $this->auth->user_name();
                $delete['modified_on']       = date('Y-m-d H:i:s', time());
                $this->db->where('id', $keys);
                $proses = $this->db->update($tableSQL, $delete);
                break;
            default:
                break;
        }

        $return = false;
        if ($proses) {
            $return = true;
        }
        return $return;
    }
}
