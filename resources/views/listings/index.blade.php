<x-layout>
@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md;space-y-0 mx-auto">

    {{-- {{@unless(count($listings)== 0)}}
{{@endunless}} --}}

@foreach($Listings as $Listing)

<x-listing-card :listing="$listing" />

    @endforeach
    {{-- {{@else}} --}}
    <p>No Listing Found</p>
    {{-- {{@endunless}} --}}


</div>

<div
class="mt-6 p-4">
{{$Listings->links()}}
</div>

</x-layout>