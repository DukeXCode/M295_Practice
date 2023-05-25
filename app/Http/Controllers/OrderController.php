<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getAll()
    {
        $orders = Order::all();
        return OrderResource::collection($orders);
    }

    public function postOrder(Request $request)
    {
        $validatedData = $this->validateFields($request);

        $order = new Order();
        $this->assignFields($validatedData, $order);

        $order->save();

        return OrderResource::make($order);
    }

    public function delete(Request $request, int $id)
    {
        Order::find($id)->delete();
        return response()->json(['message' => 'Order deleted successfully'], 202);
    }

    public function put(Request $request, int $id)
    {
        $order = Order::find($id);

        $validatedData = $this->validateFields($request);

        $this->assignFields($validatedData, $order);

        return OrderResource::make($order);
    }

    private function assignFields(array $validatedData, Order $order): void
    {
        $order->name = $validatedData['name'];
        $order->email = $validatedData['email'];
        $order->credit_card_number = $validatedData['credit_card_number'];
        $order->credit_card_expiration_date = $validatedData['credit_card_expiration_date'];
        $order->total = $validatedData['total'];
        $order->status = $validatedData['status'];
        $order->notes = $validatedData['notes'];
    }

    private function validateFields(Request $request): array
    {
        $storeOrderRequest = new StoreOrderRequest();
        return $request->validate($storeOrderRequest->rules());
    }
}
