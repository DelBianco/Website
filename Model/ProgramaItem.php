<?php
/**
 * Created by PhpStorm.
 * User: aptor
 * Date: 26/04/17
 * Time: 16:46
 */
namespace Model;

class ProgramaItem
{

    /**
     * @var $titulo string
     */
    private $titulo;

    /**
     * @var $inicio \DateTime
     */
    private $inicio;

    /**
     * @var $final \DateTime
     */
    private $final;

    /**
     * @var $local string
     */
    private $local;

    /**
     * @var $info string
     */
    private $info;


    /**
     * ProgramaItem constructor.
     * @param $titulo
     * @param $inicio
     * @param null $final
     * @param null $local
     */
    public function __construct($titulo,$inicio,$final = null,$local = null){
        $this->titulo = $titulo;
        $this->inicio = $inicio;
        $this->final = $final;
        $this->local = $local;
    }

    /**
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return \DateTime
     */
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * @param \DateTime $inicio
     */
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;
    }

    /**
     * @return \DateTime
     */
    public function getFinal()
    {
        return $this->final;
    }

    /**
     * @param \DateTime $final
     */
    public function setFinal($final)
    {
        $this->final = $final;
    }

    /**
     * @return string
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param string $local
     */
    public function setLocal($local)
    {
        $this->local = $local;
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param string $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'titulo' => $this->getTitulo(),
            'inicio' => $this->getInicio(),
            'final' => $this->getFinal(),
            'local' => $this->getLocal(),
            'info' => $this->getInfo()
        );
    }
}