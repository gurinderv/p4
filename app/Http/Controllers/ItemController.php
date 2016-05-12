<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ItemController extends Controller
{
    public function getItems(){
      $items = \App\Item::orderBy('item_name', 'desc')->where('user_id','=',\Auth::id())->get();

      $locations_for_dropdown = \App\Location::locationsForDropdown();

      return view('item.index')
          ->with('items', $items)
          ->with('locations_for_dropdown', $locations_for_dropdown);
    }

    public function addItem(Request $request){
      $this->validate($request, [
        'newItem' => 'required|max:20',
        'newItemDescription' => 'required|max:50',
        'location_id' => 'required|numeric'
      ]);

      #Add the new item
      $item = new \App\Item();
      $item->item_name = $request->newItem;
      $item->item_description = $request->newItemDescription;
      $item->location_id = $request->location_id;
      $item->user_id = \Auth::id();
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
      $this->validate($request, [
        'item_name' => 'required|max:20',
        'item_description' => 'required|max:50',
        'location_id' => 'required|numeric'
      ]);

      $item = \App\Item::find($request->id);
      $item->item_name = $request->item_name;
      $item->item_description = $request->item_description;
      $item->location_id = $request->location_id;
      $item->save();

      \Session::flash('message', 'Your item has been updated.');
      return redirect('/items');
    }
    public function getConfirmDelete($id) {

      $item = \App\Item::find($id);

      return view('item.delete')->with('item', $item);
}

    public function getDoDelete($id) {

      # Get the item to be deleted
      $item = \App\Item::find($id);

      if(is_null($item)) {
          \Session::flash('message','Item not found.');
          return redirect('\items');
      }

      # Then delete the item
      $item->delete();

      # Done
      \Session::flash('message',$item->item_name.' was removed.');
      return redirect('/items');
    }

}
