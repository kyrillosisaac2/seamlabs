<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DeliveryOrder;
use App\Models\DineinOrder;
use App\Models\Item;
use App\Models\Table;
use App\Models\TakeawayOrder;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
   const DELIVERY=1;
   const DINEIN=2;
   const TAKEAWAY=3;
   public function create(Request $request)
   {
      $data = json_decode($request->getContent(), true);

      $this->validate($request, [
         'type' => 'required|numeric|between:1,3',
         'items.*' => 'exists:items,id',
         'items' => 'required',
      ]);
      $type = $data['type'];
      switch ($type) {
         case self::DELIVERY:
            $this->validate($request, [
               'delivery_fees' => 'required|numeric',
               'customer_name' => 'required',
               'customer_phone_number' => 'required',
            ]);
            
            $customer = Customer::firstOrCreate(
               ['name'=>$data['customer_name']],
               ['phone_number'=>$data['customer_phone_number']
            ]);

            $order = new DeliveryOrder();
            $order->delivery_fees = $data['delivery_fees'];
            $order->customer()->associate($customer);
            $order->save();

            foreach ($data['items'] as  $item_id) {
               if($item = Item::find($item_id));
                  $order->items()->attach($item);
            }
            break;
         case self::DINEIN:
            $this->validate($request, [
               'service_charge' => 'required|numeric',
               'waiter_name' => 'required',
               'table_number' => 'required|exists:tables,table_number',
            ]);

            $table = Table::where(['table_number'=>$data['table_number']])->first();
            $order = new DineinOrder();
            $order->service_charge= $data['service_charge'];
            $order->waiter_name= $data['waiter_name'];
            $order->table()->associate($table);
            $order->save();
            foreach ($data['items'] as  $item_id) {
               if($item = Item::find($item_id));
                  $order->items()->attach($item);
            }
            break;
         case self::TAKEAWAY:
            $order = new TakeawayOrder();
            $order->save();
            foreach ($data['items'] as  $item_id) {
               if($item = Item::find($item_id));
                  $order->items()->attach($item);
            }
            break;
      }

      return response()->json(['message'=>'Order has been placed successfully']);

   }
}
