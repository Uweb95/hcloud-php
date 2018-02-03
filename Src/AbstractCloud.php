<?php
/**
 * Created by Uweb Software
 * Project: hcloud-php
 * License: MIT
 * File: AbstractCloud.php
 * Desc.: Abstract class for all action-classes
 * User: Nils Bartnick
 * Date: 03.02.2018
 * Time: 18:53
 */

namespace Src;

class AbstractCloud {
    
    /**
     * @var Cloud
     */
    protected $cloudInstance;
    
    /**
     * @param Cloud $cloudInstance
     */
    public function __construct($cloudInstance) {
        $this->cloudInstance = $cloudInstance;
    }
}