<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\OGPService;
use App\Http\Requests\OgpRequest;

class OgpController extends Controller
{
    public function analysis(OgpRequest $request)
    {
        $meta = null;
        if (!empty($request->input('url'))) {
            $ogpService = new OGPService($request->input('url'));
            $meta = $ogpService->get();
        }

        return $meta;
    }
}
