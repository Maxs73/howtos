<?php
namespace Progetto\Service;

use Progetto\Entity\progetto;

class ProgettoService {

    private $entityManager;
    private $ProgettoRepository;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
        $this->ProgettoRepository = $entityManager->getRepository('Progetto\Entity\Progetto');
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

    public function creaNuovoprogetto(array $dati) {
        $progetto = new progetto(
            $dati['codice'],
            $dati['utente'],
            $dati['descrizione']
        );

        $this->entityManager->persist($progetto);
        $this->entityManager->flush();

        return $progetto;
    }

    public function elimina(progetto $progetto) {
        $this->entityManager->remove($progetto);
        $this->entityManager->flush();
    }


}
