<?php

/**
 * App\Models\Web\HomeSlider
 *
 * @property int $id
 * @property int $active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @method static Builder|HomeSlider newModelQuery()
 * @method static Builder|HomeSlider newQuery()
 * @method static Builder|HomeSlider query()
 * @method static Builder|HomeSlider whereActive($value)
 * @method static Builder|HomeSlider whereAlt($value)
 * @method static Builder|HomeSlider whereCreatedAt($value)
 * @method static Builder|HomeSlider whereCreatedBy($value)
 * @method static Builder|HomeSlider whereId($value)
 * @method static Builder|HomeSlider whereImage($value)
 * @method static Builder|HomeSlider whereTitle($value)
 * @method static Builder|HomeSlider whereUpdatedAt($value)
 * @method static Builder|HomeSlider whereUpdatedBy($value)
 * @method static Builder|HomeSlider whereUrl($value)
 * @mixin Eloquent
 * @property string|null $title
 * @property string|null $url
 * @property string $image
 * @property string|null $alt
 */
class HomeSlider extends BaseModel{
	protected $table='home_slider';
	public $timestamps = true;
	protected $primaryKey = 'id';

	const IMAGE_PATH = '/public/sliders'; // Ruta donde se guardan las imágenes (desde /storage)
	const IMAGE_URL = '/storage/sliders/'; // Ruta para acceder o visualizar las imágenes
	const SITEMAP_PRIORITY = 0.4; // Prioridad por defecto para las entradas de blogs


	// Función para subir imagen del blog
    public function uploadImage($image){
        $file = $image->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        $name = $filename.'_'.date('Y').'-'.date('m').'-'.date('d').'.'.$extension;
        $image->storeAs($this::IMAGE_PATH, $name);

        return $name;
    }

	// Función para obtener la URL de la imagen
    public function Image(){
        return $this::IMAGE_URL.$this->image;
    }

	// Función para borrar la imagen
    public function deleteImage(){
        $file = HomeSlider::IMAGE_PATH.'/'.$this->image;
        Storage::delete($file);
    }


}
