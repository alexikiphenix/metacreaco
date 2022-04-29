<?php


class DefaultController extends AbstractController
{
    public function index()
    {
        $this->renderView("index_view", [
            "persons" => Person::listWithLimit(0, 20),
            "person_search" => Person::searchPersons()
        ]);
    }

}