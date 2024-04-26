@component('mail::message')
    @if(date('G') < 12) Bonjour @else Bonsoir @endif,<br>
    Vous disposez d'une nouvelle offre d'enchères sur votre véhicule {{$auction->vehicule->getName()}} avec prix de {{$auction->price}} € de l'utilisateur {{$auction->user->name}} ({{$auction->user->phone}})
    @component('mail::button', ['url' => route('admin.auctions.index', ['id' => $auction->id])])
        Voir
    @endcomponent
    Merci.
@endcomponent