<div class="min-h-screen bg-background p-6 md:p-8">
    <div class="max-w-2xl mx-auto">
        @if ($character)
            <!-- Header con botón atrás -->
            <div class="mb-8">
                <a href="{{ route('game.start') }}" class="text-sm text-primary hover:text-primary/80 transition-colors mb-4 inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Volver
                </a>
            </div>

            <!-- Character Header -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row gap-6 mb-8">
                    <!-- Image -->
                    <div class="shrink-0">
                        <img src="{{ $character['image'] }}" 
                            alt="{{ $character['name'] }}"
                            class="w-40 h-40 rounded-lg object-cover shadow-sm border border-border"
                        >
                    </div>

                    <!-- Info -->
                    <div class="flex-1">
                        <h1 class="text-4xl font-bold tracking-tight text-foreground mb-2">{{ $character['name'] }}</h1>
                        <div class="flex flex-wrap gap-2 mb-6">
                            <!-- Status Badge -->
                            <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-medium
                                @if ($character['status'] === 'Alive')
                                    bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400
                                @elseif ($character['status'] === 'Dead')
                                    bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400
                                @else
                                    bg-gray-100 text-gray-700 dark:bg-gray-900/30 dark:text-gray-400
                                @endif
                            ">
                                <span class="w-2 h-2 rounded-full
                                    @if ($character['status'] === 'Alive') bg-green-500 @elseif ($character['status'] === 'Dead') bg-red-500 @else bg-gray-500 @endif">
                                </span>
                                {{ $character['status'] }}
                            </span>

                            <!-- Gender Badge -->
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-secondary text-secondary-foreground">
                                {{ $character['gender'] }}
                            </span>

                            <!-- Species Badge -->
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-accent text-accent-foreground">
                                {{ $character['species'] }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Details Grid -->
            <div class="grid gap-4 md:grid-cols-2">
                <!-- Origin Card -->
                <div class="p-6 rounded-lg border border-border bg-card hover:border-primary/50 transition-colors">
                    <h3 class="text-sm font-semibold text-muted-foreground uppercase tracking-wide mb-2">Origen</h3>
                    <p class="text-lg font-medium text-foreground">{{ $character['origin']['name'] ?? 'Desconocido' }}</p>
                </div>

                <!-- Location Card -->
                <div class="p-6 rounded-lg border border-border bg-card hover:border-primary/50 transition-colors">
                    <h3 class="text-sm font-semibold text-muted-foreground uppercase tracking-wide mb-2">Ubicación</h3>
                    <p class="text-lg font-medium text-foreground">{{ $character['location']['name'] ?? 'Desconocida' }}</p>
                </div>

                <!-- Status Card -->
                <div class="p-6 rounded-lg border border-border bg-card hover:border-primary/50 transition-colors">
                    <h3 class="text-sm font-semibold text-muted-foreground uppercase tracking-wide mb-2">Estado</h3>
                    <p class="text-lg font-medium text-foreground">{{ $character['status'] }}</p>
                </div>

                <!-- Species Card -->
                <div class="p-6 rounded-lg border border-border bg-card hover:border-primary/50 transition-colors">
                    <h3 class="text-sm font-semibold text-muted-foreground uppercase tracking-wide mb-2">Especie</h3>
                    <p class="text-lg font-medium text-foreground">{{ $character['species'] }}</p>
                </div>

                <!-- Gender Card -->
                <div class="p-6 rounded-lg border border-border bg-card hover:border-primary/50 transition-colors">
                    <h3 class="text-sm font-semibold text-muted-foreground uppercase tracking-wide mb-2">Género</h3>
                    <p class="text-lg font-medium text-foreground">{{ $character['gender'] }}</p>
                </div>
            </div>

        @else
            <!-- Empty State -->
            <div class="flex flex-col items-center justify-center py-20 px-4">
                <svg class="w-16 h-16 text-muted-foreground mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4v2m0 4v2M12 3a9 9 0 110 18 9 9 0 010-18z"></path>
                </svg>
                <h2 class="text-2xl font-semibold text-foreground mb-2">Personaje no encontrado</h2>
                <p class="text-muted-foreground mb-6">Lo sentimos, el personaje que buscas no existe.</p>
                <a href="{{ route('characters.index') }}" class="px-6 py-2.5 bg-primary text-primary-foreground rounded-lg font-medium hover:bg-primary/90 transition-colors">
                    Volver al Listado
                </a>
            </div>
        @endif
    </div>
</div>