<div class="grid grid-cols-1 gap-8 mt-8 sm:grid-cols-2">
    <div>
        <x-morent.cards.hero-card bg="{{ asset('imgs/bg/hero-bg-1.png') }}" button="Rent a car"
            description="Rent the best cars here." title="Rental Cars" />
    </div>
    <div class="hidden sm:block">
        <x-morent.cards.hero-card bg="{{ asset('imgs/bg/hero-bg-2.png') }}" button="Buy a Car"
            description="The best new and used cars at the best prices. Biggest car range on the planet!"
            title="Cars for Sale" />
    </div>
</div>
