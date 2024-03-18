<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mapsoutputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mapsoutput');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // return view('mapsoutput.result')->with('data', $data);
        return view('mapsoutput.result')->with('id', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function show2(string $id)
    {

        // return view('mapsoutput.result')->with('data', $data);
        return view('mapsoutput.result2')->with('id', $id);
    }
    public function displaydata(){
        $data = [['id' => '5yr', 'title' => 'Flood Hazard Map Under 5-year Rain Return Period', 'location' => 'Cauayan City. Isabela', 'description' => 'This shapefile, with a resolution of 10 meters, Illustrates the inundation extents in the area if the actual amount of rain exceeds that of a 100 year-rain return period. There is a 1/5(20%) propability of a flood with 5 year return period occuring in a single year.']
        ,['id' => '25yr', 'title' => 'Flood Hazard Map Under 25-year Rain Return Period', 'location' => 'Cauayan City. Isabela', 'description' => 'This shapefile, with a resolution of 10 meters, Illustrates the inundation extents in the area if the actual amount of rain exceeds that of a 100 year-rain return period. There is a 1/25(4%) propability of a flood with 25 year return period occuring in a single year.']
        ,['id' => '100yr', 'title' => 'Flood Hazard Map Under 100-year Rain Return Period', 'location' => 'Cauayan City. Isabela', 'description' => 'This shapefile, with a resolution of 10 meters, Illustrates the inundation extents in the area if the actual amount of rain exceeds that of a 100 year-rain return period. There is a 1/100(1%) propability of a flood with 100 year return period occuring in a single year.']
        ,['id' => 'GroundShakingHazardMap', 'title' => 'Ground Shaking Hazard Map', 'location' => 'Cauayan City. Isabela', 'description' => '1. This is a composite map of estimates of maximum intensities for  carious earthquake scenarios that may affect the study area intensities were detemine using a deterministic method. fault parameters and maximum credible magnitude used for different scenario were based on the intrmental seismicity, historical seismicity and mapped active earthquake generators in the area. the attenuation of ground shaking with distance was corrected for the type of underlying material based on surface geology and or result of microtremor surveys. <br><br> 2. The Ground shaking maps do not restrict construction of any structure or land development in the areas with expected high intensities as long as the national code is followed. <br><br> 3. The map is  ideal for land use, emergency response mitigation planning but not replace site specification evaluations for the building of the critical structures.']
        ,['id' => 'LiquefactionHazardMap', 'title' => 'Liquefaction Hazard Map', 'location' => 'Cauayan City. Isabela', 'description' => '1. This was based on the geology, earthquake source zone, historical accounts of liquefaction, geomorphology and hydrology of the area and preliminary microtremor survey data utilize to validate type of underlying materials. <br><br> 2. This map is semi-detailed and maybe used in land use, emergency response and mitigation planning, and should not be used for site specific evaluation. <br><br> 3. the liquefaction hazard maps don not restrict construction of any structure and development in areas susceptible to liquefaction of any structure and development in area susceptible to liquefaction as long as proper engineering considerations are applied.']
    ];
        return response()->json($data);

    }
}
