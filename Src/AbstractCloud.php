<?php
/**
 * This file is part of hcloud-php which is released under MIT.
 * See file LICENSE or go to https://opensource.org/licenses/MIT for full license details.
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