<?php

class HeroFactory
{
    public function createWarrior(string $weapon) : Warrior
    {
        return new Warrior($weapon);
    }
    public function createMage(string $weapon) : Mage
    {
        return new Mage($weapon);
    }
    public function createArcher(string $weapon) : Archer
    {
        return new Archer($weapon);
    }
}

class Hero
{
    protected $name;
    protected $health;
    protected $stamina;
    protected $weapon;
    protected $baseDamage;

    public function __construct(string $name,
                                int    $health,
                                int    $stamina,
                                string $weapon,
                                int    $baseDamage)
    {
        $this->name = $name;
        $this->health = $health;
        $this->stamina = $stamina;
        $this->weapon = $weapon;
        $this->baseDamage = $baseDamage;
    }

    public function attack() : string
    {
        return "Герой {$this->name} атакує за допомогою {$this->weapon} . ";
    }


    public function getHealth() : int|float
    {
        return $this->health;
    }

    public function setHealth(int|float $health)
    {
        $this->health = $health;
    }

    public function getStamina() : int|float
    {
        return $this->stamina;
    }

    public function setWeapon(string $weapon)
    {
        $this->weapon = $weapon;
    }

    public function getWeapon() :string
    {
       return $this->weapon;
    }

    public function getBaseDamage() : int|float
    {
       return $this->baseDamage;
    }

    public function sayOnWin() : string
    {
        $phrases = [
            "Перемога!",
            "Я переможець!",
            "Це було очікувано!"
        ];
        $randomIndex = array_rand($phrases);
        return $phrases [$randomIndex];
    }

    public function sayOnLose() : string
    {
        $phrases = [
            "Я програв!",
            "Пощастить наступного разу",
            "Це була важка битва"
        ];
        $randomIndex = array_rand($phrases);
        return $phrases [$randomIndex];
    }

    public function say() : string
    {
        $phrases = [
            "Приготуйся до поразки",
            "Я готовий до перемоги",
            "Тобі мене не перемогти"
        ];
        $randomIndex = array_rand($phrases);
        return $phrases [$randomIndex];
    }

    public function getAttackPhrase() : string
    {
        $phrases = [
            "Я атакую!",
            "Підготуйся до мого удару!",
            "Тримай удар!"
        ];
        $randomIndex = array_rand($phrases);
        return $phrases [$randomIndex];
    }

    public function getName() : string
    {
        return $this->name;
    }
}

class Warrior extends Hero
{
    public function __construct()
    {
        parent::__construct('Воїн', 135, 100, 'Меч', 30);
    }
}

class Mage extends Hero
{
    public function __construct()
    {
        parent::__construct('Маг', 120, 85, 'Магічний посох', 28);
    }
}

class Archer extends Hero
{
    public function __construct()
    {
        parent::__construct('Лучник', 125, 80, 'Лук', 28);
    }
}

class Weapon
{
    protected $name;

    public function __construct($name){
        $this->name = $name;
    }
}

class Sword extends Weapon
{
    public function __construct()
    {
        parent:: __construct('Меч');
        }
}

class Bow extends Weapon
{
    public function __construct()
    {
        parent::__construct('Лук');
    }
}

class Crossbow extends Weapon
{
    public function __construct()
    {
        parent::__construct('Арбалет');
    }
}

class MagicStaff extends Weapon
{
    public function __construct()
    {
        parent::__construct('Магічний посох');
    }
}

class Pistol extends Weapon
{
    public function __construct()
    {
        parent::__construct('Пістолет');
    }
}

$warrior = new Warrior();
echo "
Воїн: Здоров'я - {$warrior->getHealth()}, <br>
Витривалість - {$warrior->getStamina()}, <br>
Зброя - {$warrior->getWeapon()}, <br>
Урон - {$warrior->getBaseDamage()} . <br>";
echo $warrior->attack() . "<br>"."<br>";


$mage = new Mage();
echo "
Маг: Здоров'я - {$mage->getHealth()}, <br>
Витривалість - {$mage->getStamina()}, <br>
Зброя - {$mage->getWeapon()}, <br>
Урон - {$mage->getBaseDamage()} . <br>";
echo $mage->attack() . "<br>"."<br>";


$archer = new Archer();
echo "
Лучник: Здоров'я - {$archer->getHealth()}, <br>
Витривалість - {$archer->getStamina()}, <br>
Зброя - {$archer->getWeapon()}, <br>
Урон - {$archer->getBaseDamage()} . <br>";
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
        $battleLog = [];
        while ($this->hero1->getHealth() > 0 && $this->hero2->getHealth() > 0)
        {
            $attackPhrase1 = $this->hero1->getAttackPhrase();
            $weapon1 = $this->hero1->getWeapon();
            array_push($battleLog, "Герой 1 атакує за допомогою {$weapon1} : $attackPhrase1") . "<br>";


            $damage = mt_rand(28, 32) + $this->hero1->getBaseDamage();
            $this->hero2->setHealth ($this->hero2->getHealth() - $damage);
            array_push($battleLog, "Герой 2 втратив $damage здоров'я. Здоров'я героя 2: {$this->hero2->getHealth()}"). '<br>'. '<br>';

            if ($this->hero2->getHealth() <=0){
                array_push($battleLog, "Герой 1 переміг");
                break;
            }

            $attackPhrase2 = $this->hero2->getAttackPhrase();
            $weapon2 = $this->hero2->getWeapon();
            array_push($battleLog, "Герой 2 атакує за допомогою {$weapon2} : $attackPhrase2") . "<br>";


            $damage = mt_rand(26, 33) + $this->hero2->getBaseDamage();
            $this->hero1->setHealth ($this->hero1->getHealth() - $damage);
            array_push($battleLog, "Герой 1 втратив $damage здоров'я. Здоров'я героя 1: {$this->hero1->getHealth()}"). '<br>'. '<br>';

            if ($this->hero1->getHealth() <=0){
                array_push($battleLog, "Герой 2 переміг!");
                break;
            }
        }

        return $battleLog;
    }
}


$warrior = new Warrior();
$warrior->setWeapon('Меча');
$mage = new Mage();
$mage->setWeapon('Магічний посох');
$archer = new Archer();

$battle = new Battle($warrior, $mage);
$battleLog = $battle->fight();

if ($warrior->getHealth() > 0) {
    $winner = $warrior;
    $loser = $mage;
} else {
    $winner = $mage;
    $loser  = $warrior;
}
foreach ($battleLog as $logEntry) {
    echo $logEntry . "<br>". "<br>";
}

echo "Бій закінчено , переможець: " . $winner->getName() .  "<br>" . $winner->sayOnWin() .  "<br>";
echo "<br>";
echo "Програвший: " . $loser->getName() . "<br>" . $loser->sayOnLose() . "<br>";

