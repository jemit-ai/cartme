<?php
namespace App\Http\Controllers\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OrderService;


class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request){

        $search = $request->input('search');
        $status = $request->input('status');
        $orders = $this->orderService->getPaginatedOrders(10, $search, $status)->withQueryString();
        return view('admin.orders.orders', compact('orders'));
        
    }

    public function show($id){

        $order = $this->orderService->getOrderById($id);
        return view('admin.orders.show',compact('order'));

    }

    public function edit($id){

        $order = $this->orderService->getOrderById($id);
        return view('admin.orders.edit',compact('order'));

    }

    public function update(Request $request, $id){
        
        $order = $this->orderService->getOrderById($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->route('admin.orders.index');

    }

    public function destroy($id){

        $order = $this->orderService->getOrderById($id);
        $order->delete();
        return redirect()->route('admin.orders.index');

    }

}
