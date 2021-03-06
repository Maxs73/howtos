<?php

namespace Progetto\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

/**
 * Progetti
 *
 * @ORM\Table(name="progetti")
 * @ORM\Entity(repositoryClass="Progetto\Entity\Repository\ProgettoRepository")
 */
class Progetto
{

      public function __construct($codice, $titolo, $utente, $descrizione) {
          $this->codice = $codice;
          $this->titolo = $titolo;
          $this->utente = $utente;
          $this->descrizione = $descrizione;
      }
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codice", type="string", nullable=false)
     */
    private $codice;

    /**
     * @var string
     *
     * @ORM\Column(name="titolo", type="string", nullable=false)
     */
    private $titolo;

    /**
     * @var string
     *
     * @ORM\Column(name="utente", type="string", nullable=false)
     */
    private $utente;

    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="text", nullable=true)
     */
    private $descrizione;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codice
     *
     * @param string $codice
     *
     * @return Progetto
     */
    public function setCodice($codice)
    {
        $this->codice = $codice;

        return $this;
    }

    /**
     * Get codice
     *
     * @return string
     */
    public function getCodice()
    {
        return $this->codice;
    }

    /**
     * Set titolo
     *
     * @param string $titolo
     *
     * @return Progetto
     */
    public function setTitolo($titolo)
    {
        $this->titolo = $titolo;

        return $this;
    }

    /**
     * Get titolo
     *
     * @return string
     */
    public function getTitolo()
    {
        return $this->titolo;
    }

    /**
     * Set utente
     *
     * @param string $utente
     *
     * @return Progetto
     */
    public function setUtente($utente)
    {
        $this->utente = $utente;

        return $this;
    }

    /**
     * Get utente
     *
     * @return string
     */
    public function getUtente()
    {
        return $this->utente;
    }

    /**
     * Set descrizione
     *
     * @param string $descrizione
     *
     * @return Progetto
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;

        return $this;
    }

    /**
     * Get descrizione
     *
     * @return string
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }
}
