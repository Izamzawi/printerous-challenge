<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(organization.newPIC);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'avatar' => 'required|mimes:jpg,png,jpeg|max:5120',
            'organization_id' => 'required',
        ]);

        $orgName = DB::table(organizations)
            ->where('id', $request->input('organization_id'))
            ->get();

        $newImageName = $request->name . '-' . $orgName['name'] . '-avatar.' . $request->image->extension();
        $request->image->move(public_path('logo'), $newImageName);

        Person::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'avatar' => $newImageName,
            'organization_id' => $request->input('organization_id'),
        ]);

        return redirect('/organization');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return view(organization.PIC)
            ->with('person', Person::where('id', $id)
            ->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        return view(organization.updatePIC)
            ->with('organization', Organization::where('id', $id)
            ->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'avatar' => 'required|mimes:jpg,png,jpeg|max:5120',
            'organization_id' => 'required',
        ]);

        $orgName = DB::table(organizations)
            ->where('id', $request->input('organization_id'))
            ->get();

        $newImageName = $request->name . '-' . $orgName['name'] . '-avatar.' . $request->image->extension();
        $request->image->move(public_path('logo'), $newImageName);

        Person::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'avatar' => $newImageName,
                'organization_id' => $request->input('organization_id'),
            ]);

        return redirect('/organization');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person = Person::where('id', $id);
        $person->delete();

        return redirect('/organization');
    }
}
