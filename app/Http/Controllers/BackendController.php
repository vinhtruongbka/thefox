<?php 
	namespace App\Http\Controllers;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Http\Request;
	use App\Models\Admin;
	use App\Models\User;
	use App\Models\Category;
	use App\Models\Product;
	use App\Models\Images;
	use Auth;
	



	/**
	* 
	*/
	class BackendController extends Controller
	{
		
		public function getIndex()
		{	
			if (Auth::check())
				{
				    return view('backend/module/home');
				}
			else{
					return redirect()->route('login');
			}
			
		}
		
		public function create_admin()
		{
			return view('backend/module/addadmin');
		}
		public function add_admin( request $req)
		{
			/*dd($req->all());
			die;	*/
			Admin::create([
				'email'=> $req->email,
				'password' => bcrypt($req->password),
				'name'=> $req->name,
				'phone'=> $req->phone,
			]);
		}
		public function Login()
		{	

			return view('backend/module/login');
		}
		public function post_login( request $rq)
		{
			// dd($rq->all());
			$this->validate($rq,[
				'email' => 'required|email',
				'password' => 'required|min:6|max:20',
			],
				['email.required' => 'Trường email không được để trống',
				'email.email' => 'Email không nhập đúng định dạng',
				'password.required' => 'Trường password không được để trống',
				'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
				'password.max' => 'Mật khẩu không được qua 20 ký tự',
			]);
			$credentials = array('email' => $rq->email,'password' => $rq->password);
			if (Auth::attempt($credentials,$rq->has('remember'))) {
				return redirect()->route('backend.index')->with('success','Thanh công');
			}else{
				return redirect()->back()->with([
					'flag'=>'error','message'=>'Bạn đã nhập sai Email hoặc Password'
				]);
			}
		}
		public function getproduct()
		{	
			
			 $sanpham = DB::table('category')->join('product', 'category.id', '=', 'product.id_category')
			 ->select('product.id as proid','product.name as produc_name', 'category.name as category_name','product.updated_at as updated_at','product.status as status','product.merchandise as merchandise','product.hot as hot','product.image_link as image_link')
			 ->get();
			/* dd($sanpham);*/
			 
			 return view('backend/module/list_product',compact('sanpham'));
			
		}
		public function getcategory()
		{	
			 /*$category = DB::table('category')->join('product','category.id','=','product.id_category')
			 ->select('category.id','category.name','product.id as soluong')
			 ->groupBy('category.id')
			 ->get();*/
			/* dd($category);*/
			$category = Category::all();
			/*dd($category);*/
			 return view('backend/module/list_category',compact('category'));
			
		}
		public function addproduct()
		{	
			 $category = Category::all();
			/* dd($category);*/
			
			 return view('backend/module/addproduct',compact('category'));
			
		}
		public function add_product(Request $req)
		{  
			$img = $req->anhdaidien;
			$link = asset('').'uploads/images/';
			$image_link = str_replace($link,'', $img);

			$this->validate($req,[
				'name' => 'required',
				'slug' => 'required',
				'content' => 'required',
				'price' => 'required',
				'brand' => 'required',
				'anhdaidien'=>'required',
				'desc'=>'required|max:300',
			],
				['name.required' => 'Tiêu đề không được để trống',
				'slug.required' => 'Đường dẫn tĩnh không được để trống',
				'content.required' => 'Nội dung mô tả không được để trống',
				'brand.required' => 'Thương hiệu không được để trống',
				'anhdaidien.required' => 'Ảnh đại diện không được để trống',
				'desc.max' => 'Mô tả ngắn chỉ được 30 ký tự',
				
			]);
			if ($req->hasFile('image_link_4')) {
				$file = $req->file('image_link_4');

				foreach ($file as $files) {
					$img_file_extension = $files->getClientOriginalExtension();
				if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
		            {
		                return redirect() ->route('backend.addproduct')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
		              }
				}

			        $pro = Product::create([
						'name'=> $req->name,
						'slug'=> $req->slug,
						'status' =>$req->status,
						'price' => $req->price,
						'sale_price'=> $req->sale_price,
						'id_category'=>$req->catid,
						'description'=>$req->desc,
						'price' => $req ->price,
						'sale_price' => $req ->sale_price,
						'content' =>$req->content,
						'color'=>$req->mau,
						'brand'=>$req->brand,
						'hot'=>$req->hot,
						'merchandise'=>$req->merchandise,
						'image_link'=>$image_link,
						
					     ]);

						foreach ($file as  $image) {
							$filename = $image->getClientOriginalName();
							 $image->move(base_path('uploads/images'), $filename);
							/* $images[]=$filename;*/
							 Images::create([
							'product_id'=>$pro->id,
							'images_link'=>  $filename,
								
							]);
					     }

					      return redirect()->route('backend.getproduct');

	                    }

	             return redirect() ->route('backend.addproduct')->with('error','Bạn chưa up ảnh');
	
		}

		public function xoasanpham($id)
		    {   
		    	
		    	$sanpham = Product::find($id);
		    	  $sanpham->Delete();

		      /*  DB::table('images')->where('product_id', $id)->delete();
		        DB::table('Product')->where('id', $id)->delete()*/;
				return redirect()->route('backend.getproduct');;
		    }
		public function suasanpham($id){


		    	
				$sanpham = Product::find($id);
		        $category = Category::all();

		        return view('backend/module/editproduct',compact('sanpham','category'));
		    }

		 public function sua_sanpham(Request $req,$id)
		 {      
		    /*$img = DB::table('product')->join('images','product.id','=','images.product_id')
		    ->select('images.images_link as img')
			 ->get();
			 dd($img);*/
			$sanpham = Product::find($id);
	    	$image_link = '';
	    	$img = $req->anhdaidien;
			if ($img) {
				$link = asset('').'uploads/images/';
			    $image_link = str_replace($link,'', $img);
			}else{
				$image_link = $sanpham->image_link;
			}

			 $this->validate($req,[
				'name' => 'required',
				'slug' => 'required',
				'content' => 'required',
				'price' => 'required',
				'desc'=>'required|max:300',
			],
				['name.required' => 'Tiêu đề không được để trống',
				'slug.required' => 'Đường dẫn tĩnh không được để trống',
				'content.required' => 'Nội dung mô tả không được để trống',
				'price.required' => 'Giá sản phẩm không được để trống',
				'desc.max' => 'Mô tả ngắn quá dài',
				
			]);

		 	if ($req->hasFile('image_link_4')) {
		 		 $images = DB::table('images')->where('product_id',$id)->delete();
				    $file = $req->file('image_link_4');
					foreach ($file as $files) {
					$img_file_extension = $files->getClientOriginalExtension();
					if($img_file_extension != 'png' && $img_file_extension != 'jpg' && $img_file_extension != 'jpeg')
			            {
			                return redirect() ->route('backend.addproduct')->with('error','Định dạng hình ảnh không hợp lệ (chỉ hỗ trợ các định dạng: png, jpg, jpeg)!');
			           }
			           $filename = $files->getClientOriginalName();
					   $files->move(base_path('uploads/images'), $filename);
							/* $images[]=$filename;*/
							/* Images::create([
							'product_id'=>$product->id,
							'images_link'=>  $filename,
								
							]);*/
							Images::create([
							'product_id'=>$id,
							'images_link'=>  $filename,
								
							]);
					     }
				    }

				 DB::table('product')
				    ->where('id', $id)
				    ->update([
		   			'name'=> $req->name,
					'slug'=> $req->slug,
					'status' =>$req->status,
					'price' => $req->price,
					'sale_price'=> $req->sale_price,
					'id_category'=>$req->catid,
					'description'=>$req->desc,
					'price' => $req ->price,
					'sale_price' => $req ->sale_price,
					'content' =>$req->content,
					'color'=>$req->mau,
					'brand'=>$req->brand,
					'hot'=>$req->hot,
					'merchandise'=>$req->merchandise,
					'image_link'=>$image_link,

		    	]);

			  
			return redirect()->route('backend.getproduct');
	        }

	    public function suadanhmuc($id)
	    {	
	    	$category = Category::find($id);
	    	return view('backend/module/editcategory',compact('category'));
	    }

	    public function postsuadanhmuc(Request $req,$id)
	    {	

	    		 $this->validate($req,[
				'name' => 'required',
				'slug' => 'required',
				'desc' => 'required',
			],
				['name.required' => 'Tiêu đề không được để trống',
				'slug.required' => 'Đường dẫn tĩnh không được để trống',
				'desc.required' => 'Nội dung mô tả không được để trống',
				
			]);

	    		  DB::table('category')
				    ->where('id', $id)
				    ->update([
		   			'name'=> $req->name,
					'slug'=> $req->slug,
					'desc' => $req->desc,
					'status' =>$req->status,
		    	]);

			return redirect()->route('backend.getcategory')->with('success','Bạn đã cập nhật danh mục sản phẩm thành công');


	    }
	    public function danhsachdonhang()
	    {   
	    	 $donhang = DB::table('user')->join('orders', 'orders.user_id', '=', 'user.id')
	    	 ->join('orders_detail', 'orders_detail.orders_id', '=', 'orders.id')
	    	 ->join('product', 'orders_detail.product_id', '=', 'product.id')
			 ->select(
				'user.id',
				'orders.user_id as ordeid',
				'orders_detail.orders_id',
				'product.id',
				'user.name as username',
				'orders.created_at as created_at',
				'product.name as proname',
				'orders_detail.amount as amount',
				'user.address as address'
			 )
			 ->get();	
	    	return view('backend/module/danhsachdonhang',compact('donhang'));
	    }

	    public function khachhang()
	    {
	    	$user = User::all();
	    	return view('backend/module/khachhang',compact('user'));
	    }
		    	
	}
 ?>