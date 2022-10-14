<?php

namespace App\Http\Controllers;
use session;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Listings\Controllers;


class Listingcontroller extends Controller
{
    //show all listings
    public function index() {
        return view('listings.index', [
            'Listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(2)
            
        ]);
    }

    //show single listings
    public function show(listing $listing) {
        return view('listings.show', [
            'Listing' => $listing
        ]);
    }

    //show create form
     public function create() {
        return view('listings.create');
     }

     //store listing data
     public function store(Request $request) {
        $formfields = $request->validate([
            'title' => 'required', 
            'company' => 'required', 
            'location' => 'required', 
            'website' => 'required', 
            'email' => ['required', 'email'], 
            'tags' => 'required',
             'description' => 'required'
        ]);

if($request->hasfile('logo')) {
    $formfield['logo'] = $request->file('logo')->store('logos', 'public');
}

$formfields['user_id'] = auth()->id();

        listing::create($formfields);


        // return redirect('/'); 

        return redirect('/')->with('message', 'listing created successfully!');
    
     }

     //show Edit form
public function edit(listing $listing) {
    return view('listings.edit', ['listing' => $listing]);
}

//update listing
public function update(Request $request, listing $listing) {
    $formfields = $request->validate([
        'title' => 'required', 
        'company' => 'required', 
        'location' => 'required', 
        'website' => 'required', 
        'email' => 'required', 
        'tags' => 'required',
         'description' => 'required'
    ]);

if($request->hasfile('logo')) {
$formfield['logo'] = $request->file('logo')->store('logos', 'public');
}

    $listing->update($formfields);
   
    $listing->update($formfields);

    return back()->with('message', 'listing created successfully!');
}

//Delete listing
public function destroy(listing $listing) {
$listing->delete();
return redirect('/')->with('message', 'listing Deleted succesfully');
}

//manage listings 
public function manage() {
    return view('listings.manage', ['listings' => auth()->user()->get]);
}

}
