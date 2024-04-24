<?php

namespace App\Filters;

use Illuminate\Http\Request;


class MyApiFilter
{

    protected $array_params = [];
    protected $array_columns_map = [];
    protected $array_operators_map = [];

    public function useTransform(Request $request)
    {

        $info_query = [];

        foreach ($this->array_params as $param => $operators) :
            $query = $request->query($param);
            if (!isset($query)) continue;
            $column = $this->array_columns_map[$param] ?? $param;
            foreach ($operators as $item) :
                if (isset($query[$item])) :
                    $info_query[] = [$column, $this->array_operators_map[$item], $query[$item]];
                endif;
            endforeach;
        endforeach;

        return $info_query;
    }
}
