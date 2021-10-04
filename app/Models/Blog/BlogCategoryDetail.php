<?php

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * BlogCategoryDetail
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property-read \Blog $Blog
 * @property-read \BlogCategory $Category
 * @method static Builder|\BlogCategoryDetail newModelQuery()
 * @method static Builder|\BlogCategoryDetail newQuery()
 * @method static Builder|\BlogCategoryDetail query()
 * @method static Builder|\BlogCategoryDetail whereBlogId($value)
 * @method static Builder|\BlogCategoryDetail whereCategoryId($value)
 * @method static Builder|\BlogCategoryDetail whereCreatedAt($value)
 * @method static Builder|\BlogCategoryDetail whereCreatedBy($value)
 * @method static Builder|\BlogCategoryDetail whereId($value)
 * @method static Builder|\BlogCategoryDetail whereUpdatedAt($value)
 * @method static Builder|\BlogCategoryDetail whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property int $category_id
 * @property int $blog_id
 */
class BlogCategoryDetail extends BaseModel{
	protected $table='blogs_categories_details';
	public $timestamps = true;
	protected $primaryKey = 'id';

    public function Category(){
        return $this->belongsTo('BlogCategory','categoria_id');
    }

  public function Blog(){
    return $this->belongsTo('Blog','blog_id');
  }

// Función para asignar las categorías a un blog
	public static function assignCategories($blog, $categories){
		if($categories){
			foreach($categories as $cat){
				$existsDetail = BlogCategoryDetail::where('blog_id','=',$blog->id)->where('category_id','=',$cat)->first();
				if(!$existsDetail){
					$newDetail = new BlogCategoryDetail;
					$newDetail->blog_id = $blog->id;
					$newDetail->category_id = $cat;
					$newDetail->save();
				}
			}
		}
	}

// Función para borrar las categorías asociadas a un blog
	public static function deleteCategories($blog, $categories){
		if($categories){
			$deletedCategories = BlogCategoryDetail::where('blog_id','=',$blog->id)->whereNotIn('category_id',$categories)->get();
			foreach($deletedCategories as $cat){
				$cat->delete();
			}
		} else { // Si no ha seleccionado ninguna categoria, borra todos los detalles
			$categories = BlogCategoryDetail::where('blog_id','=',$blog->id)->get();
			foreach($categories as $cat){
				$cat->delete();
			}
		}
	}

}
