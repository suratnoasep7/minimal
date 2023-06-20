<?php
/****
CLASS Bank Mandiri
***/
 
class bankMandiri{
        var $userid = "emoney6312";
        var $password = "170688";
        var $rekening = "1";
 
        var $login_url = "https://ib.bankmandiri.co.id/retail/Login.do?action=form&lang=in_ID";
        var $login_process_url="https://ib.bankmandiri.co.id/retail/Login.do";
        var $login_success_url="https://ib.bankmandiri.co.id/retail/Redirect.do?action=forward";
 
        var $mutasi_form_url="https://ib.bankmandiri.co.id/retail/TrxHistoryInq.do?action=form";
        var $mutasi_url = "https://ib.bankmandiri.co.id/retail/TrxHistoryInq.do";
        var $logout_url = "https://ib.bankmandiri.co.id/retail/Logout.do?action=result";
        
		var $emoney_form_url = "https://ib.bankmandiri.co.id/retail/mpsInq.do";
 
        var $cookie = dirname( __FILE__ ) . '/cookie';
        var $ch;
        var $dom;
 
        function __construct(){
                $this->dom = new DOMDocument();
        }
 
        function openCurl(){
			curl_setopt($this->ch, CURLOPT_HEADER,1);
			curl_setopt($this->ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($this->ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux i686 (x86_64); rv:2.0b4pre) Gecko/20100812 Minefield/4.0b4pre");
			curl_setopt($this->ch, CURLOPT_COOKIEJAR, '/cookiejar');
			curl_setopt($this->ch, CURLOPT_COOKIEFILE, '/cookie');
			curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($this->ch, CURLOPT_SSLVERSION, 1);
			curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 0); //ignoring server redirect
        }
 
        function closeCurl(){
                curl_close($this->ch);
        }
 
        function browse($url,$post=false,$follow=false){
                $this->openCurl();
                curl_setopt($this->ch, CURLOPT_URL, $url);
 
                if($post){
                        curl_setopt($this->ch, CURLOPT_POST, 1 );
                        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post);
                }
 
                if($follow){
                        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);
                }
 
                $result = array("data"=>curl_exec($this->ch),"info"=>curl_getinfo($this->ch));
 
                if(!$result['data']){
                        echo 'Curl error: '.curl_error($this->ch);
                }
 
                $result['headers'] = substr($result['data'], 0, $result['info']['header_size']);
                //      echo $result['data'];
                $this->closeCurl();
 
                return $result;
        }
 
        function login(){
                $this->browse($this->login_url);
                //curl_setopt($this->ch, CURLOPT_REFERER, $this->login_url);
                $param = "action=result&userID=".$this->userid."&password=".$this->password."&image.x=0&image.y=0";
                $result = $this->browse($this->login_process_url,$param);
                return $isLogin = strpos($result['headers'],$this->login_success_url);
        }
 
        function mutasi($rekening){ 
                $page = $this->browse($this->mutasi_form_url);
                $dom = new DOMDocument();
 
                libxml_use_internal_errors(true);
                $dom->loadHTML($page['data']);
				$param = "fromAccountID=".$rekening;
                $param.="&action=result&searchType=L&sortType=Date&orderBy=ASC&lastTransaction=5";
                $result = $this->browse($this->mutasi_url,$param);
                $mydata = $result['data'];
                unset($result);
				preg_match('/<span class="text-bold">Saldo Akhir<\/span>(.*?)<\/span>/s', $mydata, $data);                    
                return $mydata;
        }
 
        function formemoney(){ 
                $page = $this->browse($this->emoney_form_url);
                $dom = new DOMDocument();
                libxml_use_internal_errors(true);
                $dom->loadHTML($page['data']);
                $param ="&action=result&selectedCardNo=&paymentOption=new&cardNo1=6032&cardNo2=9840&cardNo3=3163&cardNo4=6347";
                $result = $this->browse($this->emoney_form_url,$param);
                $mydata = $result['data'];
                unset($result);
				preg_match('/<table border="0" cellpadding="2" cellspacing="1" width="500">(.*?)<\/table>/s', $mydata, $data);
				return $mydata;
        }
 
        function getSaldoAwalAkhir($page,$lget) {
                if($lget)
                        preg_match('/<span class="text-bold">Saldo Awal<\/span>(.*?)<\/span>/s', $page, $data);                    
                else
                        preg_match('/<span class="text-bold">Saldo Akhir<\/span>(.*?)<\/span>/s', $page, $data);                    
                $str = preg_replace("/\n+/","",$data[0]);
                $str = preg_replace("/\s+/"," ",$str);        
                $str = preg_replace("/\./","",$str);        
                $str = preg_replace("/,/",".",$str);        
                preg_match_all('/<td height="25" align="right" class="tabledata"><span class="text-bold">(.*?)<\/span>/si', $str, $trs);    
                return $trs[1][0];
        }
 
        function parseMutasi($page){
                preg_match('/<table border="0" cellpadding="2" cellspacing="1" width="100%">(.*?)<\/table>/s', $page, $data);
                preg_match_all('/<tr height="25">(.*?)<\/tr>/si', $data[0], $trs);
 
                $rows=array();
                $i = 0;
                foreach($trs[1] as $tr){
                        $str = preg_replace("/\n+/","",$tr);
                        $str = preg_replace("/<br>/"," ",$str);
                        $str = preg_replace("/\s+/"," ",$str);
                        $str = preg_replace("/\./","",$str);
                        $str = preg_replace("/,/",".",$str);
                        $strb = $str;
 
                        if($i%2) {
                                preg_match_all('/<td height="25" class="tabledata" bgcolor="#DDF2FA">(.*?)<\/td>/si', $str, $tda);
                                preg_match_all('/<td height="25" class="tabledata" align="right" bgcolor="#DDF2FA">(.*?)<\/td>/si', $strb, $tdb);
                        } else {
                                preg_match_all('/<td height="25" class="tabledata" bgcolor="">(.*?)<\/td>/si', $str, $tda);
                                preg_match_all('/<td height="25" class="tabledata" align="right" bgcolor="">(.*?)<\/td>/si', $strb, $tdb);
                        }
 
                        $row['tanggal'] = $tda[1][0];
                        $row['keterangan'] = $tda[1][1];
                        $row['debet'] = $tdb[1][0];
                        $row['credit'] = $tdb[1][1];
                        $rows[]=$row;
 
                        $i++;
                }
                return $rows;
        }
 
        function logout(){
                $this->browse($this->logout_url);
        }
 
}
 
?>