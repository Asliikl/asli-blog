<?php

namespace App\Http\Requests; //dosyanın hangi klasör içinde olduğunu gösterir

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest{ //extends sağındaki classı override yani tekrar oluşturur ama miras alarak

    public function authorize(){
        return true; //session()->has('admin'); // admin dışında kimse update edemez, true false alır, false çalışmaz true çalışır
    }

    public function rules(){ //form kurallarımız
        return [
            'title' => 'required|max:255',
            'content' => 'required|min:25'
        ];
    }

}