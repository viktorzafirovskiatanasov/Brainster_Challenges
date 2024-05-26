<?php
interface Printable {
    public function print();
    public function sneakpeek();
    public function fullinfo();
}
class Furniture
{
    private $width;
    private $length;
    private $height;
    private $is_for_seating;
    private $is_for_sleeping;

    public function __construct($width, $length, $height)
    {
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
    }
    public function get_width(){
        return $this->width;
    }
    public function get_length(){
        return $this->length;
    }
    public function get_height(){
        return $this->height;
    }
    public function set_is_for_seating(bool $is_for_seating)
    {
        $this->is_for_seating = $is_for_seating;
    }
    public function get_is_for_seating()
    {
        return $this->is_for_seating;
    }
    public function set_is_for_sleeping(bool $is_for_sleeping)
    {
        $this->is_for_sleeping = $is_for_sleeping;
    }
    public function get_is_for_sleeping()
    {
        return $this->is_for_sleeping;
    }
    public function area()
    {
        return $this->width * $this->length;
    }
    public function volume()
    {
        return $this->area() * $this->height;
    }
}
class Sofa extends Furniture implements Printable
{
    private $seats;
    private $armrests;
    private $lenght_opened;
    public function __construct($width, $length, $height)
    {
        parent::__construct($width, $length, $height);
    }

    public function set_seats($seats)
    {
        $this->seats = $seats;
    }
    public function get_seats()
    {
        return $this->seats;
    }
    public function set_armrests($armrests)
    {
        $this->armrests = $armrests;
    }
    public function get_armrests()
    {
        return $this->armrests;
    }
    public function set_lenght_opened($lenght_opened)
    {
        $this->lenght_opened = $lenght_opened;
    }
    public function get_lenght_opened()
    {
        return $this->lenght_opened;
    }
    public function area_opened()
    {
        if ($this->get_is_for_sleeping()) {
            return $this->get_width() * $this->lenght_opened;
        } else {
            return "This sofa is for sitting only, it has {$this->armrests} armrests and {$this->seats} seats.";
        }
    }
    public function print() {
        $sleepingStatus = $this->get_is_for_sleeping() ? 'sleeping' : 'sitting only';
        echo get_class($this) . ", $sleepingStatus, " . $this->area() . "cm2\n";
    }

    public function sneakpeek() {
        echo get_class($this) . "\n";
    }

    public function fullinfo() {
        $sleepingStatus = $this->get_is_for_sleeping() ? 'sleeping' : 'sitting-only';
        echo get_class($this) . ", $sleepingStatus, " . $this->area() . "cm2, width: {$this->get_width()}cm, length: {$this->get_length()}cm, height: {$this->get_height()}cm\n";
    }
}

class Bench extends Sofa implements Printable{
    public function __construct($width, $length, $height)
    {
        parent::__construct($width, $length, $height);
    }  
    public function print() {
        $sleepingStatus = $this->get_is_for_sleeping() ? 'sleeping' : 'sitting only';
        echo get_class($this) . ", $sleepingStatus, " . $this->area() . "cm2\n";
    }

    public function sneakpeek() {
        echo get_class($this) . "\n";
    }

    public function fullinfo() {
        $sleepingStatus = $this->get_is_for_sleeping() ? 'sleeping' : 'sitting-only';
        echo get_class($this) . ", $sleepingStatus, " . $this->area() . "cm2, width: {$this->get_width()}cm, length: {$this->get_length()}cm, height: {$this->get_height()}cm\n";
    }
}
class Chair extends Furniture implements Printable{
    public function __construct($width, $length, $height)
    {
        parent::__construct($width, $length, $height);
    }
    public function print() {
        $sleepingStatus = $this->get_is_for_sleeping() ? 'sleeping' : 'sitting only';
        echo get_class($this) . ", $sleepingStatus, " . $this->area() . "cm2\n";
    }

    public function sneakpeek() {
        echo get_class($this) . "\n";
    }

    public function fullinfo() {
        $sleepingStatus = $this->get_is_for_sleeping() ? 'sleeping' : 'sitting-only';
        echo get_class($this) . ", $sleepingStatus, " . $this->area() . "cm2, width: {$this->get_width()}cm, length: {$this->get_length()}cm, height: {$this->get_height()}cm\n";
    }
}

$furniture = new Furniture(200, 150, 50);
$furniture->set_is_for_seating(true);
$furniture->set_is_for_sleeping(false);
echo "Furniture area: " . $furniture->area() . " cm2\n";
echo "Furniture volume: " . $furniture->volume() . " cm3\n";
echo "<br/>";
//instanciranje na objekt Sofa
$sofa = new Sofa(180, 100, 60);
$sofa->set_is_for_seating(true);
$sofa->set_is_for_sleeping(false);
$sofa->set_seats(3);
$sofa->set_armrests(2);
$sofa->set_lenght_opened(160);
$sofa->print();
$sofa->sneakpeek();
$sofa->fullinfo();
echo "<br/>";
// instanciranje na objekt Bench
$bench = new Bench(150, 50, 45);
$bench->set_is_for_seating(true);
$bench->set_is_for_sleeping(false);
$bench->set_seats(2);
$bench->set_armrests(0);
$bench->set_lenght_opened(120);
$bench->print();
$bench->sneakpeek();
$bench->fullinfo();
echo "<br/>";
// instanciranje na objekt Chair
$chair = new Chair(50, 50, 100);
$chair->set_is_for_seating(true);
$chair->set_is_for_sleeping(false);
$chair->print();
$chair->sneakpeek();
$chair->fullinfo();






