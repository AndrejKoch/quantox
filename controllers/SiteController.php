<?php


namespace app\controllers;


use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\SearchForm;

class SiteController extends Controller
{
    public function home()
    {

        return $this->render('home');
    }


    public function results(Request $request)
    {
        if ($request->isPost()) {
            $searchForm = $request->getBody();
            $results = SearchForm::search($searchForm['search']);
            return $this->render('results', $results);
        }
    }

}