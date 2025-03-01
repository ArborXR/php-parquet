<?php
namespace codename\parquet\format;

/**
 * Autogenerated by Thrift Compiler (0.15.0)
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

class ColumnCryptoMetaData
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'ENCRYPTION_WITH_FOOTER_KEY',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\codename\parquet\format\EncryptionWithFooterKey',
        ),
        2 => array(
            'var' => 'ENCRYPTION_WITH_COLUMN_KEY',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\codename\parquet\format\EncryptionWithColumnKey',
        ),
    );

    /**
     * @var \codename\parquet\format\EncryptionWithFooterKey
     */
    public $ENCRYPTION_WITH_FOOTER_KEY = null;
    /**
     * @var \codename\parquet\format\EncryptionWithColumnKey
     */
    public $ENCRYPTION_WITH_COLUMN_KEY = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['ENCRYPTION_WITH_FOOTER_KEY'])) {
                $this->ENCRYPTION_WITH_FOOTER_KEY = $vals['ENCRYPTION_WITH_FOOTER_KEY'];
            }
            if (isset($vals['ENCRYPTION_WITH_COLUMN_KEY'])) {
                $this->ENCRYPTION_WITH_COLUMN_KEY = $vals['ENCRYPTION_WITH_COLUMN_KEY'];
            }
        }
    }

    public function getName()
    {
        return 'ColumnCryptoMetaData';
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
                    if ($ftype == TType::STRUCT) {
                        $this->ENCRYPTION_WITH_FOOTER_KEY = new \codename\parquet\format\EncryptionWithFooterKey();
                        $xfer += $this->ENCRYPTION_WITH_FOOTER_KEY->read($input);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRUCT) {
                        $this->ENCRYPTION_WITH_COLUMN_KEY = new \codename\parquet\format\EncryptionWithColumnKey();
                        $xfer += $this->ENCRYPTION_WITH_COLUMN_KEY->read($input);
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
        $xfer += $output->writeStructBegin('ColumnCryptoMetaData');
        if ($this->ENCRYPTION_WITH_FOOTER_KEY !== null) {
            if (!is_object($this->ENCRYPTION_WITH_FOOTER_KEY)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('ENCRYPTION_WITH_FOOTER_KEY', TType::STRUCT, 1);
            $xfer += $this->ENCRYPTION_WITH_FOOTER_KEY->write($output);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->ENCRYPTION_WITH_COLUMN_KEY !== null) {
            if (!is_object($this->ENCRYPTION_WITH_COLUMN_KEY)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('ENCRYPTION_WITH_COLUMN_KEY', TType::STRUCT, 2);
            $xfer += $this->ENCRYPTION_WITH_COLUMN_KEY->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
