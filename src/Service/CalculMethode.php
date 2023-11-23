<?php

namespace App\Service;

class CalculMethode
{
    public function CalculNote(array $notes): float
    {
        $totalCoeff = 0;
        $totalNote=0;

        foreach($notes as $note){
            $totalNote+=$note->getNote()*$note->getMatieres()->getCoefficient();
            $totalCoeff+=$note->getMatieres()->getCoefficient();
        }

        return $totalNote / $totalCoeff;
    }
} 
