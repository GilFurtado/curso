<?php

namespace CodeExperts\Security;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Pimple\Container;

class Token
{

    /**
     * @var Builder
     */
    private $builder;

    /**
     * @var Sha256
     */
    private $signer;

    /**
     * @var Container
     */
    private $app;

    /**
     * @var array
     */
    private $data;

    public function __construct(Builder $builder, Sha256 $signer = null)
    {
        $this->builder = $builder;
        $this->signer = $signer;
    }

    public function setApplication(Container $app)
    {
        $this->app = $app;
    }

    public function setPayloadData($data)
    {
        $this->data = $data;
    }

    public function generateToken()
    {
        $token = $this->builder
            ->issuedBy($this->app['iss'])
            ->canOnlyBeUsedBy($_SERVER['REMOTE_ADDR'])
            ->identifiedBy('4f11g23a12aa', true)
            ->issuedAt(time())
            ->canOnlyBeUsedAfter(time() + 60)
            ->expiresAt(time() + $this->app['expires']);

        foreach ($this->data as $k => $d){
            $token->with($k, $d);
        }

        if(!is_null($this->signer)){
            $token->sign($this->signer, $this->app['secret']);
        }

        return $token->getToken();
    }

}