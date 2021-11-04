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
 * Statistics per row group and per page
 * All fields are optional.
 */
class Statistics
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'max',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        2 => array(
            'var' => 'min',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'null_count',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        4 => array(
            'var' => 'distinct_count',
            'isRequired' => false,
            'type' => TType::I64,
        ),
        5 => array(
            'var' => 'max_value',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
        6 => array(
            'var' => 'min_value',
            'isRequired' => false,
            'type' => TType::STRING,
        ),
    );

    /**
     * DEPRECATED: min and max value of the column. Use min_value and max_value.
     * 
     * Values are encoded using PLAIN encoding, except that variable-length byte
     * arrays do not include a length prefix.
     * 
     * These fields encode min and max values determined by signed comparison
     * only. New files should use the correct order for a column's logical type
     * and store the values in the min_value and max_value fields.
     * 
     * To support older readers, these may be set when the column order is
     * signed.
     * 
     * @var string
     */
    public $max = null;
    /**
     * @var string
     */
    public $min = null;
    /**
     * count of null value in the column
     * 
     * @var int
     */
    public $null_count = null;
    /**
     * count of distinct values occurring
     * 
     * @var int
     */
    public $distinct_count = null;
    /**
     * Min and max values for the column, determined by its ColumnOrder.
     * 
     * Values are encoded using PLAIN encoding, except that variable-length byte
     * arrays do not include a length prefix.
     * 
     * @var string
     */
    public $max_value = null;
    /**
     * @var string
     */
    public $min_value = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['max'])) {
                $this->max = $vals['max'];
            }
            if (isset($vals['min'])) {
                $this->min = $vals['min'];
            }
            if (isset($vals['null_count'])) {
                $this->null_count = $vals['null_count'];
            }
            if (isset($vals['distinct_count'])) {
                $this->distinct_count = $vals['distinct_count'];
            }
            if (isset($vals['max_value'])) {
                $this->max_value = $vals['max_value'];
            }
            if (isset($vals['min_value'])) {
                $this->min_value = $vals['min_value'];
            }
        }
    }

    public function getName()
    {
        return 'Statistics';
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
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->max);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->min);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->null_count);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::I64) {
                        $xfer += $input->readI64($this->distinct_count);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->max_value);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->min_value);
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
        $xfer += $output->writeStructBegin('Statistics');
        if ($this->max !== null) {
            $xfer += $output->writeFieldBegin('max', TType::STRING, 1);
            $xfer += $output->writeString($this->max);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->min !== null) {
            $xfer += $output->writeFieldBegin('min', TType::STRING, 2);
            $xfer += $output->writeString($this->min);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->null_count !== null) {
            $xfer += $output->writeFieldBegin('null_count', TType::I64, 3);
            $xfer += $output->writeI64($this->null_count);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->distinct_count !== null) {
            $xfer += $output->writeFieldBegin('distinct_count', TType::I64, 4);
            $xfer += $output->writeI64($this->distinct_count);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->max_value !== null) {
            $xfer += $output->writeFieldBegin('max_value', TType::STRING, 5);
            $xfer += $output->writeString($this->max_value);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->min_value !== null) {
            $xfer += $output->writeFieldBegin('min_value', TType::STRING, 6);
            $xfer += $output->writeString($this->min_value);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
