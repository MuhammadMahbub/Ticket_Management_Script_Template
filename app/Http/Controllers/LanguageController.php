<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use File;

class LanguageController extends Controller
{
    public function index()
    {
        $all_languages = Language::latest()->get();
        $s_name = 'fr';
        return view('admin.language.index', compact('all_languages','s_name'));
    }

    public function language_wise_data($key)
    {
        $all_langs = Language::latest()->get();
        $s_name = $key;
        $file = resource_path('lang/'.$key.'.json');
        $data = json_decode(file_get_contents($file), true);
        return view('admin.lang_edit', compact('data','all_langs','s_name'));
    }

    public function language_edit(Request $request)
    {
// return $request->data_value;
        $file = resource_path('lang/'.$request->short_name.'.json');
        $json = json_decode(file_get_contents($file), true);

        $json[$request->data_key] = $request->data_value;

        file_put_contents($file, json_encode($json));

        return response(__('Translation updated successfully'));

    }

    public function lang_edit(){
        $all_langs = Language::all();
        $s_name = 'fr';
        $file = resource_path('lang/fr.json');
        $data = json_decode(file_get_contents($file), true);
        return view('admin.lang_edit', compact('data','all_langs','s_name'));
    }
    // public function lang_update(Request $request){
    //     //  dd($request->all());
    //     // $request->s_name;
    //     // $key = $request->key;
    //     // $value = $request->value;
    //     $path = base_path('resources/lang/'. $request->s_name .'.json');
    //     $json = json_decode(file_get_contents($path), true);

    //     // $request->value;
    //     $json[$request->key] = $request->value;

    //     file_put_contents($path, json_encode($json));

    //     // foreach($json as $key=>$value){

    //     //     return $json[$key] = $value;
    //     //     return $new_path = base_path('resources/lang/'.$request->s_name.'.json');
    //     //     file_put_contents($new_path, json_encode($json));
    //     // }
    //     // die();

    //     return back()->with('success', 'Updated Successfully');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|unique:languages',
            'short_name' => 'required|unique:languages',
            'flag'       => 'required|image',
        ]);

        $lang = Language::create([
            'name'       => ucfirst($request->name),
            'short_name' => Str::lower($request->short_name),
            'created_at' => Carbon::now()
        ]);

        $path = base_path('resources/lang/fr.json'); // ie: /var/www/laravel/app/Storage/json/filename.json

        $jsondata = json_decode(file_get_contents($path),true);

        foreach($jsondata as $key=>$id){
            $json[$key] = $key;
            $new_path = base_path('resources/lang/'.Str::lower($request->short_name).'.json');
            file_put_contents($new_path, json_encode($json));
        }

        // $jsondata = file_get_contents($path);

        //     $path = base_path('resources/lang/'.$request->short_name.'.json');

        //     File::put($path, $jsondata);


        $location = public_path('uploads/lang_flag');

        if($request->hasFile('flag')){
            $image  = $request->file('flag');
            $imageName  = uniqid() . "." .$image->extension();
            $image->move($location, $imageName);
            $lang->flag = $imageName;
        }

        $lang->save();

        return redirect()->route('language.index')->with('success', 'Language Created Successfully');
    }

    public function show(Language $language)
    {
        //
    }

    public function edit(Language $language)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $language = Language::find($id);
        // dd($request);
        $request->validate([
            'name'       => 'required',
            'short_name' => 'required',
            'flag'       => 'image'
        ]);

        $language->update([
            'name'       => ucfirst($request->name),
            'short_name' => Str::lower($request->short_name),
            'updated_at' => Carbon::now()
        ]);

        $location = public_path('uploads/lang_flag');

        if($request->hasFile('flag')){
            $flag      = $request->file('flag');
            $flagName  = uniqid() . "." .$flag->extension();
            $flag->move($location, $flagName);
            $language->flag = $flagName;
        }

        $language->save();

        return back()->with('success','Updated Successfully !');
    }

    public function destroy(Language $language)
    {
        $language->delete();
        return back()->with('danger', 'Deleted Successfully');
    }

    public function search_wise_language(Request $request){
        if ($request->search_value != null) {
            $all_languages  =  Language::where('name','LIKE','%' . $request->search_value . '%')->orWhere('short_name', 'LIKE','%' . $request->search_value . '%')->get();
        } else {
            $all_languages = Language::latest()->get();
        }

        $count = $all_languages->count();
        $s_name = 'fr';

        $view  = view('includes.language.index', compact('all_languages', 's_name'))->render();
        return response()->json(['data' => $view , 'count' => $count]);
    }

    public function date_wise_language(Request $request){
        
        $from_date = Carbon::parse($request->from_date);
        $to_date    = Carbon::parse($request->to_date)->addDay();

        $all_languages = Language::whereBetween('created_at', [$from_date, $to_date])->get();
        $count = $all_languages->count();
        $s_name = 'fr';
        $view = view('includes.language.index', compact('all_languages', 's_name'))->render();
        return response()->json(['data' => $view, 'count' => $count]);
    }

    public function date_clear_wise_language(Request $request){
        $all_languages = Language::latest()->get();
        $s_name = 'fr';
        $view = view('includes.language.index', compact('all_languages', 's_name'))->render();
        return response()->json(['data' => $view]);
    }
}
