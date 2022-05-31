<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //商品登録処理のときに起動する
        if ($this->path() == 'item/add' || $this->path() == 'item/edit' || $this->path() == 'item/delete') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // 登録時
        if ($this->path() == 'item/add') {
            return [
                'name' => 'required',
                'list_price' => 'numeric'
            ];
        } elseif ($this->path() == 'item/edit') {
            //更新時
            return [
                'id' => 'required',
                'name' => 'required',
                'list_price' => 'numeric'
            ];
        }elseif($this->path() == 'item/delete'){
            //削除時
            return [
                'id' => 'required',
            ];
        }
    }

    public function messages()
    {
        // バリデーションにチェックされた入⼒エラーメッセージを定義
        return [
            'id.required' => 'IDは必須入⼒です。',
            'name.required' => '商品名は必須入⼒です。',
            'list_price.numeric' => '定価は数値で入⼒してください。',
        ];
    }
}
