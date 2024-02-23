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
            $pokemon["type"] = $p->getType();
            $pokemon["pp"] = $p->getPp();
            $pokemon["lvl"] = 100;

            $i = 0;
            foreach ($p->getPokemonLvls() as $clvl){
                foreach ($clvl->getMoves() as $move){
                    $pokemon["moves"][$i]["id"] = $move->getId();
                    $pokemon["moves"][$i]["name"] = $move->getName();
                    $pokemon["moves"][$i]["type"] = $move->getType();
                    $pokemon["moves"][$i]["power"] = $move->getPower();
                    $pokemon["moves"][$i]["accuracy"] = $move->getAccuracy();
                    $pokemon["moves"][$i]["pp"] = $move->getPp();
                    $i++;
                }
            }
        }


        return $this->json($pokemon, 200);
    }
}
