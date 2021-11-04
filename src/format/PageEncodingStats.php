<?php
namespace codename\parquet\format;

/**
 * Autogenerated by Thrift Compiler (0.13.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

/**
 * statistics of a given page type and encoding
 */
class PageEncodingStats
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'page_type',
            'isRequired' => true,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'encoding',
            'isRequired' => true,
            'type' => TType::I32,
        ),
        3 => array(
            'var' => 'count',
            'isRequired' => true,
            'type' => TType::I32,
        ),
    );

    /**
     * the page type (data/dic/...) *
     * 
     * @var int
     */
    public $page_type = null;
    /**
     * encoding of the page *
     * 
     * @var int
     */
    public $encoding = null;
    /**
     * number of pages of this type with this encoding *
     * 
     * @var int
     */
    public $count = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['page_type'])) {
                $this->page_type = $vals['page_type'];
            }
            if (isset($vals['encoding'])) {
                $this->encoding = $vals['encoding'];
            }
            if (isset($vals['count'])) {
                $this->count = $vals['count'];
            }
        }
    }

    public function getName()
    {
        return 'PageEncodingStats';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->page_type);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->encoding);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->count);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('PageEncodingStats');
        if ($this->page_type !== null) {
            $xfer += $output->writeFieldBegin('page_type', TType::I32, 1);
            $xfer += $output->writeI32($this->page_type);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->encoding !== null) {
            $xfer += $output->writeFieldBegin('encoding', TType::I32, 2);
            $xfer += $output->writeI32($this->encoding);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->count !== null) {
            $xfer += $output->writeFieldBegin('count', TType::I32, 3);
            $xfer += $output->writeI32($this->count);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
