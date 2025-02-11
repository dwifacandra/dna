<x-filament-panels::page>
    <div class="cards">
        <div class="card">
            <h2 class="card-title-icon">
                <x-icon name="core.outline.query_stats" class="animate-pulse" />
                Optimize
            </h2>
            <p class="card-content">
                Cache framework bootstrap, configuration, and metadata to increase performance.
            </p>
            {{ $this->optimize }}
        </div>
        <div class="card">
            <h2 class="card-title-icon">
                <x-icon name="core.outline.query_stats" class="animate-pulse" />
                Optimize CleanUp
            </h2>
            <p class="card-content">
                Remove the cached bootstrap files.
            </p>
            {{ $this->optimizeClear }}
        </div>
        <div class="card">
            <h2 class="card-title-icon">
                <x-icon name="core.outline.cached" class="animate-pulse" />
                Run Migration
            </h2>
            <p class="card-content">
                Run the database migrations and Seeder.
            </p>
            {{ $this->runMigrate }}
        </div>
        <div class="card">
            <h2 class="card-title-icon">
                <x-icon name="core.outline.cloud" class="animate-pulse" />
                Storage Link
            </h2>
            <p class="card-content">
                Create the symbolic links configured for the application.
            </p>
            {{ $this->storageLink }}
        </div>
        <div class="card">
            <h2 class="card-title-icon">
                <x-icon name="core.outline.cloud_off" class="animate-pulse" />
                Storage Unlink
            </h2>
            <p class="card-content">
                Delete existing symbolic links configured for the application.
            </p>
            {{ $this->storageUnlink }}
        </div>
        <div class="card">
            <h2 class="card-title-icon">
                <x-icon name="core.outline.lock_clock" class="animate-pulse" />
                Permission Sync
            </h2>
            <p class="card-content">
                Generates permissions through Models or Filament Resources and custom permissions.
            </p>
            {{ $this->permissionSync }}
        </div>
    </div>

</x-filament-panels::page>
