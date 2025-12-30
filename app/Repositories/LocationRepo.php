<?php

namespace App\Repositories;

use App\Models\Nationality;
use App\Models\State;
use App\Models\Lga;
use App\Models\District;
use App\Models\Tehsil;
use App\Models\Village;

class LocationRepo
{
    public function getStates()
    {
        return State::all();
    }

    public function getAllStates()
    {
        return State::orderBy('name', 'asc')->get();
    }

    public function getAllNationals()
    {
        return Nationality::orderBy('name', 'asc')->get();
    }

    // public function getAllDistricts()
    // {
    //     return District::all();
    // }

    // public function getAllTehsils()
    // {
    //     return Tehsil::all();
    // }

    // public function getAllVillages()
    // {
    //     return Village::all();
    // }

    public function getLGAs($state_id)
    {
        return Lga::where('state_id', $state_id)->orderBy('name', 'asc')->get();
    }

    public function getDistricts($state_id)
    {
        return District::where('state_id', $state_id)->orderBy('name', 'asc')->get();
    }

    public function getTehsils($district_id)
    {
        return Tehsil::where('district_id', $district_id)->orderBy('name', 'asc')->get();
    }

    public function getVillages($tehsil_id)
    {
        return Village::where('tehsil_id', $tehsil_id)->orderBy('name', 'asc')->get();
    }

}