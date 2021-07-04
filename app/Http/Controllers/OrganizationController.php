<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orgs = Organization::all();

        return view('index', ['orgs' => $orgs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organization.create');
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
            'phone' => 'required',
            'email' => 'required',
            'website' => 'required',
            'logo' => 'required|mimes:jpg,png,jpeg|max:5120',
        ]);

        $slug = Str::slug($request->input('name'));
        $newImageName = $slug . '-logo-' . uniqid() . '.' . $request->logo->extension();
        $request->logo->move(public_path('logos'), $newImageName);

        Organization::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'logo' => $newImageName,
            'user_id' => 3,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        $people = DB::table('people')
            ->where('organization_id', $organization->id)
            ->get();

        return view('organization', [
            'org' => $organization,
            'people' => $people,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        return view('organization.update')
            ->with('organization', Organization::where('id', $id)
            ->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'website' => 'required',
            'logo' => 'required|mimes:jpg,png,jpeg|max:5120',
        ]);

        $newImageName = $request->name . '-logo-' . uniqid() . '.' . $request->logo->extension();
        $request->image->move(public_path('logo'), $newImageName);

        Organization::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'website' => $request->input('website'),
                'logo' => $newImageName,
                'user_id' => auth()->user()->id,
            ]);

        return redirect('/organization/{$id}', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $organization = Organization::where('id', $id);
        $organization->delete();

        return redirect('/');
    }
}
