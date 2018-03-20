<?php if ( ! defined('BASEPATH')) exit('No se permite el acceso directo al script');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Md5
 *
 * @author mario
 */
class Md5 
{
    private static $output = false;
    private static $encrypt_method = "AES-256-CBC";
    private static $secret_key = '3971820895436283';
    private static $secret_iv = '3971820895436283';
    
    private static $active_php_7 = false;
    //put your code here
    
    public $ci;
    
    public function __construct() 
    {
        $this->ci= &get_instance();
        $this->ci->load->library('encrypt');
    }
    
    public function cifrar($string)
    {
        
        return $this->ci->encrypt->encode($string);
//        echo $encriptado;
        /*$key='Hh819AsdrWln791YuFGHqWe185vcmvbaSdGG6723';
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
        return $encrypted;*/

//        if(self::$active_php_7)
//        {
//            $key = hash('sha256', '3971820895436283');
//            $iv = substr(hash('sha256', '3971820895436283'), 0, 16);
//
//            $output = openssl_encrypt($string, self::$encrypt_method, $key, 0, $iv);
//            return base64_encode($output);
//        }
//        else
//        {
//            $key='Hh819AsdrWln791YuFGHqWe185vcmvbaSdGG6723';
//            $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
//            return $encrypted;
//        }
    }
    
        
    public function descifrar($string)
    {
        return $this->ci->encrypt->decode($string);
        /*
        $key='Hh819AsdrWln791YuFGHqWe185vcmvbaSdGG6723';
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        return $decrypted;*/
        
//        if(self::$active_php_7)
//        {
//            $key = hash('sha256', '3971820895436283');
//            $iv = substr(hash('sha256', '3971820895436283'), 0, 16);
//            return openssl_decrypt(base64_decode($string), self::$encrypt_method, $key, 0, $iv);
//        }
//        else
//        {
//            $key='Hh819AsdrWln791YuFGHqWe185vcmvbaSdGG6723';
//            $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
//            return $decrypted;
//        }
    }
}
