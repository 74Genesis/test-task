<?php

namespace App\Core\UsersList;

use App\Core\UsersList\QueryBuilder;

class SearchUsers 
{
    public function fetchUsers($request)
    {
        $query = new QueryBuilder();

        $name = $request->input('name');
        $priceFrom = $request->input('priceFrom');
        $priceTo = $request->input('priceTo');
        $bedrooms = $request->input('bedrooms');
        $bathrooms = $request->input('bathrooms');
        $storeys = $request->input('storeys');
        $garages = $request->input('garages');
 
        $query->setName(strval($name));
        $query->setPriceFrom(intval($priceFrom));
        $query->setpriceTo(intval($priceTo));
        $query->setBedrooms(intval($bedrooms));
        $query->setBathrooms(intval($bathrooms));
        $query->setStoreys(intval($storeys));
        $query->setGarages(intval($garages));

        $users = $query->fetch();
        return ['users' => $users];
    }
}