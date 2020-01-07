<?php
class Produto
{
    //Properties
    private $name;
    private $price;
    private $image;

    //Methods
    function set_name($name)
    {
        $this->name = $name;
    }

    function get_name()
    {
        return $this->name;
    }

    function set_price($price)
    {
        $this->price = $price;
    }

    function get_price()
    {
        return $this->price;
    }

    function set_image($image)
    {
        $this->image = $image;
    }

    function get_image()
    {
        return $this->image;
    }

    function promo ($price) {
        $new_price = $price * 0.9;
        $new_price = sprintf('%0.2f', $new_price);
        return $new_price;
    }
}
?>