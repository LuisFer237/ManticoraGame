<div class="min-h-screen bg-background text-foreground">
    <!-- Background Effect -->
    <div class="fixed inset-0 bg-gradient-to-br from-primary/5 to-transparent pointer-events-none"></div>

    <!-- Content -->
    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen px-4 py-12">
        <div class="max-w-2xl w-full text-center">
            <!-- Logo/Title Section -->
            <div class="mb-12">
                <div class="inline-flex items-center justify-center rounded-full bg-primary/10 border border-primary/15 mb-6 bg-card p-3">
                    <x-ionicon-dice-sharp class="size-24" />
                </div>
                <h1 class="text-5xl md:text-6xl font-bold tracking-tight mb-3">Juego de la Mantícora</h1>
                <p class="text-lg text-muted-foreground">Protege tu ciudad del ataque de la Mantícora</p>
            </div>

            <!-- Game Rules Section -->
            <div class="mb-12 space-y-6 text-left ">

                <!-- Rule 1 -->
                <div class="p-4 rounded-lg bg-card border border-border hover:border-primary/50 transition-colors">
                    <div class="flex gap-4">
                        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-primary/10 text-primary font-semibold text-sm shrink-0">1</div>
                        <div>
                            <h3 class="font-semibold text-foreground mb-1">Selecciona tus defensores</h3>
                            <p class="text-sm text-muted-foreground">Elige 2 personajes que protegerán tu ciudad. Cada uno recibirá 100 oros para equiparse.</p>
                        </div>
                    </div>
                </div>

                <!-- Rule 2 -->
                <div class="p-4 rounded-lg bg-card border border-border hover:border-primary/50 transition-colors">
                    <div class="flex gap-4">
                        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-primary/10 text-primary font-semibold text-sm shrink-0">2</div>
                        <div>
                            <h3 class="font-semibold text-foreground mb-1">Compra armas en la tienda</h3>
                            <p class="text-sm text-muted-foreground">Gran Cañón (80 oros), Metralla (60), Mosquete (50), Pistola (30) o Granada (10). Cada arma tiene diferente alcance y potencia.</p>
                        </div>
                    </div>
                </div>

                <!-- Rule 3 -->
                <div class="p-4 rounded-lg bg-card border border-border hover:border-primary/50 transition-colors">
                    <div class="flex gap-4">
                        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-primary/10 text-primary font-semibold text-sm shrink-0">3</div>
                        <div>
                            <h3 class="font-semibold text-foreground mb-1">Defiende tu ciudad</h3>
                            <p class="text-sm text-muted-foreground">La Mantícora ataca con posiciones aleatorias. Cada defensor tiene 5 disparos. Calcula el alcance correctamente para maximizar daño.</p>
                        </div>
                    </div>
                </div>

                <!-- Rule 4 -->
                <div class="p-4 rounded-lg bg-card border border-border hover:border-primary/50 transition-colors">
                    <div class="flex gap-4">
                        <div class="flex items-center justify-center w-8 h-8 rounded-full bg-primary/10 text-primary font-semibold text-sm shrink-0">4</div>
                        <div>
                            <h3 class="font-semibold text-foreground mb-1">Victoria o derrota</h3>
                            <p class="text-sm text-muted-foreground">Tu ciudad comienza con 15 puntos de vida y la Mantícora con 10. Derrótala antes de que destruya tu ciudad.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <form action="{{ route('game.start') }}" method="get" class="mb-8">
                <button type="submit"
                    class="w-full px-8 py-4 bg-primary text-primary-foreground font-semibold text-lg rounded-lg hover:bg-primary/90 transition-all active:scale-95 shadow-lg hover:shadow-xl"
                >
                    Empezar Juego
                </button>
            </form> 
        </div>
    </div>
</div>