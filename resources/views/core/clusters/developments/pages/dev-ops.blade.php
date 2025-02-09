<x-filament-panels::page>
    <div class="cards">
        <div class="card">
            <h2 class="card-title-icon">
                <x-icon name="core.outline.cached" class="animate-pulse" />
                Optimize
            </h2>
            <p class="card-content">
                Digunakan untuk mengoptimalkan kinerja Sistem secara keseluruhan.
            </p>
            {{ $this->optimize }}
        </div>
        <div class="card">
            <h2 class="card-title-icon">
                <x-icon name="core.outline.cached" class="animate-pulse" />
                Optimize CleanUp
            </h2>
            <p class="card-content">
                Digunakan untuk mengoptimalkan kinerja Sistem secara keseluruhan.
            </p>
            {{ $this->optimizeClear }}
        </div>
        <div class="card">
            <h2 class="card-title-icon">
                <x-icon name="core.outline.cached" class="animate-pulse" />
                Run Migration
            </h2>
            <p class="card-content">
                Digunakan untuk mengoptimalkan kinerja Sistem secara keseluruhan.
            </p>
            {{ $this->runMigrate }}
        </div>
        <div class="card">
            <h2 class="card-title-icon">
                <x-icon name="core.outline.query_stats" class="animate-pulse" />
                Run Queue
            </h2>
            <p class="card-content">
                Digunakan untuk mengoptimalkan kinerja Sistem secara keseluruhan.
            </p>
            {{ $this->runQueue }}
        </div>
        <div class="card">
            <h2 class="card-title-icon">
                <x-icon name="core.outline.cloud" class="animate-pulse" />
                Storage Link
            </h2>
            <p class="card-content">
                Digunakan untuk mengoptimalkan kinerja Sistem secara keseluruhan.
            </p>
            {{ $this->storageLink }}
        </div>
        <div class="card">
            <h2 class="card-title-icon">
                <x-icon name="core.outline.cloud_off" class="animate-pulse" />
                Storage Unlink
            </h2>
            <p class="card-content">
                Digunakan untuk mengoptimalkan kinerja Sistem secara keseluruhan.
            </p>
            {{ $this->storageUnlink }}
        </div>
        <div class="card">
            <h2 class="card-title-icon">
                <x-icon name="core.outline.lock_clock" class="animate-pulse" />
                Permission Sync
            </h2>
            <p class="card-content">
                Digunakan untuk mengoptimalkan kinerja Sistem secara keseluruhan.
            </p>
            {{ $this->permissionSync }}
        </div>
    </div>

</x-filament-panels::page>