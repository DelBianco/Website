<?php
/**
 * Created by PhpStorm.
 * User: aptor
 * Date: 22/08/16
 * Time: 10:31
 */

namespace Model;

class Programa
{
    /**
     * @var $itens array
     */
    private $itens = array();

    /**
     * @var array
     */
    private $itensRaw = array();

    /**
     * Programa constructor.
     */
    public function __construct()
    {
        $json_file = file_get_contents('resources/programa.json');
        $dias = json_decode($json_file, true);
        $this->itensRaw = $dias;
    }

    /**
     * @return array
     */
    public function getItensRaw(){
        return $this->itensRaw;
    }

    /**
     * @return array
     */
    public function getItens()
    {
        return $this->itens;
    }

    /**
     * @param array $itens
     */
    public function setItens($itens)
    {
        $this->itens = $itens;
    }
}