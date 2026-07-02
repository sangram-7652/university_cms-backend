<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\Course;
use App\Models\Lead;
use App\Models\Specialization;
use App\Models\University;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Universities', University::count())
                ->description('Total Universities')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('primary'),

            Stat::make('Courses', Course::count())
                ->description('Total Courses')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('success'),

            Stat::make('Specializations', Specialization::count())
                ->description('Total Specializations')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('warning'),

            Stat::make('Blogs',Blog::count())
                ->description('Total Blogs')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success'),

            Stat::make('Leads Today', Lead::whereDate('created_at', today())->count())
                ->description('Today')
                ->descriptionIcon('heroicon-m-user-plus')
                ->color('warning'),

            Stat::make('Total Leads', Lead::count())
                ->description('All Time')
                ->descriptionIcon('heroicon-m-users')
                ->color('danger'),
        ];
    }
}