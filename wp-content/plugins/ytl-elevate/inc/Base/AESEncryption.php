<?php
/**
 * @package elevate
 */

namespace Inc\Base;
 
 class AESEncryption {

    protected $key;
    protected $data;
    protected $method;
    protected $iv;

    /**
     * Available OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING
     *
     * @var type $options
     */
    protected $options = 0;

    /**
     *
     * @param type $data
     * @param type $key
     * @param type $iv
     * @param type $blockSize
     * @param type $mode
     */
    public function __construct($data = null, $key = null, $iv = null, $blockSize = null, $mode = 'CBC') {
        $this->setData($data);
        $this->setKey($key);
        $this->setInitializationVector($iv);
        $this->setMethod($blockSize, $mode);
    }

    /**
     *
     * @param type $data
     */
    public function setData($data) {
        $this->data = $data;
    }

    /**
     *
     * @param type $key
     */
    public function setKey($key) {
        $this->key = $key;
    }

    /**
     * CBC 128 192 256
     * CBC-HMAC-SHA1 128 256
     * CBC-HMAC-SHA256 128 256
     * CFB 128 192 256
     * CFB1 128 192 256
     * CFB8 128 192 256
     * CTR 128 192 256
     * ECB 128 192 256
     * OFB 128 192 256
     * XTS 128 256
     * @param type $blockSize
     * @param type $mode
     */
    public function setMethod($blockSize, $mode = 'CBC') {
        if($blockSize==192 && in_array('', array('CBC-HMAC-SHA1','CBC-HMAC-SHA256','XTS'))){
            $this->method=null;
            return null;
        }
        $this->method = 'AES-' . $blockSize . '-' . $mode;
    }

    /**
     *
     * @param type $data
     */
    public function setInitializationVector($iv) {
        $this->iv = $iv;
    }

    /**
     *
     * @return boolean
     */
    public function validateParams() {
        if ($this->data != null &&
            $this->method != null ) {
            return true;
        } else {
            return FALSE;
        }
    }

    //it must be the same when you encrypt and decrypt
    protected function getIV() {
        return $this->iv;
    }

     /**
     * @return type
     * @throws Exception
     */
    public function encrypt() {
        if ($this->validateParams()) {
            return trim(openssl_encrypt($this->data, $this->method, $this->key, $this->options, $this->getIV()));
        } else {
            return null;
        }
    }

    /**
     *
     * @return type
     * @throws Exception
     */
    public function decrypt() {
        if ($this->validateParams()) {
           $ret=openssl_decrypt($this->data, $this->method, $this->key, $this->options, $this->getIV());

           return trim($ret);
        } else {
            return null;
        }
    }

}
