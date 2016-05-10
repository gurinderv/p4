<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ItemController extends Controller
{
    public function getItems(){
      $items = \App\Item::orderBy('item_name', 'desc')->get();
      return view('item.index')->with('items', $items);
    }

    public function addItem(Request $request){
      $this->validate($request, [
        'newItem' => 'required|max:20',
      ]);

      #Add the new item
      $item = new \App\Item();
      $item->item_name = $request->newItem;
      $item->item_description = $request->newItemDescription;
      $item->location_id = 1;
      $item->save();

      \Session::flash('message', 'Your item was added.');
      return redirect('/items');
    }

    public function getEditItem($id) {
      $item = \App\Item::find($id);
      return view('item.edit')->with('item', $item);
    }

    public function postEditItem(Request $request){
      $item = \App\Item::find($request->id);
      $item->item_name = $request->item_name;
      $item->save();

      \Session::flash('message', 'Your item has been updated.');
      return redirect('/item/edit/'.$request->id);
    }

}
