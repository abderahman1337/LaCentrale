<div>
    @if ($vehicule->auctions->isNotEmpty())
    <div class="mt-4 flex flex-col gap-3">
        @foreach ($vehicule->auctions as $auction)
            <div class="flex items-center justify-between bg-gray-50 rounded-lg py-2 px-4 border">
                <div class="flex items-center gap-2">
                    <div>
                        <div class="text-sm text-left">
                            @php
                            $name = $auction->user->name;
                            $length = strlen($name);
                            if ($length <= 2) {
                                echo $name;
                            }else{
                                $firstChar = substr($name, 0, 1); // Get the first character
                                $lastChar = substr($name, -1);    // Get the last character
                                $maskedName = $firstChar;          // Start with the first character
                                
                                // Replace middle characters with stars
                                for ($i = 1; $i < 10; $i++) {
                                    $maskedName .= '*';
                                }
                                
                                $maskedName .= $lastChar;  // Append the last character
                                echo $maskedName;
                            }
                            @endphp
                        </div>
                        <div class="text-left"><span class="whitespace-nowrap font-semibold">{{number_format($auction->price, 0 , ' ', ' ')}} €</span></div>
                    </div>
                </div>
                <div>
                    @if ($auction->status == 'in_progress')
                    <div class="py-1.5 px-3 rounded-full text-xs text-gray-800 bg-gray-400">En cours</div>
                    @elseif($auction->status == 'sold')
                    <div class="py-1.5 px-3 rounded-full text-xs text-red-800 bg-red-400">Vendu</div>
                    @endif
                </div>
                <div class="text-sm">{{Carbon\Carbon::parse($auction->created_at)->diffForHumans(['short' => true])}}</div>
            </div>
        @endforeach
    </div>
    @endif
</div>
