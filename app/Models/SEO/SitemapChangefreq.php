<?php

/**
 * App\Models\SEO\SitemapChangefreq
 *
 * @property int $id
 * @property string $name
 * @method static Builder|SitemapChangefreq newModelQuery()
 * @method static Builder|SitemapChangefreq newQuery()
 * @method static Builder|SitemapChangefreq query()
 * @method static Builder|SitemapChangefreq whereId($value)
 * @method static Builder|SitemapChangefreq whereName($value)
 * @mixin \Eloquent
 */
class SitemapChangefreq extends Eloquent{
	protected $table='sitemaps_changefreq';
	public $timestamps = false;
	protected $primaryKey = 'id';

}
