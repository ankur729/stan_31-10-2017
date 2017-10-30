<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CommunicateSubCategory;

use App\CommunicateCategory;

class CommunicateSubCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       try{
        $category=CommunicateCategory::all();

        foreach ($category as $key => $value) {
            $myarr[$value->id]=$value->name;
        }

        $subcategories=CommunicateSubCategory::all();
        }
             catch(\Illuminate\Database\QueryException $ex)
        {
            \Session::flash('message','Query Exception Occurred. Call Developer!');

         return \Redirect::back();
        }
  // dd($myarr);
        return view('pages.admin.communicate.subcategorylist',compact('subcategories','myarr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         try{
        $category=CommunicateCategory::all();

        foreach ($category as $key => $value) {
            $myarr[$value->id]=$value->name;
             }
        }
             catch(\Illuminate\Database\QueryException $ex)
        {
            \Session::flash('message','Query Exception Occurred. Call Developer!');

         return \Redirect::back();
        }
        return view('pages.admin.communicate.subcategoryadd',compact('myarr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //   return $request->all();
        //
        $this->validate($request, [  'name' => 'required' ,
                                     'category_id'=>'required'
                                          ]);
           $subcat=new CommunicateSubCategory;
           $subcat->name=$request->name;
           $subcat->cat_id=$request->category_id;
          try{
        $subcat->save();
        }
     catch(\Illuminate\Database\QueryException $ex)
        {
            \Session::flash('message','Query Exception Occurred. Call Developer!');

         return \Redirect::back();
        }
        \Session::flash('message','Sub Category Successfully Added !');
         return \Redirect('admin/communicate_subcategory/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //

         try{
        $subcategory=CommunicateSubCategory::findOrFail($request->id);
        $category=CommunicateCategory::all();

        foreach ($category as $key => $value) {
            $myarr[$value->id]=$value->name;
             }
        }
             catch(\Illuminate\Database\QueryException $ex)
        {
            \Session::flash('message','Query Exception Occurred. Call Developer!');

         return \Redirect::back();
        }
        return view('pages.admin.communicate.subcategoryedit', compact('subcategory','myarr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request, [  'name' => 'required|regex:/^[a-zA-Z0-9 ]/|unique:communicate_sub_categories'   ]);
          try{
            CommunicateSubCategory::where('id', $request->id)
        
                              ->update(

                                [
                                 'name'=>$request->name,
                                 'cat_id'=>$request->cat_id
                                 ]);
                              }
                           catch(\Illuminate\Database\QueryException $ex)
        {
            \Session::flash('message','Query Exception Occurred. Call Developer!');

         return \Redirect::back();
        }
                                \Session::flash('message','Sub Category Successfully Updated !');
         return \Redirect('admin/communicate_subcategory/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{
            
           CommunicateSubCategory::destroy($request->id);
       }
        catch(\Illuminate\Database\QueryException $ex)
        {
            \Session::flash('message','Query Exception Occurred. Call Developer!');

         return \Redirect::back();
        }
         \Session::flash('message','Sub Category Successfully Deleted !');
            return \Redirect::back();
    
    }

  
    public function getSubCategories(Request $request,$id=null){ 

       // return $request->all();
            $subcategories=CommunicateSubCategory::where('cat_id',$_GET['c_id'])->get();
            $subcategories=$subcategories->toArray();
            foreach ($subcategories as $value) {              
                echo "<option value=".$value['id'].">".$value['name']."</option>";
            }            
    }
    
}
