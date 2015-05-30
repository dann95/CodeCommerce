<?php namespace CodeCommerce\Cart;

use CodeCommerce\Product;

class Cart
{
    /**
     * @var array
     */
    private $list;

    public function __construct()
    {
        $this->list = [];
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->list;
    }

    /**
     * @param Product $productModel
     * @return current instance of cart
     */
    public function add(Product $productModel)
    {
        $this->list[$productModel->id] = [
            'qtd' => (isset($this->list[$productModel->id])) ? $this->list[$productModel->id]['qtd'] + 1 : 1 ,
            'price' => $productModel->price ,
            'entity' => $productModel
        ];
        return $this;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function totalOfItem($id)
    {
        return $this->list[$id]['qtd'] * $this->list[$id]['price'];
    }

    /**
     * @return float
     */
    public function total()
    {
        $total = 0.00;
        foreach($this->list as $key => $item)
        {
            $total += $item['qtd'] * $item['price'];
        }
        return $total;
    }

    /**
     * @param $productId
     * @return current instance of cart
     */
    public function del($productId)
    {
        if(isset($this->list[$productId]))
        {
            if($this->list[$productId]['qtd'] > 1)
            {
                $this->list[$productId]['qtd'] -= 1;
            }
            else
            {
                unset($this->list[$productId]);
            }
        }
        return $this;
    }

    /**
     * @return current instance of cart
     */
    public function deleteAll()
    {
        unset($this->list);
        $this->list = [];
        return $this;
    }

}