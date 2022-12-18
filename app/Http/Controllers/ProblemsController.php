<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProblemsController extends Controller
{
    public function countNumbersNotContainFive(Request $request)
    {
        $lower = $request->get('lower');
        $upper = $request->get('upper');

        $count = 0;
        for($value = $lower ; $value<=$upper ;$value++) {
            if(!str_contains($value, '5')) $count++;
        }
        return $count;
    }

    public function stringToIndex(Request $request)
    {
        $str = $request->get('input_string');
        $alphabet = array( 'A', 'B', 'C', 'D', 'E',
                       'F', 'G', 'H', 'I', 'J',
                       'K', 'L', 'M', 'N', 'O',
                       'P', 'Q', 'R', 'S', 'T',
                       'U', 'V', 'W', 'X', 'Y',
                       'Z'
                       );
        // To exchanges all keys with their associated values in an array
        $alpha_flip = array_flip($alphabet);

        $return_value = 0;
        $length = strlen($str);
        for ($i = 0; $i < $length; $i++) {
            $return_value +=
                ($alpha_flip[$str[$i]] + 1) * pow(26, ($length - $i - 1));
        }
        return $return_value;
        
    }

    private function downtoZero($number)
    {
        // We can solve this problem with backtracking approach but a more efficient approach
        // if $number is even then the smalles value to divide is 2 then answer is 3
        // if $number is odd then we minus zero and then apply the same logic for even then the answer is 4

        if ($number <= 3)
            return $number;
 
        return $number % 2 == 0 ? 3 : 4;
        
    }

    public function MinimumMoves(Request $request)
    {
        $arr=$request->json()->all()['array'];

        $ans=[];
        foreach ($arr as $value) {
            $value = intval($value);
            array_push($ans,$this->downtoZero($value));
        }
        return response()->json($ans);
        
    }
}
