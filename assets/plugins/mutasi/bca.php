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




    function getBalance( $bank, $username, $password )
    {

        $this->instantiate( $bank );
        $this->bank->login( $username, $password );
        $balance = $this->bank->getBalance();
        $this->bank->logout();
        return $balance;

    }




    function getTransactions( $bank, $username, $password )
    {

        $this->instantiate( $bank );
        $this->bank->login( $username, $password );
        $transactions = $this->bank->getTransactions();
        $this->bank->logout();
        return $transactions;

    }

}




class BCAParser
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
		curl_setopt($this->ch, CURLOPT_SSLVERSION, 4);
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 0); //ignoring server redirect
        curl_setopt( $this->ch, CURLOPT_URL, 'https://m.klikbca.com/login.jsp' );
        $params = implode( '&', array( 'value(user_id)=' . $username, 'value(pswd)=' . $password, 'value(Submit)=LOGIN', 'value(actions)=login', 'value(user_ip)=' . $this->conf['ip'], 'user_ip=' . $this->conf['ip'], 'value(mobile)=true', 'mobile=true' ) );
        curl_setopt( $this->ch, CURLOPT_URL, 'https://m.klikbca.com/authentication.do' );
        curl_setopt( $this->ch, CURLOPT_REFERER, 'https://m.klikbca.com/login.jsp' );
        curl_setopt( $this->ch, CURLOPT_POSTFIELDS, $params );
        curl_setopt( $this->ch, CURLOPT_POST, 1 );

        $this->curlexec();

    }




    function logout()
    {
        curl_setopt( $this->ch, CURLOPT_URL, 'https://m.klikbca.com/authentication.do?value(actions)=logout' );
        curl_setopt( $this->ch, CURLOPT_REFERER, 'https://m.klikbca.com/authentication.do?value(actions)=menu' );
        $this->curlexec();
        return curl_close( $this->ch );
    }




    function getBalance()
    {

        curl_setopt( $this->ch, CURLOPT_URL, 'https://m.klikbca.com/accountstmt.do?value(actions)=menu' );
        curl_setopt( $this->ch, CURLOPT_REFERER, 'https://m.klikbca.com/authentication.do' );

        $this->curlexec();

        curl_setopt( $this->ch, CURLOPT_URL, 'https://m.klikbca.com/balanceinquiry.do' );
        curl_setopt( $this->ch, CURLOPT_REFERER, 'https://m.klikbca.com/accountstmt.do?value(actions)=menu' );

        $src = $this->curlexec();

        $parse = explode( "<td align='right'><font size='1' color='#0000a7'><b>", $src );

        if ( empty( $parse[1] ) )
            return false;

        $parse = explode( '</td>', $parse[1] );

        if ( empty( $parse[0] ) )
            return false;

        $parse = str_replace( ',', '', $parse[0] );

        return ( is_numeric( $parse ) )? $parse: false;

    }




    function getTransactions()
    {

        curl_setopt( $this->ch, CURLOPT_URL, 'https://m.klikbca.com/accountstmt.do?value(actions)=menu' );
        curl_setopt( $this->ch, CURLOPT_REFERER, 'https://m.klikbca.com/authentication.do' );
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0); //skipping SSL_CERT for host
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0); //skipping SSL_CERT
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 0); //ignoring server redirect


        $this->curlexec();

        curl_setopt( $this->ch, CURLOPT_URL, 'https://m.klikbca.com/accountstmt.do?value(actions)=acct_stmt' );
        curl_setopt( $this->ch, CURLOPT_REFERER, 'https://m.klikbca.com/accountstmt.do?value(actions)=menu' );
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0); //skipping SSL_CERT for host
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0); //skipping SSL_CERT
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 0); //ignoring server redirect
        $this->curlexec();

        $params = implode( '&', array( 'r1=1', 'value(D1)=0', 'value(startDt)=' . $this->post_time['start']['d'], 'value(startMt)=' . $this->post_time['start']['m'], 'value(startYr)=' . $this->post_time['start']['y'],'value(endDt)=' . $this->post_time['end']['d'], 'value(endMt)=' . $this->post_time['end']['m'], 'value(endYr)=' . $this->post_time['end']['y'] ) );

        curl_setopt( $this->ch, CURLOPT_URL, 'https://m.klikbca.com/accountstmt.do?value(actions)=acctstmtview' );
        curl_setopt( $this->ch, CURLOPT_REFERER, 'https://m.klikbca.com/accountstmt.do?value(actions)=acct_stmt' );
        curl_setopt( $this->ch, CURLOPT_POSTFIELDS, $params );
        curl_setopt( $this->ch, CURLOPT_POST, 1 );
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, 0); //skipping SSL_CERT for host
		curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0); //skipping SSL_CERT
		curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 0); //ignoring server redirect
        $src = $this->curlexec();
        $parse = explode( '<table width="100%" class="blue">', $src );

        if ( empty( $parse[1] ) )
            return false;

        $parse = explode( '</table>', $parse[1] );
        $parse = explode( '<tr', $parse[0] );

        $rows = array();

        foreach( $parse as $val )
            if ( substr( $val, 0, 8 ) == ' bgcolor' )
                $rows[] = $val;

        foreach( $rows as $key => $val )
        {
            $rows[$key]     = explode( '</td>', $val );
            $rows[$key][0]  = substr( $rows[$key][0], -5 );
            if ( stristr( $rows[$key][0], 'pend' ) )
                $rows[$key][0] = 'PEND';
            $detail         = explode( "<td valign='top'>", $rows[$key][1] );
            $rows[$key][2]  = $detail[1];
            $rows[$key][1]  = explode( '<br>', $detail[0] );
            $rows[$key][3]  = str_replace( ',', '', $rows[$key][1][count($rows[$key][1])-1] );
            unset( $rows[$key][1][count($rows[$key][1])-1] );
            foreach( $rows[$key][1] as $k => $v )
                $rows[$key][1][$k] = trim( strip_tags( $v ) );
            $rows[$key][1] = implode( " ", $rows[$key][1] );
        }

        return ( !empty( $rows ) )? $rows: false;
		return $src;
    }

}