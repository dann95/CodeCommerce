<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

	public function finish(Order $orderModel)
    {


        $cart = Session::get('cart');

        // Não pode estar vazio!

        if(! count($cart->all()))
        {
            return redirect()->route('cart.list');
        }

        // Criando a order
        $order = $orderModel->create([
            'user_id' => Auth::user()->id,
            'price' => $cart->total()
        ]);


        // Criando cada produto da order:
        foreach($cart->all() as $item)
        {
            for($i = 1; $i <= $item['qtd']; $i++ )
            {
                $order->items()->create([
                    'product_id' => $item['entity']->id
                ]);
            }
        }

        // Zerando o carrinho !
        $cart->deleteAll();
        Session::put('cart', $cart);


        // Disparando e-mail:


        // Exibindo a view de sucesso :
        return view('store.order.success' , ['id' => $order->id]);

    }

}
