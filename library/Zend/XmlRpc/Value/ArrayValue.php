<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_XmlRpc
 */

namespace Zend\XmlRpc\Value;

/**
 * @category   Zend
 * @package    Zend_XmlRpc
 * @subpackage Value
 */
class ArrayValue extends AbstractCollection
{
    /**
     * Set the value of an array native type
     *
     * @param array $value
     */
    public function __construct($value)
    {
        $this->_type = self::XMLRPC_TYPE_ARRAY;
        parent::__construct($value);
    }


    /**
     * Generate the XML code that represent an array native MXL-RPC value
     *
     * @return void
     */
    protected function _generateXml()
    {
        $generator = $this->getGenerator();
        $generator->openElement('value')
                  ->openElement('array')
                  ->openElement('data');

        if (is_array($this->_value)) {
            foreach ($this->_value as $val) {
                $val->generateXml();
            }
        }
        $generator->closeElement('data')
                  ->closeElement('array')
                  ->closeElement('value');
    }
}

