<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\PriceListData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\PriceList;

class PriceListController extends Controller
{
    //
    public function showPriceLists()
    {
        return view('pricelists', [
            'priceLists' => PriceList::all(),
        ]);
    }

    public function createPriceList() {
        //dd(request());
        $newPl = new PriceList();
        $newPl->name = request()->name;
        $newPl->save();

        return view('pricelists', [
            'priceLists' => PriceList::all(),
        ]);
    }

    public function deletePriceList()
    {
        //dd(request());
        PriceList::find(request()->delete)->delete();
        PriceListData::where('price_list_id', '=', request()->delete)->delete();

        return view('priceLists', [
            'priceLists' => PriceList::all(),
        ]);
    }

    public function editPriceList()
    {
        //dump(request());
        return view('pricelist_edit', [
            'pricelist_id' => request()->id,
            'pricelistdata' => \App\Models\PriceListData::where('price_list_id', '=', request()->id)->get(),
        ]);
    }

    public function newPriceListItem()
    {
        //dump(request());
        /*dump(request());
        dd(request()->price_list_id);*/
        $newPlData = new PriceListData();
        $newPlData->name = request()->name;
        $newPlData->price_list_id = request()->price_list_id;
        $newPlData->vpoints = request()->vpoints;
        $newPlData->retail_price = request()->retail_price;
        $newPlData->pd10 = round(request()->retail_price * 0.9, 0);
        $newPlData->pd20 = round(request()->retail_price * 0.8, 0);
        $newPlData->pd30 = round(request()->retail_price * 0.7, 0);
        $newPlData->pc15 = round(request()->retail_price * 0.86494455, 2);
        $newPlData->pc25 = round(request()->retail_price * 0.77479253, 2);
        $newPlData->pc35 = round(request()->retail_price * 0.68470954, 2);
        $newPlData->ip25 = round(request()->retail_price * 0.77479253, 2);
        $newPlData->ip35 = round(request()->retail_price * 0.68470954, 2);
        $newPlData->ip42 = round(request()->retail_price * 0.62165284, 2);
        $newPlData->sv_price = request()->sv_price;

        $newPlData->save();

        return view('pricelist_edit', [
            'pricelist_id' => request()->price_list_id,
            'pricelistdata' => \App\Models\PriceListData::where('price_list_id', '=', request()->price_list_id)->get(),
        ]);
    }

    public function deletePriceListItem()
    {
        $ids = json_decode(request()->delete);
        PriceListData::find($ids->id)->delete();

        return view('pricelist_edit', [
            'pricelist_id' => $ids->price_list_id,
            'pricelistdata' => \App\Models\PriceListData::where('price_list_id', '=', $ids->price_list_id)->get(),
        ]);
    }

    public function updatePriceListItem(Request $request)
    {

        $ids = json_decode($request->update);
        //dd($ids);
        return view('pricelist_edit_item', [
            'id' => $ids->id,
            'price_list_id' => $ids->price_list_id,
            'vpoints' => $ids->vpoints,
            'name' => $ids->name,
            'retail_price' => $ids->retail_price,
            'sv_price' => $ids->sv_price,
        ]);
    }

    public function savePriceListItem()
    {
        //dump(request());
        //dd(request()->price_list_id);
        $newPlData = PriceListData::find(request()->id);
        $newPlData->name = request()->name;
        $newPlData->price_list_id = request()->price_list_id;
        $newPlData->vpoints = request()->vpoints;
        $newPlData->retail_price = request()->retail_price;
        $newPlData->pd10 = round(request()->retail_price * 0.9, 0);
        $newPlData->pd20 = round(request()->retail_price * 0.8, 0);
        $newPlData->pd30 = round(request()->retail_price * 0.7, 0);
        $newPlData->pc15 = round(request()->retail_price * 0.86494455, 2);
        $newPlData->pc25 = round(request()->retail_price * 0.77479253, 2);
        $newPlData->pc35 = round(request()->retail_price * 0.68470954, 2);
        $newPlData->ip25 = round(request()->retail_price * 0.77479253, 2);
        $newPlData->ip35 = round(request()->retail_price * 0.68470954, 2);
        $newPlData->ip42 = round(request()->retail_price * 0.62165284, 2);
        $newPlData->sv_price = request()->sv_price;

        $newPlData->save();

        return view('pricelist_edit', [
            'pricelist_id' => request()->price_list_id,
            'pricelistdata' => \App\Models\PriceListData::where('price_list_id', '=', request()->price_list_id)->get(),
        ]);

    }
}
