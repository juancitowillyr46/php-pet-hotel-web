<?php
namespace App\BackOffice\Kennels\Domain\Entities;

use AutoMapperPlus\AutoMapperInterface;
use AutoMapperPlus\Configuration\AutoMapperConfigInterface;
use AutoMapperPlus\NameConverter\NamingConvention\CamelCaseNamingConvention;
use AutoMapperPlus\NameConverter\NamingConvention\SnakeCaseNamingConvention;

class KennelMapper
{
    public AutoMapperInterface $autoMapper;
    public AutoMapperConfigInterface $config;

    public function __construct(AutoMapperInterface $autoMapper)
    {
        $this->autoMapper = $autoMapper;
        $this->config = $this->autoMapper->getConfiguration();
        $this->registerMapping();
    }

    public function registerMapping()
    {
        $this->config->registerMapping('array', KennelDto::class)->withNamingConventions(
            new SnakeCaseNamingConvention(),
            new CamelCaseNamingConvention()
        )->forMember('activeName', function ($source) {
            return ($source['active'] == true)? 'SI' : 'NO';
        })->forMember('isBookedName', function ($source) {
            return ($source['is_booked'] == true)? 'SI' : 'NO';
        })->forMember('createdAt', function ($source) {
            $time = strtotime($source['created_at']);
            return date('d-m-Y H:i:s', $time);
        })->forMember('id', function($source){
            return $source['uuid'];
        });

    }
}