<?php

namespace Blemli\FilamentJobsMonitor\Traits;

use Blemli\FilamentJobsMonitor\Models\QueueMonitor;

trait QueueProgress
{
    /**
     * Update progress.
     */
    public function setProgress(int $progress): void
    {
        $progress = min(100, max(0, $progress));

        if (! $monitor = $this->getQueueMonitor()) {
            return;
        }

        $monitor->update([
            'progress' => $progress,
        ]);

        $this->progressLastUpdated = time();
    }

    /**
     * Return Queue Monitor Model.
     */
    protected function getQueueMonitor(): ?QueueMonitor
    {
        if (! property_exists($this, 'job')) {
            return null;
        }

        if (! $this->job) {
            return null;
        }

        if (! $jobId = QueueMonitor::getJobId($this->job)) {
            return null;
        }

        $model = QueueMonitor::getModel();

        return $model::whereJobId($jobId)
            ->orderBy('started_at', 'desc')
            ->first();
    }
}
