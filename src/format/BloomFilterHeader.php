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
 * Bloom filter header is stored at beginning of Bloom filter data of each column
 * and followed by its bitset.
 * 
 */
class BloomFilterHeader
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'numBytes',
            'isRequired' => true,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'algorithm',
            'isRequired' => true,
            'type' => TType::STRUCT,
            'class' => '\codename\parquet\format\BloomFilterAlgorithm',
        ),
        3 => array(
            'var' => 'hash',
            'isRequired' => true,
            'type' => TType::STRUCT,
            'class' => '\codename\parquet\format\BloomFilterHash',
        ),
        4 => array(
            'var' => 'compression',
            'isRequired' => true,
            'type' => TType::STRUCT,
            'class' => '\codename\parquet\format\BloomFilterCompression',
        ),
    );

    /**
     * The size of bitset in bytes *
     * 
     * @var int
     */
    public $numBytes = null;
    /**
     * The algorithm for setting bits. *
     * 
     * @var \codename\parquet\format\BloomFilterAlgorithm
     */
    public $algorithm = null;
    /**
     * The hash function used for Bloom filter. *
     * 
     * @var \codename\parquet\format\BloomFilterHash
     */
    public $hash = null;
    /**
     * The compression used in the Bloom filter *
     * 
     * @var \codename\parquet\format\BloomFilterCompression
     */
    public $compression = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['numBytes'])) {
                $this->numBytes = $vals['numBytes'];
            }
            if (isset($vals['algorithm'])) {
                $this->algorithm = $vals['algorithm'];
            }
            if (isset($vals['hash'])) {
                $this->hash = $vals['hash'];
            }
            if (isset($vals['compression'])) {
                $this->compression = $vals['compression'];
            }
        }
    }

    public function getName()
    {
        return 'BloomFilterHeader';
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
                        $xfer += $input->readI32($this->numBytes);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRUCT) {
                        $this->algorithm = new \codename\parquet\format\BloomFilterAlgorithm();
                        $xfer += $this->algorithm->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRUCT) {
                        $this->hash = new \codename\parquet\format\BloomFilterHash();
                        $xfer += $this->hash->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRUCT) {
                        $this->compression = new \codename\parquet\format\BloomFilterCompression();
                        $xfer += $this->compression->read($input);
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
        $xfer += $output->writeStructBegin('BloomFilterHeader');
        if ($this->numBytes !== null) {
            $xfer += $output->writeFieldBegin('numBytes', TType::I32, 1);
            $xfer += $output->writeI32($this->numBytes);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->algorithm !== null) {
            if (!is_object($this->algorithm)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('algorithm', TType::STRUCT, 2);
            $xfer += $this->algorithm->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->hash !== null) {
            if (!is_object($this->hash)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('hash', TType::STRUCT, 3);
            $xfer += $this->hash->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->compression !== null) {
            if (!is_object($this->compression)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('compression', TType::STRUCT, 4);
            $xfer += $this->compression->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
