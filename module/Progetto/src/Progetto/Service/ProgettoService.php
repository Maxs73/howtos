<?php
namespace Progetto\Service;

use Progetto\Entity\progetto;

class ProgettoService {

    private $entityManager;
    private $ProgettoRepository;
    private $userLogged;
    private $userMail;


    public function __construct($entityManager, $userLogged) {
        $this->entityManager = $entityManager;
        $this->ProgettoRepository = $entityManager->getRepository('Progetto\Entity\Progetto');
        $this->userLogged = $userLogged;
        $this->userMail = $this->userLogged->getIdentity()->getEmail();
    }

    public function getProgettoInEvidenza() {
        return $this->ProgettoRepository->findAll();
    }

    public function getProgetto($codice) {
        return $this->ProgettoRepository->findOneByCodice($codice);
    }

    public function getListaProgetti() {
        return $this->ProgettoRepository->findAll();
    }

    public function getArrayProgetto($objprogetto) {
        $Progetto = [];
        foreach($objProgetto as $progetto) {
            $Progetto[$progetto->getId()] = $progetto->getCodice();
        }

        return $Progetto;
    }


    public function getUserProgetti() {
      $userMail = [];
      $userMail[] = $this->userMail;
      return $userMail;
    }

    public function creaNuovoprogetto(array $dati) {
      if ($this->userLogged->hasIdentity()) {
          echo $this->userLogged->getIdentity()->getEmail();

          $progetto = new progetto(
              $dati['codice'],
              $dati['titolo'],
              $this->userLogged->getIdentity()->getEmail(),
              $dati['descrizione']
          );

          $this->entityManager->persist($progetto);
          $this->entityManager->flush();

          return $progetto;
      }
      echo 'nessun utente';

    }

    public function elimina(progetto $progetto) {
        $this->entityManager->remove($progetto);
        $this->entityManager->flush();
    }


}
