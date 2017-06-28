<?php
/**
 * Created by PhpStorm.
 * User: aptor
 * Date: 28/11/16
 * Time: 15:47
 */

namespace Controllers;

use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\MessageSelector;
use TemplateRenderer\TemplateRenderer;


class Controller
{

    private $translator;

    public function __construct()
    {

    }

    public function render($twig, $arr, $locale = 'pt_BR'){
        $renderer = new TemplateRenderer($locale);
        return $renderer->render($twig, $arr);
    }

    public function renderJSON($arr){
        return json_encode($arr);
    }

    public function getTranslator(){
        $this->translator = new Translator('en_US', new MessageSelector());

        $this->translator->addLoader('xliff', new XliffFileLoader());
        $this->translator->addResource('xliff', 'translations/translation.xliff', 'en_US');
        $this->translator->setFallbackLocales(array('pt'));
        return $this->translator;
    }
}