<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ShiireAmountRule;

class ShiireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 仕入登録処理のときに起動する
        if ($this->path() == 'shiire/create') {
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
        // htmlのnameにどの種類のバリデーションを⾏うか設定
        return [
            'shohin_name' => 'required|min:5',
            'shiire_count' => 'required|numeric',
            'shiire_date' => 'required|date',
            'shiire_amount' => ['required', 'numeric', new ShiireAmountRule()]
        ];
    }

    public function messages()
    {
        // バリデーションにチェックされた入⼒エラーメッセージを定義
        return [
            'shohin_name.required' => '商品名は必須入⼒です。',
            'shohin_name.min' => '商品名は５文字以上にしてください。',
            'shiire_count.required' => '仕入数は必須入⼒です。',
            'shiire_count.numeric' => '仕入数は数値で入⼒してください。',
            'shiire_date.required' => '仕入⽇は必須入⼒です。',
            'shiire_date.date' => '仕入⽇は⽇付の形式で入⼒してください。',
            'shiire_amount.required' => '仕入額は必須入⼒です。',
            'shiire_amount.numeric' => '仕入額は数値で入⼒してください。'
        ];
    }
}
