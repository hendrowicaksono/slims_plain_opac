<?php

if (!defined('DB_HOST')) { define('DB_HOST', 'localhost'); }
if (!defined('DB_PORT')) { define('DB_PORT', '3306'); }
if (!defined('DB_HOST_PORT')) { define('DB_HOST_PORT', DB_HOST.':'.DB_PORT); }
if (!defined('DB_NAME')) { define('DB_NAME', 'senayandb'); }
if (!defined('DB_USERNAME')) { define('DB_USERNAME', 'senayanuser'); }
if (!defined('DB_PASSWORD')) { define('DB_PASSWORD', 'password_senayanuser'); }

define('SLIMS_URL', 'http://127.0.0.1/s3st15_matoa/');

class hwMysql
{

    protected $link;
    protected $db;
    protected $sql;
    protected $query;
    protected $result;
    
    function __construct()
    {
        $this->link = mysql_connect(DB_HOST_PORT, DB_USERNAME, DB_PASSWORD);
        $this->db = mysql_select_db(DB_NAME, $this->link);
    }
    
    function public set_sql ($sqlStatement)
    {
        $this->sql = $sqlStatement;
    }
    
    function public set_query()
    {
        $this->query = mysql_query($this->sql, $this->link);
    }
}

#if(! $xml = simplexml_load_file('http://127.0.0.1/s3st15_matoa/index.php?resultXML=true')) {
if(! $xml = simplexml_load_file(''.SLIMS_URL.'index.php?resultXML=true')) {
    echo 'unable to load XML file';
}
else {
    echo 'XML file loaded successfully<br />';
}

foreach( $xml as $mods ) {
    echo 'Title: '.$mods->titleInfo->title.'<br />';
    #echo 'Surname: '.$user->surname.'<br />';
} 


?>