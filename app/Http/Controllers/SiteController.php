<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{

    protected $a_rep;
    protected $b_rep;
    protected $g_rep;


    protected $keywords;
    protected $meta_desc;
    protected $title;


    protected $template;

    protected $vars = array();

    protected $content = FALSE;



    protected function __construct(){

    }


    protected function renderOutput(){

        $this->vars = array_add($this->vars, 'keywords', $this->keywords);
        $this->vars = array_add($this->vars, 'meta_desc', $this->meta_desc);
        $this->vars = array_add($this->vars, 'title', $this->title);

        return view($this->template)->with($this->vars);
    }


}
