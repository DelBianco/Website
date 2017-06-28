<?php
/**
 * Created by PhpStorm.
 * User: aptor
 * Date: 17/08/16
 * Time: 11:43
 */
namespace TemplateRenderer;


use Twig_Environment;
use Twig_Extension_Debug;
use Twig_Loader_Filesystem;
use Twig_SimpleFilter;

use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\MessageSelector;

// Include our newly created class
// Twig's autoloader will take care of loading required classes

class TemplateRenderer
{
    public $loader; // Instance of Twig_Loader_Filesystem
    public $environment; // Instance of Twig_Environment

    public function __construct($locale = 'pt', $envOptions = array(), $templateDirs = array())
    {
        if (strlen($locale) > 2) {
            $locale = 'pt';
        }
        $_SESSION['locale'] = $locale;
        if ($locale == 'pt')
        {
            $_SESSION['lang'] = 'pt_BR';
        }

        if ($locale == 'en')
        {
            $_SESSION['lang'] = 'en_US';
        }

        // Merge default options
        // You may want to change these settings
        $envOptions += array(
            'debug' => true,
            'charset' => 'utf-8',
            //'cache' => './cache', // Store cached files under cache directory
            'strict_variables' => true,
            'locale' => $locale
        );
        $templateDirs = array_merge(
            array('./views'), // Base directory with all templates
            $templateDirs
        );
        $this->loader = new Twig_Loader_Filesystem($templateDirs);
        $this->environment = new Twig_Environment($this->loader, $envOptions);
        $this->environment->addExtension(new Twig_Extension_Debug());
        $this->addFilters();
    }

    public function render($templateFile, array $variables)
    {
        return $this->environment->render($templateFile, $variables);
    }

    /**
     * @return Twig_Environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param Twig_Environment $environment
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
    }

    /**
     * Adiciona os Filtros criados para o twig
     */
    public function addFilters()
    {
        // an anonymous function
        $filter = new Twig_SimpleFilter('trans', function ($string) {
            $translator = new Translator($_SESSION['lang'], new MessageSelector());
            $translator->addLoader('yaml', new YamlFileLoader());
            $translator->addResource('yaml', 'translations/translation_en.yaml', 'en_US');
            $translator->addResource('yaml', 'translations/translation_pt.yaml', 'pt_BR');
            $translator->setFallbackLocales(array('pt'));

            return $translator->trans($string);
        });
        $this->environment->addFilter($filter);
    }
}
