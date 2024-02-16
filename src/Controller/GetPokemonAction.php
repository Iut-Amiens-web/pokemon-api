<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GetPokemonAction extends AbstractController
{
    public function __invoke(PokemonRepository $pr, $name)
    {
        $pokemon = [];

        $p = $pr->findOneBy(["name" => $name]);

        if ($p) {
            $pokemon = [];
            $pokemon["id"] = $p->getId();
            $pokemon["name"] = $p->getName();
            $pokemon["hp"] = $p->getHp();
            $pokemon["defense"] = $p->getDefense();
            $pokemon["attack"] = $p->getAttack();
            $pokemon["speed"] = $p->getSpeed();
            $pokemon["img"] = $p->getImg();
            $pokemon["special"] = $p->getSpecial();
            $pokemon["pp"] = $p->getPp();
            $pokemon["lvl"] = 100;

            $i = 0;
            foreach ($p->getPokemonLvls() as $clvl){
                foreach ($clvl->getMoves() as $move){
                    $pokemon["moves"][$i]["Id"] = $move->getId();
                    $pokemon["moves"][$i]["Name"] = $move->getName();
                    $pokemon["moves"][$i]["Type"] = $move->getType();
                    $pokemon["moves"][$i]["Power"] = $move->getPower();
                    $pokemon["moves"][$i]["Accuracy"] = $move->getAccuracy();
                    $pokemon["moves"][$i]["Pp"] = $move->getPp();
                    $i++;
                }
            }
        }


        return $this->json($pokemon, 200);
    }
}
