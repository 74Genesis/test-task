<?php

namespace App\Core\UsersList;

use App\Models\User;

class QueryBuilder 
{
    // DB query
    private $query = null;

    // filters 
    private $name = null;
    private $priceFrom = null;
    private $priceTo = null;
    private $bedrooms = null;
    private $bathrooms = null;
    private $storeys = null;
    private $garages = null;

    public function __construct()
    {
        $this->query = User::select();
    }

    public function setName(string $val)
    {
        $this->name = $val;
    }

    public function setPriceFrom(int $val)
    {
        $this->priceFrom = $val;
    }

    public function setpriceTo(int $val)
    {
        $this->priceTo = $val;
    }

    public function setBedrooms(int $val)
    {
        $this->bedrooms = $val;
    }

    public function setBathrooms(int $val)
    {
        $this->bathrooms = $val;
    }

    public function setStoreys(int $val)
    {
        $this->storeys = $val;
    }

    public function setGarages(int $val)
    {
        $this->garages = $val;
    }

    public function fetch() {
        if ($this->name != null) { 
            $this->query->where('name', 'LIKE', '%'.$this->name.'%'); 
        }
        
        if ($this->priceFrom != null) { 
            $this->query->where('price', '>=', $this->priceFrom); 
        }

        if ($this->priceTo != null) { 
            $this->query->where('price', '<=', $this->priceTo); 
        }
        
        if ($this->bedrooms != null) { 
            $this->query->where('bedrooms', $this->bedrooms); 
        }
        
        if ($this->bathrooms != null) { 
            $this->query->where('bathrooms', $this->bathrooms); 
        }
        
        if ($this->storeys != null) { 
            $this->query->where('storeys', $this->storeys); 
        }
        
        if ($this->garages != null) { 
            $this->query->where('garages', $this->garages); 
        }
        

        return $this->query->get();
    }

}