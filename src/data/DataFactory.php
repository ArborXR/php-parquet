<?php
namespace codename\parquet\data;

use Exception;

use codename\parquet\CompressionMethod;

use codename\parquet\format\CompressionCodec;

/**
 * [DataFactory description]
 */
class DataFactory
{
  /**
   * [CompressionMethodToCodec description]
   * @var array
   */
  const CompressionMethodToCodec = [
    CompressionMethod::None => CompressionCodec::UNCOMPRESSED,
    CompressionMethod::Gzip => CompressionCodec::GZIP,
    CompressionMethod::Snappy => CompressionCodec::SNAPPY,
  ];

  /**
   * [GetThriftCompression description]
   * @param  int $method [description]
   * @return int         [description]
   */
  public static function GetThriftCompression(int $method): int
  {
    $thriftCodec = static::CompressionMethodToCodec[$method] ?? null;
    if($thriftCodec === null) {
      throw new Exception("codec '{$method}' is not supported");
    }
    return $thriftCodec;
  }
}
