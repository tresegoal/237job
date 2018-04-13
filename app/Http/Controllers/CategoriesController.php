<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;

use App\Repositories\CategoryRepository;

use App\Category;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{


    protected $categoryRepository;

    protected $nbrPerPage = 10;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->getPaginate($this->nbrPerPage);
        $links = $categories->render();

        return view('Categories/index', compact('categories', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        //$this->setAdmin($request);

        $category = $this->categoryRepository->store($request->all());
        
        flash("La catégorie '" . $request->input('name') . "' a été ajoutée avec succès.");
        
        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->getById($id);

        return view('Categories/edit',  compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        //$this->setAdmin($request);

        $this->categoryRepository->update($id, $request->all());

        flash("La catégorie " . $request->input('name') . " a été modifiée avec succès");
        
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->destroy($id);

        flash("La catégorie a été supprimée avec succès","danger");

        return back();
    }

    public function active($id)
    {
        
        $category = $this->categoryRepository->getById($id);

        $category->confirmed = 1;

        $category->save();

        flash("La catégorie '" . $category->name . "' a été activée");
       
        return back();
    }

    public function desactive($id)
    {
        
        $category = $this->categoryRepository->getById($id);

        $category->confirmed = 0;

        $category->save();
       
        flash("La catégorie '" . $category->name . "' a été desactivée","danger");
        return back();
    }
}
