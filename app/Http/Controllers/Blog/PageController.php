<?php

namespace App\Http\Controllers\Blog;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\PageFormRequest;
use App\Repositories\PageRepo;
use App\Repositories\MetaDataRepo;
use App\Trait\HandleException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    use HandleException;
    private $page;
    private $metaData;
    public function __construct(PageRepo $pageRepos, MetaDataRepo $metaDataRepos){
        $this->page=$pageRepos;
        $this->metaData=$metaDataRepos;
    }
    public function index()
    {
   
        return view('adminpages.pages.index', array('page' =>$this->page->all()));
    }
    public function create()
    {
        
        return view('adminpages.pages.create',array('meta_data' =>$this->metaData->all()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageFormRequest $request)
    {


        DB::beginTransaction();

        try {
            $fileName = " ";
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                 // Move the file to the storage area (storage/app/public/files)
                $file->storeAs('public/files', $fileName);
               
            }
            
            $page = Page::FirstORcreate([
                'title' => $request->title,
                'content' => $request->content,
                'post_image' => $fileName
            ]);
           unset($request['_token']);
            unset($request['title']);
           unset($request['content']);
          
            $fields=$request->except('file');
          

            foreach ($fields as $key => $value) {
                if($value){
                \App\Models\PageMetaData::FirstOrCreate([
                    'page_id' => $page->id,
                    'meta_data_id' => $key,
                    'meta_description' => $value
                ]);
              }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        } 
        return 'successful';
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        //
    }
}
