<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index(Request $request){
        $pages = Page::latest()
        ->when($request->id, function ($q) use($request){
            $q->where('id', $request->id);
        })
        ->when($request->q, function ($q) use($request){
            $q->where("title", "LIKE", "%{$request->q}%");
        })
        ->when($request->slug, function ($q) use($request){
            $q->where("slug", $request->slug);
        })->with('author')
        ->withCount('visits')
        ->paginate();
        return view('admin.pages.index', compact('pages'));
    }

    public function create(){
        return view('admin.pages.create');
    }

    public function store(Request $request){
        $count = 1;
        $slug=Str::slug(strip_tags($request->page_slug),'-',null);
        while(Page::where('slug','=', $slug)->exists()){
            $slug = $request->page_slug.'-'.$count++;
        }
        $request->merge(['slug' => $slug]);
        $request->validate([
            'page_title' => 'required|string|max:255',
            'page_slug' => 'required|string|max:255|unique:pages,slug',
            'description' => 'nullable'
        ]);
        Page::create([
            'title'     => strip_tags($request->page_title),
            'slug'      => $slug,
            'content'   => $request->description,
            'user_id'   => auth()->user()->id,
            'is_active' => $request->has('visibility')?1:0
        ]);
        return back()->with('success', "La page a été ajoutée avec succès");
    }
    public function show(Page $page){
        return view('admin.pages.show', compact('page'));
    }
    public function edit(Page $page){
        return view('admin.pages.edit', compact('page'));
    }
    public function update(Request $request, Page $page){
        $request->validate([
            'page_slug'      => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'page_title'     => 'required|string|max:255',
            'description'   => 'nullable'
        ]);
        $page->update([
            'slug'      => Str::slug(strip_tags($request->page_slug),'-',null),
            'title'     => strip_tags($request->page_title),
            'content'   => $request->description
        ]);
        if($page->user_id == null){
            $page->update(['user_id', auth()->user()->id]);
        }
        return back()->with('success', "La page a été mise à jour avec succès");
    }
    public function destroy(Page $page){
        $page->delete();
        return back()->with('success', "La page a été supprimée avec succès");
    }
    public function setStatus(Request $request){
        $validator = Validator::make($request->all(), [
            'status' => 'integer|in:0,1',
            'page_id' => 'required|integer|exists:pages,id'
        ]);
        if($validator->fails()){
            return response()->json(['error' => __("Error, please try later!")]);
        }
        $page = Page::find($request->page_id);
        $page->update(['is_active' => $request->status]);
        return response()->json(['success' => __("Status updated successfully")]);
    }

    public function visits(Request $request, $id){
        $visits = PageVisit::where('page_id', $id)->when($request->q, function ($q) use($request){
            $q->where('name', 'LIKE', "%{$request->q}%");
        })
        ->when($request->sort_by, function ($q) use($request){
            if(in_array($request->sort_by, ['refresh_count', DB::raw('DATE(created_at)')]) && in_array($request->order_type, ['asc', 'desc'])){
                $q->orderBy($request->sort_by, $request->order_type);
            }
        }, function ($q){
            $q->orderBy('id', 'desc');
        })->paginate();
        return view('admin.pages.visits', compact('visits'));
    }
}
