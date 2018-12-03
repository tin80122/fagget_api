<?php 
namespace App\Library;

Class Encryption
{
 private $aes_key;
 private $aes_iv;

 function __construct($hash_string='xg-secret-key')
 {
   //$hash_string = 'xg-secret-key'; // 可以由外部帶入
   if(is_null($hash_string)) {
     return false;
   }
   $hash = hash('SHA384', $hash_string, true);
   $this->aes_key = substr($hash, 0, 32);
   $this->aes_iv = substr($hash, 32, 16);
 }

 public function set_key($key)
 {
      $this->aes_key = $key;
}

public function set_iv($iv)
{
     $this->aes_iv =$iv;
}

 public function encrypt($data)
 {

   return base64_encode(self::aes256_encrypt($data, $this->aes_key, $this->aes_iv));
 }

 // return false for failure
 public function decrypt($data)
 {
   return self::aes256_decrypt(base64_decode($data), $this->aes_key, $this->aes_iv);
 }

 public function net_encrypt($encrypt)
 {
         $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
         mcrypt_generic_init($td, $this->aes_key, $this->aes_iv);
         $encrypted = mcrypt_generic($td, $encrypt);
         $encode = base64_encode($encrypted);
         mcrypt_generic_deinit($td);
         mcrypt_module_close($td);
         return $encode;
 }

 public function net_decrypt($decrypt)
  {
          $decoded = base64_decode($decrypt);
          $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
          mcrypt_generic_init($td, $this->aes_key, $this->aes_iv);
          $decrypted = mdecrypt_generic($td, $decoded);
          mcrypt_generic_deinit($td);
          mcrypt_module_close($td);
          return trim($decrypted);
  }


 // this for AES-256
 private function check_key_and_iv_len($key, $iv)
 {
   if(32 !== strlen($key)) {
     return false;
   }
   if(16 !== strlen($iv)) {
     return false;
   }

   return true;
 }

 private function aes256_encrypt($data, $key, $iv)
 {
   if(!self::check_key_and_iv_len($key, $iv)) {
     return false;
   }

   $padding = 16 - (strlen($data) % 16);
   $data .= str_repeat(chr($padding), $padding);

   return mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, $iv);
 }

 private function aes256_decrypt($data, $key, $iv)
 {
   if(!self::check_key_and_iv_len($key, $iv)) {
     return false;
   }

   $data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, $iv);
   $padding = ord($data[strlen($data) - 1]);
   return substr($data, 0, -$padding);
 }
}
?>