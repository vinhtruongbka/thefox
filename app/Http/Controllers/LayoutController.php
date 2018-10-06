<?php 
	namespace App\Http\Controllers;
	use App\Models\Slide;
	use App\Models\Product;
	use App\Models\Banner;
	use App\Models\Category;
	use App\Models\User;
	use App\Models\Images;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Http\Request;
	use Cart;
	use Auth;
	

	/**
	* 
	*/
	class LayoutController extends Controller
	{
		public function getIndex()
		{   
			$slide = Slide::all();

			 $sanpham_hot =Product::where('hot',1)->orderBy('id', 'DESC')->get();
			/* dd($sanpham_hot);
*/
			$banner_small = Banner::where('status',1)->limit(2)->orderBy('id', 'DESC')->get();
			$produc_high_heel = Product::where('id_category',4)->limit(5)->orderBy('id', 'DESC')->get();
			$banner_large = Banner::where('status',2)->limit(1)->orderBy('id', 'DESC')->get();
			$produc_men = Product::where('id_category',1)->limit(5)->orderBy('id', 'DESC')->get();
			return view('layout/trangchu',compact('slide','sanpham_hot','banner_small','produc_high_heel','banner_large','produc_men'));
		}
		public function getDanhmuc($type)
		{   
			$sp_hot = Product::where('id_category',$type)->get();
			$sp_theoloai = Product::where('id_category',$type)->paginate(3);
			/* $category = Category::all();*/
			 $tong_sp = DB::table('product')->join('category', 'product.id_category', '=', 'category.id') 
			 ->select( DB::raw('category.name as name,count(product.id) as tong'))
			 ->groupBy('category.name')
			 ->get();
			return view('layout/danhmuc',compact('sp_theoloai','tong_sp'));
		}
		public function getSanPham($res)
		{   
		    $img   = Images::where('product_id',$res)->limit(5)->orderBy('id', 'DESC')->get();
			$sanpham = Product::where('id',$res)->first();
			$sp_lienquan = Product::where('id_category',$sanpham->id_category)->limit(4)->orderBy('id', 'DESC')->get();
			$ngaunhien = Product::inRandomOrder()->limit(1)->first();
			$content = Cart::content();
			$total = Cart::subtotal();
			$count = Cart::count();
			
			return view($view = "layout/sanpham",compact('sanpham','sp_lienquan','content','total','count','img','ngaunhien'));
		}

		public function register()
		{
			return view('layout/register');
		}
		
		public function postregister(request $req)
		{
			$this->validate($req,[
				'name' => 'required',
				'email' => 'required|email|unique:user,email',
				'phone' => 'required|min:10|max:11',
				'address' => 'required',
				'password' => 'required|min:6|max:20',
				're_password' => 'required|same:password',
				
			],
				[
					'name.required' => 'Vui lòng nhập tên của bạn',
					'email.required' => 'Vui lòng nhập email của bạn',
					'email.email' => 'Email của bạn không đúng định dạng',
					'email.unique' => 'Email của bạn đã được đăng ký',
					'phone.required' => 'Vui lòng nhập điện thoại của bạn',
					'phone.min' => 'Số điện thoại bạn nhập không đúng',
					'phone.max' => 'Số điện thoại bạn nhập không đúng',
					'address.required' => 'Vui lòng nhập địa chỉ của bạn',
					'password.required' => 'Vui lòng nhập mật khẩu của bạn',
					'password.min' => 'Mật khẩu của bạn phải lớn hơn 6 ký tự',
					'password.max' => 'Mật khẩu của bạn phải nhỏ hơn 20 ký tự',
					're_password.required' => 'Vui lòng nhập mật khẩu của bạn',
					're_password.same' => 'Mật khẩu bạn nhập không giống nhau',
				
			]);

			User::create([
				'name'=> $req->name,
				'email'=> $req->email,
				'phone'=> $req->phone,
				'address'=> $req->address,
				'password'=> bcrypt($req->password),
				
			]);

			return redirect()->back()->with('success','Bạn đã đăng ký thành công vui lòng đăng nhập để mua hàng');
		}

		public function postlogin(request $req)
		{
			// dd($rq->all());
			$this->validate($req,[
				'email' => 'required|email',
				'password' => 'required|min:6|max:20',
			],
				['email.required' => 'Trường email không được để trống',
				'email.email' => 'Email không nhập đúng định dạng',
				'password.required' => 'Trường password không được để trống',
				'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
				'password.max' => 'Mật khẩu không được qua 20 ký tự',
			]);
			$credentials = array('email' => $req->email,'password' => $req->password);
			if (Auth::guard('acount')->attempt($credentials,$req->has('remember'))) {
				return redirect()->route('home.index')->with('success','Thanh công');
			}else{
				return redirect()->back()->with([
					'flag'=>'error','message'=>'Bạn đã nhập sai Email hoặc Password'
				]);
			}
		
		}

		public function logout()
		{
			 Auth::guard('acount')->logout();
			Cart::destroy();
			return redirect()->route('home.index');
		}

		public function timkiem(Request $req)
		{   
			$Product = DB::table('product')
                ->where('name', 'like','$req->query')
                ->get();
			return view('layout/timkiem',compact('Product'));
		}
	}
 ?>