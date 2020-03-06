<?php
/**
 * This file is part of hcloud-php which is released under MIT.
 * See file LICENSE or go to https://opensource.org/licenses/MIT for full license details.
 */

namespace Src;

class Cloud {
    
    /**
     * Authorization header
     * See: https://docs.hetzner.cloud/#header-authentication-1
     *
     * @var string $header
     */
    private $header;
    
    /**
     * @var Cloud $instance
     */
    private static $instance;
    
    /**
     * Cloud constructor.
     * See: https://docs.hetzner.cloud/#header-authentication-1
     *
     * @param $apiToken
     */
    private function __construct($apiToken) {
        $this->header = 'Authorization: Bearer ' . $apiToken;
    }
    
    /**
     * Get or create a new Instance
     *
     * @param string $apiToken
     *
     * @return Cloud
     *
     * @throws \Exception
     */
    public static function getInstance($apiToken = '') {
        if ($apiToken) {
            return self::$instance = new self($apiToken);
        } elseif (!empty(self::$instance)) {
            return self::$instance;
        } else {
            throw new \Exception('Api token must be set!');
        }
    }
    
    /**
     * @param $url
     * @param $post
     *
     * @return mixed
     */
    public function sendPostRequest($url, $post) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $this->header));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
    }
    
    /**
     * @param $url
     *
     * @return mixed
     */
    public function sendGetRequest($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $this->header));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
    }
    
    /**
     * @param $url
     *
     * @return mixed
     */
    public function sendDeleteRequest($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $this->header));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
    }
    
    /**
     * @param $url
     * @param $data
     *
     * @return mixed
     */
    public function sendPutRequest($url, $data) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $this->header));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        
        return $result;
    }
}