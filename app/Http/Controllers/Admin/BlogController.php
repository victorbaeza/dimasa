<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enums\OperationType;
use BlogCategory;
use BlogCategoryDetail;
use Exception;
use Helper;
use Illuminate\Http\Request;
use Redirect;
use View;
use Blog;

class BlogController extends Controller
{
    //region Blogs
    public function list(Request $request)
    {
       $blogs = Blog::query();

        $q = $request->input('q');
        if (!empty($q))
        {
            $blogs = $blogs->where('title', 'LIKE', '%' . $q . '%')->orWhere('description', 'LIKE', '%' . $q . '%');
        }

        $order_col = $request->input('order_col');
        $order = $request->input('order');

        $blogs = Helper::do_orderColumn($blogs, $order_col, $order,'id', 'DESC');

        $blogs = $blogs->paginate(self::NUM_PAGED_RESULTS);

        return view('admin.blogs.list', compact('blogs', 'q', 'order_col', 'order'));
    }

    public function create()
    {
        $categories = BlogCategory::all();

        return view('admin.blogs.create',compact('categories'));
    }

    public function do_create(Request $request)
    {
        $blog = new Blog;
        $this->saveData($blog, $request, true);

        // $blog_data = $this->getBlogFormData($request);
        // $blog = Blog::create($blog_data);
        //
        // $image = $request->file('image');
        // if ($image) $blog->image = $blog->uploadImage($image);
        //
        // // Asignar Categorías al blog
        // BlogCategoryDetail::assignCategories($blog, $request->input('category'));
        // if($blog->active){
        //     foreach(Helper::getLanguages() as $lang){
        //         if(!empty($blog_data[$lang])){
        //             $blog->generateSitemap(OperationType::CREATE(), null, $blog_data[$lang]['slug'], $lang);
        //         }
        //     }
        // }

        return redirect()->route('admin.blog.list')->with('success', 'El blog ha sido creado correctamente!');
    }

    private function saveData (Blog $blog, Request $request, $new = false)
    {
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->content = $request->input('content');
        if ($new)
        {
            $blog->slug = $blog->assignSlug($blog->title);
        }
        $blog->seo_keywords = $request->input('seo_keywords');
        $blog->seo_title = $request->input('seo_title');
        $blog->seo_description = $request->input('seo_description');
        $blog->save();

        if ($request->file('image')) $blog->uploadImage($request->file('image'));

        // Borrar categorías deseleccionadas y Asignar Categorías al blog
        if (!$new)
        {
            BlogCategoryDetail::deleteCategories($blog, $request->input('category'));
        }
        BlogCategoryDetail::assignCategories($blog, $request->input('category'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }


    public function do_edit(Request $request)
    {
        $blog = Blog::findOrFail($request->input('id'));

        $this->saveData($blog, $request);

        return redirect()->action('Admin\BlogController@list')->with('success', 'El blog ha sido modificado correctamente!');
    }

    public function delete(Request $request, int $id){
        try {
            $blog = Blog::whereId($id)->first();
            $blog->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'El blog a eliminar no existe');
        }

        return redirect()->route('admin.blog.list')->with('success', 'El blog ha sido borrada correctamente');
    }

    private function getBlogFormData(Request $request, int $id = 0): array
    {
        $blog_data = [
            'active' => boolval($request->input('active')),
            'featured' => boolval($request->input('featured'))
        ];
        $this->validateBlog($request);
        foreach (Helper::getLanguages() as $language) {
            $title = $request->input($language . '_title');
            if ($title) {
                $this->validateBlogTranslation($request, $language);
                $blog_data[$language] = [
                    'title' => $title,
                    'description' => $request->input($language . '_description'),
                    'content' => $request->input($language . '_content'),
                    'slug' => Blog::assignSlug($title, $id),
                    'title_seo' => $request->input($language.'_title_seo'),
                    'description_seo' => $request->input($language.'_description_seo'),
                    'keywords' => Helper::keywordsToString($request->input($language.'_keywords'))
                ];
            }
        }
        return $blog_data;
    }

    private function validateBlogTranslation(Request $request, string $language)
    {
        $request->validate(Blog::rulesByLanguage($language), Blog::rulesMessagesByLanguage($language));
    }

    private function validateBlog(Request $request){
        $request->validate(Blog::$rules, Blog::$rulesMessages);
    }
    //endregion Blogs


    /*
    * Categorías
    */
    public function listBlogCategories()
    {
        $categories = BlogCategory::whereNotNull('id');
        $categories = $categories->paginate(self::NUM_PAGED_RESULTS);

        return view('admin.blogs.categories.list', compact('categories'));
    }

    public function createBlogCategory()
    {
        return view('admin.blogs.categories.create');
    }

    public function do_createBlogCategory(Request $request)
    {
        // $category_data = array();
        //
        // foreach(Helper::getLanguages() as $language){
        //     $name = $request->input($language.'_name');
        //     if(!empty($name)){
        //         $category_data[$language] = [
        //             'name' => $name,
        //             'slug' => BlogCategory::assignSlug($name),
        //             'title_seo' => $request->input($language.'_title_seo'),
        //             'description_seo' => $request->input($language.'_description_seo'),
        //             'keywords' => Helper::keywordsToString($request->input($language.'_keywords'))
        //         ];
        //     }
        // }
        // $category = BlogCategory::create($category_data);
        //
        // foreach (Helper::getLanguages() as $lang){
        //     if(!empty($category_data[$lang]))
        //         $category->generateSitemap(OperationType::CREATE(), null, $category_data[$lang]['slug'], $lang);
        // }

        $category = new BlogCategory;
        $this->saveDataCategory($category, $request, true);

        return redirect()->route('admin.blog.category.list')->with('success', 'La categoria ha sido creada correctamente');
    }

    private function saveDataCategory (BlogCategory $category, Request $request, $new=false)
    {
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        if ($new)
        {
            $category->slug = $category->assignSlug($category->name);
        }
        $category->seo_title = $request->input('seo_title');
        $category->seo_description = $request->input('seo_description');
        $category->seo_keywords = $request->input('seo_keywords');

        $category->save();
    }

    public function editBlogCategory($id)
    {
        $category = BlogCategory::findOrFail($id);

        return view('admin.blogs.categories.edit', compact('category'));
    }

    public function do_editBlogCategory(Request $request)
    {
        $category = BlogCategory::findOrFail($request->input('id'));

        $this->saveDataCategory($category, $request);

        return redirect()->route('admin.blog.category.list')->with('success', 'La categoria ha sido modificada correctamente');
    }

    public function deleteBlogCategory(Request $request, int $id){
        try {
            $category = BlogCategory::whereId($id)->first();
            $category->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'La categoría a eliminar no existe');
        }

        return redirect()->route('admin.blog.category.list')->with('success', 'La categoría ha sido borrada correctamente');
    }
    /*
    *   END Categorías
    */


}
