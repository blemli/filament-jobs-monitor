<?php

namespace Blemli\FilamentJobsMonitor\Resources\QueueMonitorResource\Pages;

use Blemli\FilamentJobsMonitor\Resources\QueueMonitorResource;
use Blemli\FilamentJobsMonitor\Resources\QueueMonitorResource\Widgets\QueueStatsOverview;
use Filament\Resources\Pages\ListRecords;

class ListQueueMonitors extends ListRecords
{
    public static string $resource = QueueMonitorResource::class;

    public function getActions(): array
    {
        return [];
    }

    public function getHeaderWidgets(): array
    {
        return [
            QueueStatsOverview::class,
        ];
    }

    public function getTitle(): string
    {
        return __('filament-jobs-monitor::translations.title');
    }
}
