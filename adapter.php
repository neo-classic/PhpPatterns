<?php
/**
 * Простой пример реализации паттерна Адаптер
 *
 * Паттерн применяется при необходимости:
 *  1) изменения интерфейса класса, без переписывания класса с нуля
 *  2) адаптировать существующий код к требуемому интерфейсу
 *
 * Пример: пускай у нас в системе уже есть готовый класс Product. Метод getPrice() возвращает цену,
 * и вдруг в какой-то части мы хотим получить цену сразу со скидкой. Напишим адаптер для этого случая
 */
class Product
{
    private $_price;
    private $_discount;

    public function __construct($price, $discount)
    {
        $this->_price = $price;
        $this->_discount = $discount;
    }

    public function getPrice()
    {
        return $this->_price;
    }

    public function getDiscount()
    {
        return $this->_discount;
    }
}

class ProductPriceAdapter
{
    private $_product;

    public function __construct(Product $product)
    {
        $this->_product = $product;
    }

    public function getPrice()
    {
        return $this->_product->getPrice() - $this->_product->getDiscount();
    }
}

$prod = new Product(150, 30);
echo $prod->getPrice();             // 150

$prodAdapter = new ProductPriceAdapter($prod);
echo $prodAdapter->getPrice();      // 120