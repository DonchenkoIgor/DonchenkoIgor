<?php

class Hero
{
    protected $health;
    protected $stamina;
    protected $weapon;
    protected $damage;

    public function __construct(int $health,
                                int $stamina,
                                string $weapon,
                                int $damage)
    {
        $this->health=$health;
        $this->stamina=$stamina;
        $this->weapon=$weapon;
        $this->damage= $damage;
    }

    public function attack()
    {
        return "Герой атакує за допомогою {$this->weapon} ";
    }

    public function defend()
    {
        return "Герой захищається";
    }

    public function getHealth() : int|float
    {
        return $this->health;
    }

    public function setHealth($health)
    {
        $this->health = $health;
    }

    public function getStamina()  : int|float
    {
        return $this->stamina;
    }
    public function getWeapon() : string
    {
        return $this->weapon;
    }
    public function getDamage() : int|float
    {
        return $this->damage;
    }
}

class Warrior extends Hero
{
    public function __construct()
    {
        parent::__construct(155, 100, 'Меч', 30);
    }

    public function attack()
    {
        return parent::attack() . "<br>" . "Воїн готовий до бою ";
    }
}

class Mage extends Hero
{
    public function __construct()
    {
        parent::__construct(135, 70, 'Магія', 28);
    }
    public function attack()
    {
        return parent::attack() . "<br>" . "Маг викликає таємне заклинання";
    }
}

class Archer extends Hero
{
    public function __construct()
    {
        parent::__construct(120, 60, 'Лук', 32);
    }
    public function attack()
    {
        return parent::attack() . "<br>" . "Лучник випускає стрілу";
    }
}

$warrior = new Warrior();
echo "
Воїн: Здоров'я - {$warrior->getHealth()}, <br>
Витривалість - {$warrior->getStamina()}, <br>
Зброя - {$warrior->getWeapon()}, <br>
Урон - {$warrior->getDamage()} . <br>";
echo $warrior->attack() . "<br>"."<br>";

$mage = new Mage();
echo "
Маг: Здоров'я - {$mage->getHealth()}, <br>
Витривалість - {$mage->getStamina()}, <br>
Зброя - {$mage->getWeapon()}, <br>
Урон - {$mage->getDamage()} . <br>";
echo $mage->attack() . "<br>"."<br>";

$archer = new Archer();
echo "
Лучник: Здоров'я - {$archer->getHealth()}, <br>
Витривалість - {$archer->getStamina()}, <br>
Зброя - {$archer->getWeapon()}, <br>
Урон - {$archer->getDamage()} . <br>";
echo $archer->attack() . "<br>"."<br>";


class Battle
{
    private $hero1;
    private $hero2;

    public function __construct($hero1,$hero2)
    {
        $this->hero1 = $hero1;
        $this->hero2= $hero2;
    }

    public function fight()
    {
        while ($this->hero1->getHealth() > 0 && $this->hero2->getHealth() > 0)
        {
            echo "Герой 1 атакує: " . $this->hero1->attack() . "<br>"."<br>";
            echo "Герой 2 захищається: " . $this->hero2->defend(). "<br>";

            $damage = mt_rand(28, 32);
            $this->hero2->setHealth ($this->hero2->getHealth() - $damage);

            echo "Герой 2 втратив $damage здоров'я. Здоров'я героя 2: {$this->hero2->getHealth()}. <br>"."<br>";

            if ($this->hero2->getHealth() <=0){
                return $this->hero1;
            }

            echo "Герой 2 атакує: " . $this->hero2->attack() . "<br>"."<br>";
            echo "Герой 1 захищаєтсья: " . $this->hero1->defend(). "<br>";

            $damage = mt_rand(26, 33);
            $this->hero1->setHealth ($this->hero1->getHealth() - $damage);

            echo "Герой 1 втратив $damage здоров'я. Здоров'я героя 1: {$this->hero1->getHealth()}. <br>"."<br>";

            if ($this->hero1->getHealth() <=0){
                return $this->hero2;
            }
        }
    }
}

$warrior = new Warrior();
$mage = new Mage();
$archer = new Archer();

$battle = new Battle($archer, $mage);
$winner = $battle->fight();
echo "Бій закінчено , переможець: " . get_class($winner);