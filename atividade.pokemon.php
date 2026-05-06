<?php

class Pokemon
{
    public $nome;
    public $tipagem;
    public $nivel;
    public $experiencia;
    public $hp;
    public $atk;
    public $def;
    public $spe;
    public $iv_total;

    public function __construct($nome, $tipagem, $nivel) {
        $this->nome = $nome;
        $this->tipagem = $tipagem;
        $this->nivel = $nivel;
        $this->experiencia = 0;

        $iv_hp = rand(0, 31);
        $iv_atk = rand(0, 31);
        $iv_def = rand(0, 31);
        $iv_spe = rand(0, 31);
        
        $this->iv_total = $iv_hp + $iv_atk + $iv_def + $iv_spe;

        $this->hp = 20 + $iv_hp + ($this->nivel * 2);
        $this->atk = 5 + $iv_atk + ($this->nivel);
        $this->def = 5 + $iv_def + ($this->nivel);
        $this->spe = 5 + $iv_spe + ($this->nivel);
    }

    public function exibirDados() {
        print "\n=-=-=-=-=-=-=-=-=-=-=-=-=-=\n";
        print "POKÉDEX: {$this->nome}\n";
        print "Tipo: {$this->tipagem} | Nível: {$this->nivel}\n";
        print "Força Genética (IV Total): {$this->iv_total}\n";
        print "Stats: HP {$this->hp} | ATK {$this->atk} | DEF {$this->def} | SPE {$this->spe}\n";
        print "=-=-=-=-=-=-=-=-=-=-=-=-=-=\n";
        sleep(1);
    }

    public function batalhar()
    {
        $inimigo_id = rand(1, 5);
        $iv_inimigo = 0;
        $nome_inimigo = "";

        print "\nProcurando adversário no matinho...\n";
        sleep(2);

        switch($inimigo_id) {
            case 1: 
                $nome_inimigo = "Caterpie";
                $iv_inimigo = 10; 
                print "Um Caterpie selvagem apareceu! (tá fácil, po...)\n"; 
                break;
            case 2: 
                $nome_inimigo = "Geladeira Electrolux em promoção";
                $iv_inimigo = 40; 
                print "Uma Geladeira Electrolux Frost Free Inverter 410L Efficient com AutoSense Duplex Branca (IF46) por apenas R$3.000,00 com parcelas de até 6x sem juros apareceu!!!\n"; 
                break;
            case 3: 
                $nome_inimigo = "Relâmpago McQueen";
                $iv_inimigo = 70; 
                print "Um Relâmpago McQueen te ultrapassou! KACHOW\n"; 
                break;
            case 4: 
                $nome_inimigo = "Bill Gates";
                $iv_inimigo = 90; 
                print "Um Bill Gates apareceu para atualizar seu Windows 11!\n"; 
                break;
            case 5: 
                $nome_inimigo = "SHINY MEGA RAYQUAZA COM 6 IVS PERFEITOS";
                $iv_inimigo = 186;
                print "O CÉU SE ABRIU! Um SHINY MEGA RAYQUAZA COM 6 IVS PERFEITOS apareceu!!!\n"; 
                break;
        }

        sleep(1);
        print "{$this->nome}, eu escolho você!\n";
        sleep(1);
        
        print "Calculando a porradaria";
        for($i=0; $i<3; $i++) {
            print ".";
            sleep(1);
        }
        print "\n";

        $chance_vitoria = rand(0, $this->iv_total);
        $chance_inimigo = rand(0, $iv_inimigo);

        if($chance_vitoria >= $chance_inimigo) {
            print "VITÓRIA! Você evaporou {$nome_inimigo}!\n";
            $this->ganharExperiencia(50);
        } else {
            print "DERROTA! {$this->nome} foi evaporado por {$nome_inimigo}.\n";
        }
    }

    public function ganharExperiencia($quantidade) {
        $this->experiencia += $quantidade;
        print "{$this->nome} ganhou {$quantidade} de XP!\n";
        if($this->experiencia >= 100) {
            sleep(1);
            $this->subirNivel();
        }
    }

    private function subirNivel() {
        $this->nivel++;
        $this->experiencia = 0;
        $this->hp += 5;
        $this->atk += 2;
        print "LEVEL UP! {$this->nome} subiu para o nível {$this->nivel}!\n";
    }
}

$pokemons_usuario = [];
for($i = 1; $i <= 2; $i++) {
    $nome = readline("Escolha o nome do seu {$i}º Pokémon: ");
    $tipo = readline("Qual a tipagem dele? ");
    $pokemons_usuario[] = new Pokemon($nome, $tipo, 50);
    print "Pokémon {$nome} pronto para a briga!\n\n";
}

foreach($pokemons_usuario as $p) {
    $p->exibirDados();
    $p->batalhar();
    print "\n";
}
