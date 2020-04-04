<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class SequenceController extends Controller
{
    public function up(Request $request)
    {
        switch($request->name):
            case "brand":
                $sequence_a = Brand::where('sequence',   $request->no)->first();
                $sequence_b = Brand::where('sequence', --$request->no)->first();
            break;
        endswitch;

        $sequence_a->sequence = --$sequence_a->sequence;
        $sequence_b->sequence = ++$sequence_b->sequence;
        $sequence_b->save();
        $sequence_a->save();

        return response("success up");
    }

    public function down(Request $request)
    {
        switch($request->name):
            case "brand":
                $sequence_a = Brand::where('sequence',   $request->no)->first();
                $sequence_b = Brand::where('sequence', ++$request->no)->first();
            break;
        endswitch;

        $sequence_a->sequence = ++$sequence_a->sequence;
        $sequence_b->sequence = --$sequence_b->sequence;
        $sequence_b->save();
        $sequence_a->save();

        return response("success down");
    }
}
