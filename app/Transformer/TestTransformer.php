<?php

namespace App\Transformer;

use League\Fractal\TransformerAbstract;

class TestTransformer extends TransformerAbstract{

    public function transform($test)
    {
        return [
            'id'=>$test->id,
            'email'=>$test->email,
            'password'=>$test->password,
            'name'=>$test->name,
            'phone'=>$test->phone,
            'address'=>$test->address,
            'id'=>$test->id,
            'remember_token'=>$test->remember_token,
        ];
    }


}