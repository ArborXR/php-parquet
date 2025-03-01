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

/**
 * Represents a element inside a schema definition.
 *  - if it is a group (inner node) then type is undefined and num_children is defined
 *  - if it is a primitive type (leaf) then type is defined and num_children is undefined
 * the nodes are listed in depth first traversal order.
 */
class SchemaElement
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'type',
            'isRequired' => false,
            'type' => TType::I32,
            'class' => '\codename\parquet\format\Type',
        ),
        2 => array(
            'var' => 'type_length',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        3 => array(
            'var' => 'repetition_type',
            'isRequired' => false,
            'type' => TType::I32,
            'class' => '\codename\parquet\format\FieldRepetitionType',
        ),
        4 => array(
            'var' => 'name',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        5 => array(
            'var' => 'num_children',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        6 => array(
            'var' => 'converted_type',
            'isRequired' => false,
            'type' => TType::I32,
            'class' => '\codename\parquet\format\ConvertedType',
        ),
        7 => array(
            'var' => 'scale',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        8 => array(
            'var' => 'precision',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        9 => array(
            'var' => 'field_id',
            'isRequired' => false,
            'type' => TType::I32,
        ),
        10 => array(
            'var' => 'logicalType',
            'isRequired' => false,
            'type' => TType::STRUCT,
            'class' => '\codename\parquet\format\LogicalType',
        ),
    );

    /**
     * Data type for this field. Not set if the current element is a non-leaf node
     * 
     * @var int
     */
    public $type = null;
    /**
     * If type is FIXED_LEN_BYTE_ARRAY, this is the byte length of the vales.
     * Otherwise, if specified, this is the maximum bit length to store any of the values.
     * (e.g. a low cardinality INT col could have this set to 3).  Note that this is
     * in the schema, and therefore fixed for the entire file.
     * 
     * @var int
     */
    public $type_length = null;
    /**
     * repetition of the field. The root of the schema does not have a repetition_type.
     * All other nodes must have one
     * 
     * @var int
     */
    public $repetition_type = null;
    /**
     * Name of the field in the schema
     * 
     * @var string
     */
    public $name = null;
    /**
     * Nested fields.  Since thrift does not support nested fields,
     * the nesting is flattened to a single list by a depth-first traversal.
     * The children count is used to construct the nested relationship.
     * This field is not set when the element is a primitive type
     * 
     * @var int
     */
    public $num_children = null;
    /**
     * DEPRECATED: When the schema is the result of a conversion from another model.
     * Used to record the original type to help with cross conversion.
     * 
     * This is superseded by logicalType.
     * 
     * @var int
     */
    public $converted_type = null;
    /**
     * DEPRECATED: Used when this column contains decimal data.
     * See the DECIMAL converted type for more details.
     * 
     * This is superseded by using the DecimalType annotation in logicalType.
     * 
     * @var int
     */
    public $scale = null;
    /**
     * @var int
     */
    public $precision = null;
    /**
     * When the original schema supports field ids, this will save the
     * original field id in the parquet schema
     * 
     * @var int
     */
    public $field_id = null;
    /**
     * The logical type of this SchemaElement
     * 
     * LogicalType replaces ConvertedType, but ConvertedType is still required
     * for some logical types to ensure forward-compatibility in format v1.
     * 
     * @var \codename\parquet\format\LogicalType
     */
    public $logicalType = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['type'])) {
                $this->type = $vals['type'];
            }
            if (isset($vals['type_length'])) {
                $this->type_length = $vals['type_length'];
            }
            if (isset($vals['repetition_type'])) {
                $this->repetition_type = $vals['repetition_type'];
            }
            if (isset($vals['name'])) {
                $this->name = $vals['name'];
            }
            if (isset($vals['num_children'])) {
                $this->num_children = $vals['num_children'];
            }
            if (isset($vals['converted_type'])) {
                $this->converted_type = $vals['converted_type'];
            }
            if (isset($vals['scale'])) {
                $this->scale = $vals['scale'];
            }
            if (isset($vals['precision'])) {
                $this->precision = $vals['precision'];
            }
            if (isset($vals['field_id'])) {
                $this->field_id = $vals['field_id'];
            }
            if (isset($vals['logicalType'])) {
                $this->logicalType = $vals['logicalType'];
            }
        }
    }

    public function getName()
    {
        return 'SchemaElement';
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
                        $xfer += $input->readI32($this->type);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->type_length);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->repetition_type);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->name);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->num_children);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 6:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->converted_type);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 7:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->scale);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 8:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->precision);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 9:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->field_id);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 10:
                    if ($ftype == TType::STRUCT) {
                        $this->logicalType = new \codename\parquet\format\LogicalType();
                        $xfer += $this->logicalType->read($input);
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
        $xfer += $output->writeStructBegin('SchemaElement');
        if ($this->type !== null) {
            $xfer += $output->writeFieldBegin('type', TType::I32, 1);
            $xfer += $output->writeI32($this->type);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->type_length !== null) {
            $xfer += $output->writeFieldBegin('type_length', TType::I32, 2);
            $xfer += $output->writeI32($this->type_length);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->repetition_type !== null) {
            $xfer += $output->writeFieldBegin('repetition_type', TType::I32, 3);
            $xfer += $output->writeI32($this->repetition_type);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->name !== null) {
            $xfer += $output->writeFieldBegin('name', TType::STRING, 4);
            $xfer += $output->writeString($this->name);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->num_children !== null) {
            $xfer += $output->writeFieldBegin('num_children', TType::I32, 5);
            $xfer += $output->writeI32($this->num_children);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->converted_type !== null) {
            $xfer += $output->writeFieldBegin('converted_type', TType::I32, 6);
            $xfer += $output->writeI32($this->converted_type);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->scale !== null) {
            $xfer += $output->writeFieldBegin('scale', TType::I32, 7);
            $xfer += $output->writeI32($this->scale);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->precision !== null) {
            $xfer += $output->writeFieldBegin('precision', TType::I32, 8);
            $xfer += $output->writeI32($this->precision);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->field_id !== null) {
            $xfer += $output->writeFieldBegin('field_id', TType::I32, 9);
            $xfer += $output->writeI32($this->field_id);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->logicalType !== null) {
            if (!is_object($this->logicalType)) {
                throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
            }
            $xfer += $output->writeFieldBegin('logicalType', TType::STRUCT, 10);
            $xfer += $this->logicalType->write($output);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
