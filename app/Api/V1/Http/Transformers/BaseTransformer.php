<?php

namespace App\Api\V1\Http\Transformers;

use League\Fractal\TransformerAbstract;

class BaseTransformer extends TransformerAbstract
{
    private $fields;

    public function __construct()
    {
        $this->fields = isset($_GET['fields']) ? $_GET['fields'] : null;
    }

    protected function transformWithFieldsFilter($data)
    {
        if (is_null($this->fields)) {
            return $data;
        }

        $fields = explode(',', $this->fields);

        return array_intersect_key($data, array_flip($fields));
    }
}