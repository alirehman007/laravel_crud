<?php

namespace App\Http\Controllers;
use App\products;
use App\ProductImage;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function index()
    {
        // dd('tseting');
        $data['products'] = Products::all();
        // dd($products);
       return view ('index', $data);
    }
    public function create()
    {
        return view ('create');
    }
    public function store (Request $request)
    {
        
        // $request->validate([
        //     // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'image' => 'required',
        //         'image.*' => 'mimes:doc,pdf,docx,zip',
        // ]);
  
        //    $imageName = time().'.'.$request->image->extension();  
   
        // $request->image->move(public_path('images'), $imageName);
      
    //     public function show($id)
    // {
    //     return view('user.profile', ['user' => User::findOrFail($id)]);
    // }


            $request->validate([


         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

              'image' => 'required',
            ]);
            // $request->validate([
            //     'price'=> '',
            //     'price'=>'requried',
            // ]);
          $product=  products::create([
                'name'=>$request->name,
                'price'=>$request->price,
                'product_type'=>$request->product_type,
               
                'weight'=>$request->weight,
                'color'=>$request->color,
                'description'=>$request->description,
                'created_at'=>now(),
                ]);
// dd($product->id);


            if ($request->hasfile('image')) {
                $images = $request->file('image');
        
                foreach($images as $image) {
                    // $imageName= $image->getClientOriginalName();
                    $imageName = rand().'.'.$image->extension();  
                    // $path = $image->storeAs('uploads', $name, 'public');
                    $image->move(public_path('images'), $imageName);

                     ProductImage::create([
                    'product_id'=>$product->id, //id accress kar raha h oper product ki
                    'path'=>$imageName,
                        
    ]);
    // dd($ham->product_id);
                }        
             }  
          
            return redirect()->route('products.index')->with('success','product has been added');
        }
    

        public function edit (products $products)
        {
            return view ('edit')->with('products',$products);
        }

        public function view ($id)
        {  
            $product = products::with('images')->find($id);
            return view ('view')->with('product',$product);
        }


        public function update(Request $request,products $products)
        {
            $products->update([
                'name'=>$request->name,
                'product_type'=>$request->product_type,
                'price'=>$request->price,
                'image'=>$request->image,
                'weight'=>$request->weight,
                'color'=>$request->color,
                'description'=>$request->description,
                'created_at'=>now(),
            ]);
            return redirect()->route('products.index')->with('success','product has been updated');
        }
        public function destroy (products $products)
        {
            $products->delete();
            return redirect()->route('products.index')->with('success','products has been deleted');
        }
    }
