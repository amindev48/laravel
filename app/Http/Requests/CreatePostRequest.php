<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'bail|required|max:20|min:10',
            'email'=>'required|email|unique:posts',
            'description'=>'required|min:20',
            'file'=>'required|max:2000|mimes:jpg,png,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'فیلد توضیحات اجباری است',
            'title.max'=>'متن عنوان نمیتواند بیشتر از 20 کاراکتر باشد',
            'title.min'=>'متن عنوان نمیتواند کمتر از 10 کاراکتر باشد',
            'email.email'=>'ایمیلی که وارد کردید صحیح نیست',
            'email.required'=>'فیلد ایمیل اجباری است',
            'email.unique'=> 'ایمیل که وارد کردید موجود است ایمیل دیگری وارد کنید',
            'description.required'=>'فیلد متن توضیحات اجباری است',
            'description.min'=>'متن توضیحات نمیتواند کمتر از 20 کاراکرت باشد',
            'file.required'=>'تصویر اصلی برای پست نمیتواند خالی باشد',
            'file.max'=>'اندازه تصویر شما نمیتواند بیشتر از 2 مگابایت باشد',
            'file.mimes'=>'پسوند فایل شما باید jpg , png , jpeg باشد'
        ];

    }
}
