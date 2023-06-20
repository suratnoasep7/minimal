<?php
class IbParser
{
    function __construct()
    {
		date_default_timezone_set("Asia/Jakarta");
        $this->conf['ip']       = "110.136.146.172";
        $this->conf['time']     = time() + ( 3600 * 7 );
        $this->conf['path']     = dirname( __FILE__ );
    }

    function instantiate( $bank )
    {
        $class = $bank . 'Parser';
        $this->bank = new $class( $this->conf ) or trigger_error( 'Undefined parser: ' . $class, E_USER_ERROR );
    }

    function getTransactions( $bank, $username, $password, $kartu )
    {
        $this->instantiate( $bank );
        $this->bank->login( $username, $password );
        $transactions = $this->bank->getTransactions($kartu);
        $this->bank->logout();
        return $transactions;
    }
}




class MANDIRIParser
{




    function __construct( $conf )
    {

        $this->conf = $conf;

        $d          = explode( '|', date( 'Y|m|d|H|i|s', $this->conf['time'] ) );
        $start    = mktime( $d[3], $d[4], $d[5], $d[1], ( $d[2] - 7 ), $d[0] );

        $this->post_time['end']['y'] = date("Y");
        $this->post_time['end']['m'] = date("m");
        $this->post_time['end']['d'] = date("d");
        $this->post_time['start']['y'] = date( 'Y', $start );
        $this->post_time['start']['m'] = date( 'm', $start );
        $this->post_time['start']['d'] = date( 'd', $start );
    }




    function curlexec()
    {
        curl_setopt( $this->ch, CURLOPT_RETURNTRANSFER, 1 );
        return curl_exec( $this->ch );
    }




    function login( $username, $password )
    {
		$this->ch = curl_init();
		curl_setopt($this->ch, CURLOPT_HEADER,1);
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($this->ch, CURLOPT_USERAGENT,
				"Mozilla/5.0 (X11; Linux i686 (x86_64); rv:2.0b4pre) Gecko/20100812 Minefield/4.0b4pre");
        curl_setopt( $this->ch, CURLOPT_COOKIEFILE, $this->conf['path'] . '/cookie' );
        curl_setopt( $this->ch, CURLOPT_COOKIEJAR, $this->conf['path'] . '/cookiejar' );
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($this->ch, CURLOPT_SSLVERSION, 1);
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 0); //ignoring server redirect
        curl_setopt( $this->ch, CURLOPT_URL, 'https://ib.bankmandiri.co.id/retail/Login.do?action=form&lang=in_ID' );
		$this->curlexec();
        $params = "action=result&userID=".$username."&password=".$password."&image.x=0&image.y=0";
        curl_setopt( $this->ch, CURLOPT_URL, 'https://ib.bankmandiri.co.id/retail/Login.do' );
        curl_setopt( $this->ch, CURLOPT_POSTFIELDS, $params );
        curl_setopt( $this->ch, CURLOPT_POST, 1 );
        $this->curlexec();
    }




    function logout()
    {
        curl_setopt( $this->ch, CURLOPT_URL, 'https://ib.bankmandiri.co.id/retail/Logout.do?action=result' );
        $this->curlexec();
        return curl_close( $this->ch );
    }

    function getTransactions($kartu)
    {
        curl_setopt( $this->ch, CURLOPT_URL, 'https://ib.bankmandiri.co.id/retail/mpsInq.do' );
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0); //skipping SSL_CERT for host
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0); //skipping SSL_CERT
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 0); //ignoring server redirect
        $this->curlexec();
		$exkartu	= explode("-", $kartu);
        $params 	= "&action=result&selectedCardNo=&paymentOption=new&cardNo1=".$exkartu[0]."&cardNo2=".$exkartu[1]."&cardNo3=".$exkartu[2]."&cardNo4=".$exkartu[3];
        curl_setopt( $this->ch, CURLOPT_URL, 'https://ib.bankmandiri.co.id/retail/mpsInq.do' );
        curl_setopt( $this->ch, CURLOPT_POSTFIELDS, $params );
        curl_setopt( $this->ch, CURLOPT_POST, 1 );
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0); //skipping SSL_CERT for host
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0); //skipping SSL_CERT
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 0); //ignoring server redirect
        $src = $this->curlexec();
		preg_match('/<table border="0" cellpadding="2" cellspacing="1" width="500">(.*?)<\/table>/s', $src, $data);
		return $data;		
    }

}