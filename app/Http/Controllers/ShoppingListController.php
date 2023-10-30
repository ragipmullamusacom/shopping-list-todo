<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingItem;

class ShoppingListController extends Controller
{
    public function index()
    {
        $items = ShoppingItem::all();

        return view('shoppinglist.index', ['items' => $items]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        ShoppingItem::create($validatedData);

        return redirect('/');
    }

    public function update(Request $request, ShoppingItem $item)
    {
        $item = ShoppingItem::find($item->id);
        $item->update([
            'completed' => 1,
        ]);
        return redirect()->back();
    }

    public function destroy(ShoppingItem $item)
    {
        $item = ShoppingItem::find($item->id);
        if ($item) {
            $item->delete();
            return redirect('/')->with('success', 'Item deleted successfully');
        } else {
            return redirect('/')->with('error', 'Item not found');
        }
    }
    

}

