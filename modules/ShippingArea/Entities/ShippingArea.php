<?php

namespace Modules\ShippingArea\Entities;

use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Carbon;
use Modules\Admin\Ui\AdminTable;
use Illuminate\Http\JsonResponse;
use Modules\Support\Eloquent\Model;
use Modules\Meta\Eloquent\HasMetaData;
use Modules\Support\Eloquent\Sluggable;
use Spatie\Sitemap\Contracts\Sitemapable;
use Modules\Support\Eloquent\Translatable;

class ShippingArea extends Model implements Sitemapable
{
    use Translatable, Sluggable, HasMetaData;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    // protected $table = 'shipping_areas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug', 'cost' , 'is_active'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    protected $translatedAttributes = ['name'];

    /**
     * The attribute that will be slugged.
     *
     * @var string
     */
    protected $slugAttribute = 'name';


    public static function urlForShippingArea($id)
    {
        return static::select('slug')->firstOrNew(['id' => $id])->url();
    }


    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addActiveGlobalScope();
    }


    public function url()
    {
        if (is_null($this->slug)) {
            return '#';
        }

        return localized_url(locale(), $this->slug);
    }


    /**
     * Get table data for the resource
     *
     * @return JsonResponse
     */
    public function table()
    {
        return new AdminTable($this->newQuery()->withoutGlobalScope('active'));
    }


    public function toSitemapTag(): Url|string|array
    {
        return Url::create($this->slug)
            ->setLastModificationDate(Carbon::create($this->updated_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1);
    }


    public static function get_shipping_areas(){
        $shipping = self::where('is_active', 1)
        ->with('translations') 
        ->select(['id', 'slug'])
        ->get()
        ->keyBy('slug') 
        ->toArray();

        $values = [];
        foreach($shipping as $key=>$single){
            $values[$key] = $single['name'];
        }

        return $values;
    }

    public static function name($code)
    {
        $list = self::get_shipping_areas();
        return $list[$code];
    }


}
