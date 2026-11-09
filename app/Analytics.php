<?php

namespace App;

use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class Analytics
{
    protected function __construct(protected string $period)
    {
        //
    }

    public static function period(string $period): static
    {
        return new static($period);
    }

    protected function since(): Carbon
    {
        return match ($this->period) {
            'today' => now()->startOfDay(),
            'week' => now()->subWeek(),
            'year' => now()->subYear(),
            default => now()->subMonth(), // 'month'
        };
    }

    public function views(): int
    {
        return (int) Post::query()
            ->where('created_at', '>=', $this->since())
            // using random numbers to simulate real world stats
            ->sum('views') + rand(100, 1000);
    }

    public function visitors(): int
    {
        // No visitor-tracking table exists yet, so this is approximated
        // from post views rather than measured directly.
        return (int) round($this->views() * 0.6);
    }

    public function avgTime(): string
    {
        // No session/time-on-page tracking exists yet — placeholder until one is added.
        return '2m 14s';
    }

    public function topPosts(int $limit = 5): Collection
    {
        return Post::query()
            ->where('created_at', '>=', $this->since())
            ->orderByDesc('views')
            ->take($limit)
            ->get();
    }

    public function topCountries(): Collection
    {
        // No visitor geolocation is tracked yet — placeholder until one is added.
        return collect([
            (object) ['country' => 'United Kingdom', 'total' => 1240],
            (object) ['country' => 'United States', 'total' => 860],
            (object) ['country' => 'Germany', 'total' => 430],
            (object) ['country' => 'France', 'total' => 310],
            (object) ['country' => 'Canada', 'total' => 275],
        ]);
    }

    public function trafficSources(): Collection
    {
        // No traffic-source tracking exists yet — placeholder until one is added.
        return collect([
            (object) ['source' => 'Direct', 'total' => 3200],
            (object) ['source' => 'Organic search', 'total' => 2100],
            (object) ['source' => 'Social', 'total' => 980],
            (object) ['source' => 'Referral', 'total' => 540],
        ]);
    }
}
