<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\StaticPage;
use App\Models\MetaTag;

class MigrateSeoData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seo:migrate-data {--dry-run : Show what would be migrated without actually doing it}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate existing SEO data from models to centralized meta_tags table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting SEO data migration...');
        
        if ($this->option('dry-run')) {
            $this->warn('DRY RUN MODE - No data will be actually migrated');
        }

        $totalMigrated = 0;

        // Migrate Blog SEO data
        $this->info('Migrating Blog SEO data...');
        $blogCount = $this->migrateBlogSeoData();
        $totalMigrated += $blogCount;
        $this->info("Migrated {$blogCount} blog SEO records");

        // Migrate Portfolio SEO data
        $this->info('Migrating Portfolio SEO data...');
        $portfolioCount = $this->migratePortfolioSeoData();
        $totalMigrated += $portfolioCount;
        $this->info("Migrated {$portfolioCount} portfolio SEO records");

        // Migrate StaticPage SEO data
        $this->info('Migrating StaticPage SEO data...');
        $staticPageCount = $this->migrateStaticPageSeoData();
        $totalMigrated += $staticPageCount;
        $this->info("Migrated {$staticPageCount} static page SEO records");

        $this->info("Migration completed! Total records migrated: {$totalMigrated}");
    }

    /**
     * Migrate Blog SEO data
     */
    protected function migrateBlogSeoData(): int
    {
        $blogs = Blog::all();
        $count = 0;

        foreach ($blogs as $blog) {
            $seoData = $this->extractBlogSeoData($blog);
            
            if ($this->hasSeoData($seoData)) {
                if (!$this->option('dry-run')) {
                    $blog->updateMetaTags($seoData);
                }
                $count++;
                $this->line("  - Blog: {$blog->title}");
            }
        }

        return $count;
    }

    /**
     * Migrate Portfolio SEO data
     */
    protected function migratePortfolioSeoData(): int
    {
        $portfolios = Portfolio::all();
        $count = 0;

        foreach ($portfolios as $portfolio) {
            $seoData = $this->extractPortfolioSeoData($portfolio);
            
            if ($this->hasSeoData($seoData)) {
                if (!$this->option('dry-run')) {
                    $portfolio->updateMetaTags($seoData);
                }
                $count++;
                $this->line("  - Portfolio: {$portfolio->title}");
            }
        }

        return $count;
    }

    /**
     * Migrate StaticPage SEO data
     */
    protected function migrateStaticPageSeoData(): int
    {
        $staticPages = StaticPage::all();
        $count = 0;

        foreach ($staticPages as $page) {
            $seoData = $this->extractStaticPageSeoData($page);
            
            if ($this->hasSeoData($seoData)) {
                if (!$this->option('dry-run')) {
                    $page->updateMetaTags($seoData);
                }
                $count++;
                $this->line("  - StaticPage: {$page->page_name}");
            }
        }

        return $count;
    }

    /**
     * Extract SEO data from Blog model
     */
    protected function extractBlogSeoData(Blog $blog): array
    {
        return [
            'title' => $blog->meta_title,
            'meta_description' => $blog->meta_description,
            'meta_keywords' => $blog->meta_keywords,
            'canonical_url' => $blog->canonical_url,
            'og_title' => $blog->og_title,
            'og_description' => $blog->og_description,
            'og_image' => $blog->og_image,
            'og_type' => $blog->og_type,
            'og_url' => $blog->og_url,
            'og_site_name' => $blog->og_site_name,
            'twitter_card' => $blog->twitter_card,
            'twitter_title' => $blog->twitter_title,
            'twitter_description' => $blog->twitter_description,
            'twitter_image' => $blog->twitter_image,
            'twitter_site' => $blog->twitter_site,
            'twitter_creator' => $blog->twitter_creator,
            'schema_markup' => $blog->schema_markup,
            'priority' => $blog->priority,
            'change_frequency' => $blog->change_frequency,
        ];
    }

    /**
     * Extract SEO data from Portfolio model
     */
    protected function extractPortfolioSeoData(Portfolio $portfolio): array
    {
        return [
            'title' => $portfolio->meta_title,
            'meta_description' => $portfolio->meta_description,
            'meta_keywords' => $portfolio->meta_keywords,
            'canonical_url' => $portfolio->canonical_url,
            'og_title' => $portfolio->og_title,
            'og_description' => $portfolio->og_description,
            'og_image' => $portfolio->og_image,
            'og_type' => $portfolio->og_type,
            'og_url' => $portfolio->og_url,
            'og_site_name' => $portfolio->og_site_name,
            'twitter_card' => $portfolio->twitter_card,
            'twitter_title' => $portfolio->twitter_title,
            'twitter_description' => $portfolio->twitter_description,
            'twitter_image' => $portfolio->twitter_image,
            'twitter_site' => $portfolio->twitter_site,
            'twitter_creator' => $portfolio->twitter_creator,
            'schema_markup' => $portfolio->schema_markup,
            'priority' => $portfolio->priority,
            'change_frequency' => $portfolio->change_frequency,
        ];
    }

    /**
     * Extract SEO data from StaticPage model
     */
    protected function extractStaticPageSeoData(StaticPage $page): array
    {
        return [
            'title' => $page->title,
            'meta_description' => $page->meta_description,
            'meta_keywords' => $page->meta_keywords,
            'canonical_url' => $page->canonical_url,
            'og_title' => $page->og_title,
            'og_description' => $page->og_description,
            'og_image' => $page->og_image,
            'og_type' => $page->og_type,
            'og_url' => $page->og_url,
            'og_site_name' => $page->og_site_name,
            'twitter_card' => $page->twitter_card,
            'twitter_title' => $page->twitter_title,
            'twitter_description' => $page->twitter_description,
            'twitter_image' => $page->twitter_image,
            'twitter_site' => $page->twitter_site,
            'twitter_creator' => $page->twitter_creator,
            'schema_markup' => $page->schema_markup,
            'priority' => $page->priority,
            'change_frequency' => $page->change_frequency,
        ];
    }

    /**
     * Check if SEO data exists
     */
    protected function hasSeoData(array $seoData): bool
    {
        return !empty(array_filter($seoData, function($value) {
            return !is_null($value) && $value !== '';
        }));
    }
}
