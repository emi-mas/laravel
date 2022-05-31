<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Http\Requests\ItemRequest;
use Carbon\Carbon;

class ItemController extends Controller
{
    // indexアクション
    public function index(Request $request, Response $response)
    {
        $items = Item::get(); // レコードの抽出
        // $items = Item::all();
        $data = [
            'items' => $items,
        ];
        return view('item.index', $data);
    }

    // 検索
    public function search(Request $request, Response $response)
    {
        //POSTされたデータ取得
        $itemName = $request->input('itemName');

        if(is_null($itemName)){
            //検索キーワードがなかったら全件取得
            $items = Item::all();
        }else{
            //検索キーワードあれば商品名称から取得
            $items = Item::where('name', 'like',"%$itemName%")->get();
        }

        $data = [
            'items' => $items,
        ];

        return view('item.index', $data);
    }


    // 登録（追加）
    public function add(ItemRequest $request, Response $response)
    {
        DB::beginTransaction();
        try {
            $item = new Item();

            $item->fill(['name' => $request->name, 'list_price' => $request->list_price]);
            $item->save();
            DB::commit();
            return redirect('item')->with('msg', '処理が完了しました。');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect('item')->with('msg', '処理に失敗しました。');
        }
    }

    // 更新
    public function edit(ItemRequest $request, Response $response)
    {
        DB::beginTransaction();
        try {
            $item = Item::find($request->id);
            $item->fill([
                'name' => $request->name,
                'list_price' => $request->list_price,
                'updated_at' => Carbon::now('Asia/Tokyo'),
            ]);
            $item->save();
            DB::commit();
            return redirect('item')->with('msg', '処理が完了しました。');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect('item')->with('msg', '処理に失敗しました。');
        }
    }

    // 削除
    public function delete(ItemRequest $request, Response $response)
    {
        DB::beginTransaction();
        try {
            $item = Item::find($request->id);
            $item->delete();
            DB::commit();
            return redirect('item')->with('msg', '処理が完了しました。');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect('item')->with('msg', '処理に失敗しました。');
        }
    }
}
