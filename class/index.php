<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
class Person {
  private $name;
  protected $age;
  public $gender;

  public function __construct($name, $age, $gender) {
    $this->name = $name;
    $this->age = $age;
    $this->gender = $gender;
  }

  public function getName() {
    return $this->name;
  }

  protected function getAge() {
    return $this->age;
  }

  public function getGender() {
    return $this->gender;
  }

  public function setName($name) {
    $this->name = $name;
  }

  protected function setAge($age) {
    $this->age = $age;
  }

  public function setGender($gender) {
    $this->gender = $gender;
  }

  public function displayInfo() {
    echo "Имя: " . $this->name . "<br>";
    echo "Возраст: " . $this->getAge() . "<br>";
    echo "Пол: " . $this->gender . "<br>";
  }
}

class Employee extends Person {
  private $position;
  public $salary;

  public function __construct($name, $age, $gender, $position, $salary) {
    parent::__construct($name, $age, $gender);
    $this->position = $position;
    $this->salary = $salary;
  }

  public function getPosition() {
    return $this->position;
  }

  public function setPosition($position) {
    $this->position = $position;
  }

  public function displayInfo() {
    parent::displayInfo();
    echo "Должность: " . $this->position . "<br>";
    echo "Зарплата: " . $this->salary . "<br>";
  }
}

interface Workable {
  public function work();
}

class Programmer extends Employee implements Workable {
  public function __construct($name, $age, $gender, $position, $salary) {
    parent::__construct($name, $age, $gender, $position, $salary);
  }

  public function work() {
    echo "Hello, world!" . "<br>";
  }
}

trait Communicable {
  public function communicate() {
    echo "Zzz";
  }
}

class Manager extends Employee {
  use Communicable;

  public function __construct($name, $age, $gender, $position, $salary) {
    parent::__construct($name, $age, $gender, $position, $salary);
  }
}

$person = new Person("Вася", 30, "мужской");
$person->displayInfo();

$employee = new Employee("Аня", 25, "женский", "Менеджер", 50000);
$employee->displayInfo();

$programmer = new Programmer("Дима", 28, "мужской", "Программист", 70000);
$programmer->displayInfo();
$programmer->work();

$manager = new Manager("Катя", 35, "женский", "Менеджер", 60000);
$manager->displayInfo();
$manager->communicate();
?>
</body>
</html>