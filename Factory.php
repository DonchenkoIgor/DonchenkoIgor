<?php

class HeroFactory
{
    public static function createWarrior()
    {
        return new Warrior();
    }

    public static function createMage()
    {
        return new Mage();
    }

    public static function createArcher()
    {
        return new Archer();
    }
}

class Hero
{
    protected $health;
    protected $stamina;
    protected $weapon;
    protected $damage;

    public function __construct(int $health, int $stamina, string $weapon, int $damage)
    {
        $this->health = $health;
        $this->stamina = $stamina;
        $this->weapon = $weapon;
        $this->damage = $damage;
    }

    public function attack()
    {
        return "Герой атакує за допомогою {$this->weapon} ";
    }

    public function defend()
    {
        return "Герой захищається";
    }

    public function getHealth(): int|float
    {
        return $this->health;
    }

    public function setHealth($health)
    {
        $this->health = $health;
    }

    public function getStamina(): int|float
    {
        return $this->stamina;
    }

    public function getWeapon(): string
    {
        return $this->weapon;
    }

    public function getDamage(): int|float
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

$warrior = HeroFactory::createWarrior();
echo "
Воїн: Здоров'я - {$warrior->getHealth()}, <br>
Витривалість - {$warrior->getStamina()}, <br>
Зброя - {$warrior->getWeapon()}, <br>
Урон - {$warrior->getDamage()} . <br>";
echo $warrior->attack() . "<br>"."<br>";

$mage = HeroFactory::createMage();
echo "
Маг: Здоров'я - {$mage->getHealth()}, <br>
Витривалість - {$mage->getStamina()}, <br>
Зброя - {$mage->getWeapon()}, <br>
Урон - {$mage->getDamage()} . <br>";
echo $mage->attack() . "<br>"."<br>";

$archer = HeroFactory::createArcher();
echo "
Лучник: Здоров'я - {$archer->getHealth()}, <br>
Витривалість - {$archer->getStamina()}, <br>
Зброя - {$archer->getWeapon()}, <br>
Урон - {$archer->getDamage()} . <br>";
echo $archer->attack() . "<br>"."<br>";
