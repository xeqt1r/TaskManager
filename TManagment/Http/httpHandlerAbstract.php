<?php
/**
 * Created by PhpStorm.
 * User: hvasi
 * Date: 18.11.2018 г.
 * Time: 12:53
 */

namespace TManagment\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;

abstract class httpHandlerAbstract
{

    /**
     * @var TemplateInterface
     */
    private $template;

    protected $binder;


    public function __construct(TemplateInterface $template, DataBinderInterface $dataBinder)
    {
        $this->template = $template;
        $this->binder = $dataBinder;
    }


    public  function render(string $templateName,$data = null)
    {
        $this->template->render($templateName,$data);

    }
    public function redirect(string $url)
    {
        header("Location:$url");
        exit;
    }



}