<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Test;
use App\Transformer\TestTransformer;

class TestController extends Controller
{
    protected $response;
    public function __construct(Response $response)
    {
        $this->response=$response;
    }

    public function index()
    {
        // $tests= Test::paginate(15);
        // return $this->response->withPaginator($tests,new TestTransformer);
        $test = Test::all();
        
        return $this->response->withCollection($test,new TestTransformer);
    }

    public function show($id)
    {
        $test = Test::find($id);
        if(!$test)
        {
            return $this->response->errorNotFound('err:record not found');
        }

        return $this->response->withItem($test,new TestTransformer);
    }

    public function destroy($id)
    {
        $test = Test::find($id);
        if($test)
        {
            return $this->response->errorNotFound('err:record not found');
        }

        if($task->delete())
        {
            return $this->response->withItem($test,new TestTransformer);
        }
        else
        {
            return $this->response->errorInternalError('err:deletion failed');
        }
    }

    public function store(Request $request)
    {
        if($request->isMethod('put'))
        {
            $test = Test::find($request->id);
            if(!$test)
            {
                return $this->response->errorNotFound('err:record not found');
            }
        }
        else
        {
            $test = new Test;
        }

        $test->id = $request->input('id');
        $test->email = $request->input('email');
        $test->password = $request->sha1(input('password'));
        $test->name = $request->input('name');
        $test->phone = $request->input('phone');
        $test->address = $request->input('address');

        if($test->save())
        {
            return $this->response->withItem($test,new TestTransformer);
        }
        else
        {
            return $this->response->errorInternalError("err:update/create failed");
        }
    }







}
