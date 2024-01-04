<?php

namespace CedricZiel\MattermostPhp\Test;

use PHPUnit\Framework\TestCase;
use Symfony\Component\PropertyInfo\Extractor\ConstructorExtractor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class MattermostTestCase extends TestCase
{
    protected Serializer $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $phpDocExtractor = new PhpDocExtractor();
        $typeExtractor = new PropertyInfoExtractor(
            typeExtractors: [
                new ConstructorExtractor([$phpDocExtractor]),
                $phpDocExtractor,
            ],
        );

        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);

        $this->serializer = new Serializer(
            [
                new BackedEnumNormalizer(),
                new ArrayDenormalizer(),
                new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter, null, $typeExtractor),
            ],
            [
                new JsonEncoder(),
            ],
        );
    }
}
