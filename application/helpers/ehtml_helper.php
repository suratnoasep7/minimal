<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('InputForm'))
{
    function InputForm($type,$name,$value,$prop="")
    {                
        $return = '<input type="'.$type.'" name="'.$name.'" id="'.$name.'" value="'.$value.'" '.$prop.'>';
        return $return;
    }
}


if (!function_exists('InputLabelForm'))
{
    function InputLabelForm($label,$type,$name,$value,$prop="")
    {                
        $return  = '<div class="form-group">';
        $return .= '<label class="control-label col-lg-2" >'.$label.'</label>';
        $return .= '<div class="col-lg-10">';
        $return .= InputForm($type,$name,$value,$prop);
        $return .= '</div>';
        $return .= '</div>';
        return $return;
    }
}

if (!function_exists('SelectForm'))
{
    function SelectForm($option_data,$name,$val,$prop="",$placeholder="Pilih")
    {               
        $return  = '<select name="'.$name.'" id="'.$name.'" '.$prop.'>'; 
        $return .= '<option value="">'.$placeholder.'</option>';
        foreach ($option_data as $key => $value) {
            $selected = "";
            if($key == $val) { $selected = "selected";}
            $return .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';

        }
        $return .= '</select>'; 
        return $return;
    }
}

if (!function_exists('SelectLabelForm'))
{
    function SelectLabelForm($label,$option_data,$name,$val,$prop="",$placeholder="Pilih")
    {                
        $return  = '<div class="form-group">';
        $return .= '<label class="control-label col-lg-2" >'.$label.'</label>';
        $return .= '<div class="col-lg-10">';
        $return .= SelectForm($option_data,$name,$val,$prop,$placeholder);
        $return .= '</div>';
        $return .= '</div>';
        return $return;
    }
}

/* End of file ehtml_helper.php */
/* Location: ./application/helpers/ehtml_helper.php */
