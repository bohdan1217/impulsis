<?php

namespace App\Repositories;

use Config;

abstract class Repository {

    protected $model = FALSE;


    public function get($select = '*', $take = FALSE, $pagination = FALSE, $where = FALSE) {

        $builder = $this->model->select($select);

        if ($take) {
            $builder->take($take);
        }

        if ($where) {
            $builder->where($where[0], 'LIKE', '%' . $where[1] . '%');
        }





        if ($pagination) {
            return $this->check($builder->paginate(Config::get('settings.paginate')));
        }


        return $this->check($builder->get());
    }

    protected function check($result) {
        if ($result->isEmpty()) {
            return FALSE;
        }

        $result->transform(function ($item,$key) {

            return $item;
        });

        return $result;
    }


    public function one($id, $attr = array()) {
        $result = $this->model->where('id', $id)->first();
        return $result;
    }

}

?>