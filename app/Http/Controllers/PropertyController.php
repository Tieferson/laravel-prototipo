<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index()
    {

        $properties = DB::select('SELECT * FROM properties');

        return view('property.index')->with('properties', $properties);
    }
    public function show($slug)
    {

        $property = DB::select('select * from properties where slug = ?', [$slug]);

        if (!empty($property)) {
            return view('property.show')->with('property', $property);
        } else {
            return redirect()->action('PropertyController@index');
        }
    }
    public function create()
    {
        return view('property.create');
    }
    public function store(Request $request)
    {
        $propertySlug = $this->setSlug($request->title);


        $property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->rental_price,
            $request->sale_price
        ];

        DB::insert('INSERT INTO properties (title, slug, description, rental_price, sale_price) VALUES (?,?,?,?,?)', $property);

        return redirect()->action('PropertyController@index');
    }

    public function edit($slug)
    {
        $property = DB::select('select * from properties where slug = ?', [$slug]);

        if (!empty($property)) {
            return view('property.edit')->with('property', $property);
        } else {
            return redirect()->action('PropertyController@index');
        }
    }


    public function update(Request $request, $id)
    {
        $propertySlug = $this->setSlug($request->title);


        $property = [
            $request->title,
            $propertySlug,
            $request->description,
            $request->rental_price,
            $request->sale_price,
            $id
        ];

        DB::update('update properties set title=?,slug=?,description=?,rental_price=?,sale_price=? where id = ?', $property);

        return redirect()->action('PropertyController@index');
    }
    public function destroy($slug)
    {
        $property = DB::select('select * from properties where slug = ?', [$slug]);


        if (!empty($property)) {
            DB::delete('delete from properties where slug = ?', [$slug]);
        }


        return redirect()->action('PropertyController@index');
    }


    private function setSlug($slug)
    {
        $slug = str_slug($slug);
        $properties = DB::select('select * from properties');

        $t = 0;
        foreach ($properties as $property) {
            if (str_slug($property->title) === $slug) {
                $t++;
            }
        }


        return $t > 0 ? $slug . '-' . $t : $slug;
    }
}
