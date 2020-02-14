<?php


namespace App\Service;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;
use ShortUUID\ShortUUID;

/**
 * Class UniqStringGenerator
 * @package Adimeo\FileManager\Service
 */
class UniqStringGenerator extends AbstractIdGenerator
{
    public function generate(EntityManager $em, $entity)
    {
        $uuid = new ShortUUID();
        return $uuid->uuid();
    }
}
