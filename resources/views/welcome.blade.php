<x-layouts.app>
    <x-sections.hero />
    <x-sections.about />
    <x-sections.portfolio />
    <x-sections.contact />

    <!-- Modals / Spatial UIs -->
    @push('modals')
        <x-ui.project-drawer />
    @endpush
</x-layouts.app>
