<?php
namespace App\BackOffice\Pets\Domain\Entities;

use AutoMapperPlus\AutoMapperInterface;
use AutoMapperPlus\Configuration\AutoMapperConfigInterface;
use AutoMapperPlus\NameConverter\NamingConvention\CamelCaseNamingConvention;
use AutoMapperPlus\NameConverter\NamingConvention\SnakeCaseNamingConvention;

class PetMapper
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
        $this->config->registerMapping('array', PetDto::class)->withNamingConventions(
            new SnakeCaseNamingConvention(),
            new CamelCaseNamingConvention()
        )->forMember('activeName', function ($source) {
            return (boolval($source['active']) == 1)? 'SI' : 'NO';
        })->forMember('createdAt', function ($source) {
            $time = strtotime($source['created_at']);
            return date('d-m-Y H:i:s', $time);
        })->forMember('id', function($source){
            return $source['uuid'];
        })->forMember('initZeal', function($source){
            return ($source['init_zeal'] != null)?  $source['init_zeal'] :  "";
        })->forMember('lastZeal', function($source){
            return ($source['last_zeal'] != null)?  $source['last_zeal'] :  "";
        });

    }
}