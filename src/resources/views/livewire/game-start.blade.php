<div class="min-h-screen bg-background p-6 md:p-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-semibold tracking-tight text-foreground">Personajes</h1>
            <p class="text-sm text-muted-foreground mt-1">Selecciona dos personajes defensores para comenzar</p>
        </div>

        <!-- Search Section -->
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row gap-3">
                <input type="text" wire:model="search" placeholder="Buscar personajes por nombre..."
                    class="flex-1 px-4 py-2.5 bg-black text-foreground border border-input rounded-md text-sm placeholder:text-muted-foreground transition">
                <button wire:click="searchCharacters"
                    class="px-6 py-2.5 bg-primary text-primary-foreground rounded-md font-medium text-sm hover:bg-primary/90 transition-colors active:scale-95 shrink-0">
                    Buscar
                </button>
            </div>
        </div>

        <!-- Selected Characters Section -->
        @if ($selectedCharacters)
            <div class="mb-8 p-6 bg-card rounded-lg border border-border">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-lg font-semibold text-foreground">Defensores Seleccionados</h2>
                        <p class="text-sm text-muted-foreground mt-1">{{ count($selectedCharacters) }}/2 personajes</p>
                    </div>
                </div>

                <!-- Selected Characters List -->
                <div class="space-y-2 mb-6">
                    @foreach ($selectedCharacters as $character)
                        <div
                            class="flex items-center justify-between p-3 rounded-md bg-background border border-border hover:border-primary/50 transition-colors">
                            <div class="flex items-center gap-3 flex-1 min-w-0">
                                <img src="{{ $character['image'] }}" alt="{{ $character['name'] }}"
                                    class="w-12 h-12 rounded object-cover shrink-0">
                                <div class="min-w-0">
                                    <p class="font-medium text-sm text-foreground truncate">{{ $character['name'] }}</p>
                                    <p class="text-xs text-muted-foreground">ID: {{ $character['id'] }}</p>
                                </div>
                            </div>
                            <button wire:click="deleteSelectedCharacter({{ $character['id'] }})"
                                class="ml-2 px-3 py-1.5 text-xs font-medium text-destructive hover:bg-destructive/10 rounded transition-colors
                                hover:underline ">
                                Eliminar
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- <CHANGE> Start Game button - visible and enabled only when 2 characters selected -->
                <button wire:click="startGame" @if (count($selectedCharacters) !== 2) disabled @endif
                    class="w-full px-6 py-3 bg-primary text-primary-foreground font-semibold rounded-lg hover:bg-primary/90 transition-all active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-primary">
                    @if (count($selectedCharacters) === 2)
                        Empezar Juego
                    @else
                        Selecciona 2 personajes para jugar
                    @endif
                </button>
            </div>
        @endif

        <!-- Characters List -->
        @if (!empty($characters))
            <div class="space-y-3 max-h-screen overflow-y-auto">
                @foreach ($characters as $character)
                    <div
                        class="flex items-center gap-4 p-4 rounded-lg border border-border bg-card hover:bg-accent/50 transition-colors">
                        <!-- Avatar -->
                        <img src="{{ $character['image'] }}" alt="{{ $character['name'] }}"
                            class="w-14 h-14 rounded-md object-cover shrink-0">

                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-foreground truncate">{{ $character['name'] }}</h3>
                            <p class="text-sm text-muted-foreground mt-0.5">
                                {{ $character['species'] ?? 'Desconocido' }} •
                                {{ $character['status'] ?? 'Desconocido' }}
                            </p>
                        </div>

                        <!-- Select Button -->
                        <button type="button" wire:click="selectCharacter({{ $character['id'] }})"
                            @if (in_array($character['id'], array_column($selectedCharacters, 'id')) || count($selectedCharacters) >= 2) disabled @endif
                            class="px-5 py-2 bg-primary text-primary-foreground rounded-md font-medium text-sm hover:bg-primary/90 transition-colors active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed shrink-0">
                            @if (in_array($character['id'], array_column($selectedCharacters, 'id')))
                                Seleccionado
                            @else
                                Seleccionar
                            @endif
                        </button>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-center gap-3 mt-8 pt-6 border-t border-border">
                <button wire:click="previousPage" @if (!isset($info['prev'])) disabled @endif
                    class="px-4 py-2 rounded-md text-sm font-medium border border-input bg-background hover:bg-accent transition-colors disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-background">
                    Anterior
                </button>

                <span class="text-sm text-muted-foreground px-3">
                    Página {{ $page }}
                </span>

                <button wire:click="nextPage" @if (!isset($info['next'])) disabled @endif
                    class="px-4 py-2 rounded-md text-sm font-medium border border-input bg-background hover:bg-accent transition-colors disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-background">
                    Siguiente
                </button>
            </div>
        @else
            <!-- Empty State -->
            <div
                class="flex flex-col items-center justify-center py-16 px-4 rounded-lg border border-dashed border-border">
                <svg class="w-12 h-12 text-muted-foreground mb-3" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10a4 4 0 118 0 4 4 0 01-8 0zM21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <p class="text-muted-foreground text-sm">No se encontraron personajes. Intenta ajustar tu búsqueda.</p>
            </div>
        @endif
    </div>
</div>
