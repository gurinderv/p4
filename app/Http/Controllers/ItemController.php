<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ItemController extends Controller
{
    public function getItems(){
      $items = \App\Item::orderBy('item_name', 'desc')->get();

      $locations_for_dropdown = \App\Location::locationsForDropdown();

      return view('item.index')
          ->with('items', $items)
          ->with('locations_for_dropdown', $locations_for_dropdown);
    }

    public function addItem(Request $request){
      $this->validate($request, [
        'newItem' => 'required|max:20',
      ]);

      #Add the new item
      $item = new \App\Item();
      $item->item_name = $request->newItem;
      $item->item_description = $request->newItemDescription;
      $item->location_id = $request->location_id;
      $item->save();

      \Session::flash('message', 'Your item was added.');
      return redirect('/items');
    }

    public function getEditItem($id) {
      $item = \App\Item::find($id);

      $locations_for_dropdown = \App\Location::locationsForDropdown();

      return view('item.edit')
          ->with('item', $item)
          ->with('locations_for_dropdown', $locations_for_dropdown);
    }

    public function postEditItem(Request $request){
      $item = \App\Item::find($request->id);
      $item->item_name = $request->item_name;
      $item->item_description = $request->item_description;
      $item->location_id = $request->location_id;
      $item->save();

      \Session::flash('message', 'Your item has been updated.');
      return redirect('/items');
    }

}
